<?php
	include("../connection/connect.php");
	
	session_start();

	if (!isset($_SESSION['user_id'])) {
	    include('../connection/disconnect.php');
	    header('Location: http://localhost/epayments/app/auth/logout.php');
	    exit();
	}
	
	$current_user = $_SESSION['user_id'];
	
	$sql = "SELECT * FROM user_details WHERE user_id=$current_user";
	$result = $connection->query($sql);

	if ($result === FALSE) {
	    include('../connection/disconnect.php');
	    header('Location: http://localhost/epayments/error/');
	    exit();
	}
	
	$firstname="";
	$middlename="";
	$lastname="";
	$contact="";
	$fullname="";
	$balance = 0.0;
	if($result->num_rows > 0){
		$row = $result->fetch_assoc();
		$firstname = $row['first_name'];
		$middlename = $row['middle_name'];
		$lastname = $row['last_name'];
		$contact = $row['contact'];
		$fullname = $firstname." ";
		if($middlename!=Null) $fullname.=$middlename." ";
		if($lastname!=Null) $fullname.=$lastname;
	} else {
	    include('../connection/disconnect.php');
	    header('Location: http://localhost/epayments/error/');
	    exit();
	}
	$sql = "SELECT wallet_balance FROM user_wallet WHERE user_id=$current_user";
	$result = $connection->query($sql);

	if ($result === FALSE) {
	    include('../connection/disconnect.php');
	    header('Location: http://localhost/epayments/error/');
	    exit();
	}
	
	if($result->num_rows > 0){
		$row = $result->fetch_assoc();
		$balance = $row['wallet_balance'];
	} else {
	    include('../connection/disconnect.php');
	    header('Location: http://localhost/epayments/error/');
	    exit();
	}
	echo $fullname.",".$contact.",".$balance;
	include("../connection/disconnect.php");
