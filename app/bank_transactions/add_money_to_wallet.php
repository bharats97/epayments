<?php
session_start();
include("../connection/dbconnection_variables.php");
//dummy session variable user_id 

function updateWalletBalance($user_id,$amount)
{
	$response_string=""
	$sql = "UPDATE `user_wallet` SET `wallet_balance`=`wallet_balance`+$amount WHERE `user_id`=$user_id ";
	$response_string="";

	if ($conn->query($sql) === TRUE) {
		$response_string="Rupees $amount/- added to your account <br>";
		if($amount_deducted>0)
			$response_string.="Rupees $amount_deducted/- service charge deducted ";
	} else {
  		$response_string= "Error adding money " . $conn->error;
	}
	return $response_string;

}

$_SESSION["user_id"]=2;


$user_id=$_SESSION["user_id"];
$amount=$_POST["amount"];
$card_type=$_POST["card_type"];
$amount_deducted=0;
$user_name="";
if($card_type=="credit_card")
{
	$amount_deducted=$amount*0.02;
	updateWalletBalance(0,$amount_deducted);
	$amount=$amount-$amount_deducted;
}

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Update user wallet Balance
updateWalletBalance($user_id,$amount)

//Get UserName

$sql="SELECT first_name,last_name FROM `user_details` WHERE user_id=$user_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $user_name=$row["first_name"]." ".$row["last_name"];
} 
else {
$response_string= "Error getting Username " . $conn->error;	
}

// Update Transction Table
$sql="INSERT INTO `transactions`(`receiver_id`, `sender_name`, `receiver_name`, `amount`, `comment`) VALUES ( '$user_id','Bank','$user_name',$amount,'You added money to your wallet from Bank')";
if ($conn->query($sql) === FALSE) {
  $response_string= "Error Updating transaction " . $conn->error;
}

echo $response_string;

$conn->close();


?>