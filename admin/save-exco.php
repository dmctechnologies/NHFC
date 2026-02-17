<?php
include '../connect.php';

function redirect_to_add_exco($status) {
    header("location:add-exco.php?$status=true");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect_to_add_exco('failed');
}

$name = trim($_POST['name'] ?? '');
$office = trim($_POST['office'] ?? '');
$zone = trim($_POST['zone'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$email = trim($_POST['email'] ?? '');

if ($name === '' || $office === '' || $zone === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    redirect_to_add_exco('failed');
}

$file_name_new = '';
if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
    $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif', 'webp');
    $allowed_mime_types = array('image/jpeg', 'image/png', 'image/gif', 'image/webp');
    $original_name = strtolower($_FILES['file']['name']);
    $file_ext = pathinfo($original_name, PATHINFO_EXTENSION);

    if (!in_array($file_ext, $allowed_extensions, true)) {
        redirect_to_add_exco('failed');
    }

    $tmp_name = $_FILES['file']['tmp_name'];
    $mime_type = function_exists('mime_content_type') ? mime_content_type($tmp_name) : '';
    if ($mime_type !== '' && !in_array($mime_type, $allowed_mime_types, true)) {
        redirect_to_add_exco('failed');
    }

    $prefix = 'efac_' . md5((string) (microtime(true) . random_int(1, 999999)));
    $file_name_new = $prefix . '.' . $file_ext;
    $path = '../uploads/' . $file_name_new;

    if (!move_uploaded_file($tmp_name, $path)) {
        redirect_to_add_exco('failed');
    }
}

$query = ORM::for_table('excos')->create();
$query->name = $name;
$query->office = $office;
$query->zone = $zone;
$query->phone = $phone;
$query->email = $email;
$query->file = $file_name_new;

if ($query->save()) {
    redirect_to_add_exco('success');
}

redirect_to_add_exco('failed');
?>
