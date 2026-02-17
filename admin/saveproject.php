<?php
      
session_start();
include('../connect.php');
$project_title = isset($_POST['project_title']) ? $_POST['project_title'] : '';
$project_detail = isset($_POST['project_detail']) ? $_POST['project_detail'] : '';
// query
$file_name  = strtolower($_FILES['file']['name']);
$file_ext = substr($file_name, strrpos($file_name, '.'));
$prefix = 'project_'.md5(time()*rand(1, 9999));
$file_name_new = $prefix.$file_ext;
$path = '../uploads/'.$file_name_new;

/* check if the file uploaded successfully */
if (@move_uploaded_file($_FILES['file']['tmp_name'], $path)) {
    // Write to the database filename and other details   
    $sql = "INSERT INTO projects (project_title, project_detail, file) VALUES (:project_title, :project_detail, :file)";
    $q = $db->prepare($sql);
    $q->execute(array(':project_title' => $project_title, ':project_detail' => $project_detail, ':file' => $file_name_new));
    
    if ($q) {
        header("location:add-project.php?success=true");
    } else {
        header("location:add-project.php?failed=true");
    }
}
?>