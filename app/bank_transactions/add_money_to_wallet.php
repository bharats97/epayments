<?php
session_start();
include_once("../connection/connect.php");
include_once("update_wallet_balance.php");
include_once("add_transaction.php");
include_once("get_username.php");
$admin_id=0;
//dummy session variable user_id

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
		//add service charges to admin's wallet
		addMoneyToWallet($admin_id,$amount_deducted,$connection);
		addTransaction($connection,$user_id,$admin_id,$user_name,"Admin",$amount,"Service Charge");
		$amount=$amount-$amount_deducted;
	}


	// Update user wallet Balance
	$response_string=addMoneyToWallet($user_id,$amount,$connection);
	if($amount_deducted>0)
		$response_string.="Rupees $amount_deducted/- service charge deducted ";

	$comment="Rupees ".$amount."/- added to your wallet";
	$user_name=getUserName($connection,$user_id);
	addTransaction($connection,"NULL",$user_id,"Bank",$user_name,$amount,$comment);
	echo $response_string;
}
else
{
    include_once('../connection/disconnect.php');
	header('Location: http://localhost/epayments/app/auth/logout.php');
	exit();
}
include_once("../connection/disconnect.php");
