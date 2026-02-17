<?php

include '../connect.php';

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
if ($id <= 0) {
    header("location:project-list.php?failed=true");
    exit();
}

$result = $db->prepare("DELETE FROM projects WHERE id = :project_id");
$result->bindParam(':project_id', $id, PDO::PARAM_INT);

if ($result->execute()) {
    header("location:project-list.php?success=true");
    exit();
}

header("location:project-list.php?failed=true");
exit();
?>
