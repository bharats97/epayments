<?php
session_start();
include_once("../connection/connect.php");
include_once("update_wallet_balance.php");
include_once("add_transaction.php");
include_once("get_username.php");
include_once("validate_amount_from_wallet.php");

$admin_id=0;
if(isset($_SESSION["user_id"])&&isset($_POST["receiver_name"])&&isset($_POST["bank_name"])&&isset($_POST["IFSC_code"])&&isset($_POST["amount"]))
{
	$user_id=$_SESSION["user_id"];
	$receiver=$_POST["receiver_name"];
	$bank_name=$_POST["bank_name"];
	$amount=$_POST["amount"];
	$comment="You transferred money to ".$receiver." ( ".$bank_name." ) bank";
	if(isset($_POST["comment"])&&$_POST["comment"]!="")
		$comment=$_POST["comment"];
	//validate amount
	if(validateAmount($connection,$user_id,$amount))
	{
		$amount_deducted=$amount*0.02;
		$response_string=deductMoneyFromWallet($user_id,$amount,$connection);
		addMoneyToWallet($admin_id,$amount_deducted,$connection);
		$response_string.=" Rupees $amount_deducted Service Charge";
		$user_name=getUserName($connection,$user_id);
		$amount=$amount-$amount_deducted;
		addTransaction($connection,$user_id,"NULL",$user_name,$bank_name,$amount,$comment);
		addTransaction($connection,$user_id,$admin_id,$user_name,"Admin",$amount_deducted,"Service Charge");

		echo $response_string;
	}
	else
	{
		echo "Insufficient Balance";
	}
}
else
{
	include_once('../connection/disconnect.php');
	header('Location: http://localhost/epayments/app/auth/logout.php');
	exit();
}

include_once("../connection/disconnect.php");
