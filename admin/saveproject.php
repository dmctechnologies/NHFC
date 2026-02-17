<?php

session_start();
include('../connect.php');

function redirect_to_add_project($status) {
    header("location:add-project.php?$status=true");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect_to_add_project('failed');
}

// Accept both current and legacy field names for compatibility.
$project_title = trim($_POST['project_title'] ?? $_POST['project_name'] ?? '');
$project_detail = trim($_POST['project_detail'] ?? $_POST['project_description'] ?? '');

if ($project_title === '' || $project_detail === '') {
    redirect_to_add_project('failed');
}

if (!isset($_FILES['file']) || $_FILES['file']['error'] !== UPLOAD_ERR_OK) {
    redirect_to_add_project('failed');
}

$allowed_extensions = array('jpg', 'jpeg', 'png', 'gif', 'webp');
$allowed_mime_types = array('image/jpeg', 'image/png', 'image/gif', 'image/webp');
$original_name = strtolower($_FILES['file']['name']);
$file_ext = pathinfo($original_name, PATHINFO_EXTENSION);

if (!in_array($file_ext, $allowed_extensions, true)) {
    redirect_to_add_project('failed');
}

$tmp_name = $_FILES['file']['tmp_name'];
$mime_type = function_exists('mime_content_type') ? mime_content_type($tmp_name) : '';
if ($mime_type !== '' && !in_array($mime_type, $allowed_mime_types, true)) {
    redirect_to_add_project('failed');
}

$prefix = 'project_' . md5((string) (microtime(true) . random_int(1, 999999)));
$file_name_new = $prefix . '.' . $file_ext;
$path = '../uploads/' . $file_name_new;

if (!move_uploaded_file($tmp_name, $path)) {
    redirect_to_add_project('failed');
}

$sql = "INSERT INTO projects (project_title, project_detail, file) VALUES (:project_title, :project_detail, :file)";
$q = $db->prepare($sql);
$saved = $q->execute(array(
    ':project_title' => $project_title,
    ':project_detail' => $project_detail,
    ':file' => $file_name_new
));

if ($saved) {
    redirect_to_add_project('success');
}

redirect_to_add_project('failed');
?>
