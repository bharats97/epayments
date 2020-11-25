<?php
incude_once("app/connection/connect.php");
$current_user=1;
//$current_user = $_SESSION['username'];
echo "<table id=\"txns\" border = 1>";
	echo "<caption><b><u>TRANSACTION HISTORY</b></u></caption>";
	echo "<tr>";
		echo "<th>Transactions ID</th>";
		echo "<th>Sender</th>";
		echo "<th>Receiver</th>";
		echo "<th>Date</th>";
		echo "<th>Time</th>";
		echo "<th>Amount</th>";
		echo "<th>Comment</th>";
	echo "</tr>";
	$sql = "SELECT * FROM transactions WHERE sender_id=$current_user or receiver_id=$current_user ORDER BY timestamp DESC";
	$result = $connection->query($sql);
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$dt = explode(" ", $row["timestamp"]);
			echo "<tr>";
			echo "<td>".$row["transaction_id"]."</td>";
			echo "<td>".$row["sender_name"]."</td>";
			echo "<td>".$row["receiver_name"]."</td>";
			echo "<td>".$dt[0]."</td>";
			echo "<td>".$dt[1]."</td>";
			echo "<td>".$row["amount"]."</td>";
			echo "<td>".$row["comment"]."</td>";
			echo "</tr>";
		}
	}
	echo "</table>";
incude_once("app/connection/disconnect.php");
?>