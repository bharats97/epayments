<?php
	include("../connection/connect.php");
	$contact = $_GET['contact'];
	$sql = "SELECT * FROM user_details WHERE contact=$contact";
	$result = $connection->query($sql);
	$firstname="";
	$middlename="";
	$lastname="";
	$fullname="";
	if($result->num_rows > 0){
		$row = $result->fetch_assoc();
		$firstname = $row['first_name'];
		$middlename = $row['middle_name'];
		$lastname = $row['last_name'];
		$fullname = $firstname." ";
		if($middlename!=Null) $fullname.=$middlename." ";
		if($lastname!=Null) $fullname.=$lastname;
		echo $fullname;
	}else{
		echo "0";
	}
	include("../connection/disconnect.php");
?>