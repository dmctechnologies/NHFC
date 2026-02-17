<?php

    include '../connect.php';
    $id = $_GET['id'];
    $result = $db->prepare("DELETE FROM projects WHERE id = :project_id");
    $result->bindParam(':project_id', $id);
    if ($result->execute()) {
        header("location:all-projects.php?success=true");
    } else {
        header("location:all-projects.php?failed=true");
    }

?>
