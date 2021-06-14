
<?php

if(isset($_POST['downvote'])){ 
	        require_once "../../db_connection.php";
		$id = $_POST['opinion_id'];
       		$connect = new PDO($db_pg, $user, $password);
        	$sql = "update opinie set downvotes = downvotes + 1 where opinion_id=:id";
        	$result = $connect->prepare($sql);
        	$result->execute(['id'=>$id]); 
		$response = $_POST['downvote']+1;
		echo $response ;}

if(isset($_POST['upvote'])){ 
	        require_once "../../db_connection.php";
		$id = $_POST['opinion_id'];
       		$connect = new PDO($db_pg, $user, $password);
        	$sql = "update opinie set upvotes  = upvotes + 1 where opinion_id=:id";
        	$result = $connect->prepare($sql);
        	$result->execute(['id'=>$id]);
        	$response = $_POST['upvote']+1;
		echo $response ;}

?>
