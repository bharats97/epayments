<?php
	include("../connection/connect.php");
	$current_user=1;
	//$current_user = $_SESSION['username'];
	$limit = $_GET['num'];
	if($limit==0){
		$sql = "SELECT * FROM transactions WHERE sender_id=$current_user or receiver_id=$current_user ORDER BY timestamp DESC";
	}
	else{
		$sql = "SELECT * FROM transactions WHERE sender_id=$current_user or receiver_id=$current_user ORDER BY timestamp DESC LIMIT $limit";
	}
	$result = $connection->query($sql);
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$dt = explode(" ", $row["timestamp"]);
			echo $row["transaction_id"]. ",". $row["sender_name"] .",". $row["receiver_name"] .",". $dt[0]. "," .$dt[1] .",". $row["amount"] .",". $row["comment"]. "\n";
		}
	}

	include("../connection/disconnect.php");

?>
