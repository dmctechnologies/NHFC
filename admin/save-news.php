<?php

session_start();
include('../connect.php');

function redirect_to_compose_news($status) {
    header("location:compose-news.php?$status=true");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect_to_compose_news('failed');
}

$news_title = trim($_POST['news_title'] ?? '');
$news_detail = trim($_POST['news_detail'] ?? '');

if ($news_title === '' || $news_detail === '') {
    redirect_to_compose_news('failed');
}

if (!isset($_FILES['file']) || $_FILES['file']['error'] !== UPLOAD_ERR_OK) {
    redirect_to_compose_news('failed');
}

$allowed_extensions = array('jpg', 'jpeg', 'png', 'gif', 'webp');
$allowed_mime_types = array('image/jpeg', 'image/png', 'image/gif', 'image/webp');
$original_name = strtolower($_FILES['file']['name']);
$file_ext = pathinfo($original_name, PATHINFO_EXTENSION);

if (!in_array($file_ext, $allowed_extensions, true)) {
    redirect_to_compose_news('failed');
}

$tmp_name = $_FILES['file']['tmp_name'];
$mime_type = function_exists('mime_content_type') ? mime_content_type($tmp_name) : '';
if ($mime_type !== '' && !in_array($mime_type, $allowed_mime_types, true)) {
    redirect_to_compose_news('failed');
}

$prefix = 'efac_' . md5((string) (microtime(true) . random_int(1, 999999)));
$file_name_new = $prefix . '.' . $file_ext;
$path = '../uploads/' . $file_name_new;

if (!move_uploaded_file($tmp_name, $path)) {
    redirect_to_compose_news('failed');
}

$sql = "INSERT INTO news (news_title,news_detail,file,date) VALUES (:a,:b,:c,now())";
$q = $db->prepare($sql);
$saved = $q->execute(array(':a' => $news_title, ':b' => $news_detail, ':c' => $file_name_new));

if ($saved) {
    redirect_to_compose_news('success');
}

redirect_to_compose_news('failed');
?>
