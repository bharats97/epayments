<?php
function addMoneyToWallet($user_id,$amount,$connection)
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

function deductMoneyFromWallet($user_id,$amount,$connection)
{
	$response_string="";
	$sql = "UPDATE `user_wallet` SET `wallet_balance`=`wallet_balance`-$amount WHERE `user_id`=$user_id ";
	$response_string="";

	if ($connection->query($sql) === TRUE) {
		$response_string="Rupees $amount/- deducted from your account <br>";
	} else {
		$response_string= "Error adding money " . $connection->error;
	}
	return $response_string;

}