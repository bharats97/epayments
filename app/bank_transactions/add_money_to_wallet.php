<?php
session_start();
include_once("../connection/connect.php");
//dummy session variable user_id 

function updateWalletBalance($user_id,$amount,$connection)
{
	$response_string="";
	$sql = "UPDATE `user_wallet` SET `wallet_balance`=`wallet_balance`+$amount WHERE `user_id`=$user_id ";
	$response_string="";

	if ($connection->query($sql) === TRUE) {
		$response_string="Rupees $amount/- added to your account <br>";
	} else {
		$response_string= "Error adding money " . $connection->error;
	}
	return $response_string;

}

$_SESSION["user_id"]=2;

if(isset($_SESSION["user_id"])&&isset($_POST["amount"])&&isset($_POST["card_type"]))
{
	$user_id=$_SESSION["user_id"];
	$amount=$_POST["amount"];
	$card_type=$_POST["card_type"];
	$amount_deducted=0;
	$user_name="";
	if($card_type=="credit_card")
	{
		$amount_deducted=$amount*0.02;
	//add amount_deducted to admin's wallet
		updateWalletBalance(0,$amount_deducted,$connection);
		$amount=$amount-$amount_deducted;
	}


	// Update user wallet Balance
	$response_string=updateWalletBalance($user_id,$amount,$connection);
	if($amount_deducted>0)
		$response_string.="Rupees $amount_deducted/- service charge deducted ";
	
	//Get UserName
	$sql="SELECT first_name,last_name FROM `user_details` WHERE user_id=$user_id";
	$result = $connection->query($sql);

	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		$user_name=$row["first_name"]." ".$row["last_name"];
	} 
	else {
		$response_string= "Error getting Username " . $connection->error;	
	}

	// Update Transction Table
	$sql="INSERT INTO `transactions`(`receiver_id`, `sender_name`, `receiver_name`, `amount`, `comment`) VALUES ( '$user_id','Bank','$user_name',$amount,'You added money to your wallet from Bank')";
	if ($connection->query($sql) === FALSE) {
		$response_string= "Error Updating transaction " . $connection->error;
	}

	echo $response_string;
}
else
{
	echo "Internal Error";
}
include_once("../connection/disconnect.php");

?>