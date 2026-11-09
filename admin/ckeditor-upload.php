<?php
declare(strict_types=1);

$func_num = $_GET['CKEditorFuncNum'] ?? '';

function respond(string $func_num, string $url = '', string $message = ''): void {
    $func_num = addslashes($func_num);
    $url = addslashes($url);
    $message = addslashes($message);
    echo "<script>window.parent.CKEDITOR.tools.callFunction($func_num, '$url', '$message');</script>";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    respond($func_num, '', 'Invalid request method.');
}

if (!isset($_FILES['upload']) || $_FILES['upload']['error'] !== UPLOAD_ERR_OK) {
    respond($func_num, '', 'Image upload failed.');
}

$max_bytes = 5 * 1024 * 1024;
if ($_FILES['upload']['size'] > $max_bytes) {
    respond($func_num, '', 'Image is too large. Max size is 5MB.');
}

$allowed_extensions = array('jpg', 'jpeg', 'png', 'gif', 'webp');
$allowed_mime_types = array('image/jpeg', 'image/png', 'image/gif', 'image/webp');

$original_name = strtolower($_FILES['upload']['name']);
$file_ext = pathinfo($original_name, PATHINFO_EXTENSION);
if (!in_array($file_ext, $allowed_extensions, true)) {
    respond($func_num, '', 'Invalid image type.');
}

$tmp_name = $_FILES['upload']['tmp_name'];
$mime_type = function_exists('mime_content_type') ? mime_content_type($tmp_name) : '';
if ($mime_type !== '' && !in_array($mime_type, $allowed_mime_types, true)) {
    respond($func_num, '', 'Invalid image type.');
}

$upload_dir = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'uploads';
if (!is_dir($upload_dir)) {
    if (!mkdir($upload_dir, 0755, true)) {
        respond($func_num, '', 'Upload directory is not available.');
    }
}

$prefix = 'event_' . md5((string) (microtime(true) . random_int(1, 999999)));
$file_name_new = $prefix . '.' . $file_ext;
$target_path = $upload_dir . DIRECTORY_SEPARATOR . $file_name_new;

if (!move_uploaded_file($tmp_name, $target_path)) {
    respond($func_num, '', 'Could not save the image.');
}

$script_dir = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? '/'));
$base_url = preg_replace('#/admin$#', '', rtrim($script_dir, '/'));
$url = $base_url . '/uploads/' . $file_name_new;

respond($func_num, $url, '');
