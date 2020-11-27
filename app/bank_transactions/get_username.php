<?php
function getUserName($connection,$user_id)
{
	$user_name="";
	$sql="SELECT first_name,last_name FROM `user_details` WHERE user_id=$user_id";
	$result = $connection->query($sql);

	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		$user_name=$row["first_name"]." ".$row["last_name"];
	} 
	return $user_name;
}
