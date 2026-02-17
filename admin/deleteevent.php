<?php



	include'../connect.php';
	$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
    if ($id <= 0) {
        header("location:all-events.php?failed=true");
        exit();
    }
	$result = $db->prepare("DELETE FROM events WHERE id= :post_id");
	$result->bindParam(':post_id', $id, PDO::PARAM_INT);
       if($result->execute()){
      header("location:all-events.php?success=true");
      exit();
        }else{
            header("location:all-events.php?failed=true");
            exit();
        } 
		
?>
