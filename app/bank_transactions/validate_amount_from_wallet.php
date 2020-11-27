<?php
function validateAmount($connection,$user_id,$amount)
{
	$sql="SELECT `wallet_balance` FROM `user_wallet` WHERE user_id=$user_id ";
	$result = $connection->query($sql);
	$user_balance=0;
	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		$user_balance=$row["wallet_balance"];
	} 
	if($user_balance<$amount)
		return FALSE;
	else
		return TRUE;
	
}
