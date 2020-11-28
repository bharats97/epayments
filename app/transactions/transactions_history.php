<?php
	include_once("../connection/connect.php");

	session_start();

	if (!isset($_SESSION['user_id'])) {
	    include('../connection/disconnect.php');
	    header('Location: http://localhost/epayments/app/auth/logout.php');
	    exit();
	}
	
	$current_user = $_SESSION['user_id'];
	$limit = $_GET['num'];
	if($limit==0){
		$sql = "SELECT * FROM transactions WHERE sender_id=$current_user or receiver_id=$current_user ORDER BY timestamp DESC";
	}
	else{
		$sql = "SELECT * FROM transactions WHERE sender_id=$current_user or receiver_id=$current_user ORDER BY timestamp DESC LIMIT $limit";
	}
	$result = $connection->query($sql);

	if ($result === FALSE) {
	    include('../connection/disconnect.php');
	    header('Location: http://localhost/epayments/error/');
	    exit();
	}
	
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$dt = explode(" ", $row["timestamp"]);
			echo $row["transaction_id"]. ",". $row["sender_name"] .",". $row["receiver_name"] .",". $dt[0]. "," .$dt[1] .",". $row["amount"] .",".   $row["comment"]. "\n";
		}
	}
	include("../connection/disconnect.php");
