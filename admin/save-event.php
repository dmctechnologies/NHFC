<?php
include '../connect.php';

function fail_and_redirect(string $code, string $log = ''): void {
    if ($log !== '') {
        error_log('Save event failed [' . $code . ']: ' . $log);
    }
    header("Location: add-event.php?failed=" . urlencode($code));
    exit();
}

// Validate and sanitize form inputs
$title = trim($_POST['title'] ?? '');
$date = trim($_POST['date'] ?? '');
$time = trim($_POST['time'] ?? '');
$venue = trim($_POST['venue'] ?? '');
$phone = trim($_POST['phone'] ?? '');
if ($title === '' || $date === '' || $time === '' || $venue === '') {
    fail_and_redirect('missing_fields', 'Required field missing.');
}

// Required poster upload
if (!isset($_FILES['thumbnail'])) {
    fail_and_redirect('missing_poster', 'Poster file not provided.');
}
if ($_FILES['thumbnail']['error'] !== UPLOAD_ERR_OK) {
    fail_and_redirect('upload_error', 'Upload error code: ' . (string) $_FILES['thumbnail']['error']);
}

$allowed_extensions = array('jpg', 'jpeg', 'png', 'gif', 'webp');
$allowed_mime_types = array('image/jpeg', 'image/png', 'image/gif', 'image/webp');
$original_name = strtolower($_FILES['thumbnail']['name']);
$file_ext = pathinfo($original_name, PATHINFO_EXTENSION);

if (!in_array($file_ext, $allowed_extensions, true)) {
    fail_and_redirect('invalid_extension', 'Extension: ' . $file_ext);
}

$tmp_name = $_FILES['thumbnail']['tmp_name'];
$mime_type = function_exists('mime_content_type') ? mime_content_type($tmp_name) : '';
if ($mime_type !== '' && !in_array($mime_type, $allowed_mime_types, true)) {
    fail_and_redirect('invalid_mime', 'MIME: ' . $mime_type);
}

$upload_dir = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'uploads';
if (!is_dir($upload_dir)) {
    if (!mkdir($upload_dir, 0755, true)) {
        fail_and_redirect('upload_dir', 'Could not create upload dir: ' . $upload_dir);
    }
}

$prefix = 'event_' . md5((string) (microtime(true) . random_int(1, 999999)));
$file_name_new = $prefix . '.' . $file_ext;
$path = $upload_dir . DIRECTORY_SEPARATOR . $file_name_new;

if (!move_uploaded_file($tmp_name, $path)) {
    fail_and_redirect('move_failed', 'Target: ' . $path);
}

$thumbnail_file_name = $file_name_new;

// This code will save file into the database
try {
    $query = ORM::for_table('events')->create();
    $query->title = $title;
    $query->date = $date;
    $query->time = $time;
    $query->venue = $venue;
    $query->phone = $phone;
    $query->thumbnail = $thumbnail_file_name;
    $query->save();
} catch (Exception $e) {
    fail_and_redirect('db_error', $e->getMessage());
}

header("Location: add-event.php?success=true");
exit();
