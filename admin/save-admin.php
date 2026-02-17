<?php

session_start();
include('../connect.php');

function redirect_to_add_admin($status) {
    header("location:add-admin.php?$status=true");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect_to_add_admin('failed');
}

$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$username = trim($_POST['username'] ?? '');
$password = (string) ($_POST['password'] ?? '');

if ($name === '' || $username === '' || $password === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    redirect_to_add_admin('failed');
}

if (!isset($_FILES['file']) || $_FILES['file']['error'] !== UPLOAD_ERR_OK) {
    redirect_to_add_admin('failed');
}

$allowed_extensions = array('jpg', 'jpeg', 'png', 'gif', 'webp');
$allowed_mime_types = array('image/jpeg', 'image/png', 'image/gif', 'image/webp');
$original_name = strtolower($_FILES['file']['name']);
$file_ext = pathinfo($original_name, PATHINFO_EXTENSION);

if (!in_array($file_ext, $allowed_extensions, true)) {
    redirect_to_add_admin('failed');
}

$tmp_name = $_FILES['file']['tmp_name'];
$mime_type = function_exists('mime_content_type') ? mime_content_type($tmp_name) : '';
if ($mime_type !== '' && !in_array($mime_type, $allowed_mime_types, true)) {
    redirect_to_add_admin('failed');
}

$prefix = 'efac_' . md5((string) (microtime(true) . random_int(1, 999999)));
$file_name_new = $prefix . '.' . $file_ext;
$path = '../uploads/' . $file_name_new;

if (!move_uploaded_file($tmp_name, $path)) {
    redirect_to_add_admin('failed');
}

$password_hash = password_hash($password, PASSWORD_DEFAULT);
$sql = "INSERT INTO table_admin (name,email,username,password,file) VALUES (:a,:b,:c,:d,:e)";
$q = $db->prepare($sql);
$saved = $q->execute(array(
    ':a' => $name,
    ':b' => $email,
    ':c' => $username,
    ':d' => $password_hash,
    ':e' => $file_name_new
));

if ($saved) {
    redirect_to_add_admin('success');
}

redirect_to_add_admin('failed');
?>
