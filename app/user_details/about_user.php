<?php
	include("../connection/connect.php");
	$current_user=1;
	//$current_user = $_SESSION['username'];
	$sql = "SELECT * FROM user_details WHERE user_id=$current_user";
	$result = $connection->query($sql);
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
	}
	$sql = "SELECT wallet_balance FROM user_wallet WHERE user_id=$current_user";
	$result = $connection->query($sql);
	if($result->num_rows > 0){
		$row = $result->fetch_assoc();
		$balance = $row['wallet_balance'];
	}
	echo $fullname.",".$contact.",".$balance;
	include("../connection/disconnect.php");
?>
