<?php
function addTransaction($connection,$from,$to,$sender_name,$receiver_name,$amount,$comment="NULL")
{
	// Update Transction Table
	$sql="INSERT INTO `transactions`(`sender_id`, `receiver_id`, `sender_name`, `receiver_name`, `amount`,  `comment`) VALUES ($from,$to,'$sender_name','$receiver_name',$amount,'$comment')";
	if ($connection->query($sql) === FALSE) {
		// echo "error";
	}
	
}
