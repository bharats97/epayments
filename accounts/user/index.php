<?php

session_start();

if (!isset($_SESSION['status'])) {
    include('../../index.php');
    exit();
}
include("../../resources/header.php");

?>


<script type="text/javascript" src="../../resources/js/transactions/transactions_history.js"></script>

<script type="text/javascript" src="../../resources/js/user_details/about_user.js"></script>
<link rel="stylesheet" type="text/css" href="../../resources/css/transactions_table.css">
<link rel="stylesheet" type="text/css" href="../../resources/css/usercard.css">


<div>
	<div class="float-container">
		<div class="float-child">
			<center>
				<div class="usercard" >
					<h2>Profile Card</h2>

					<img src="/epayments/resources/images/john_doe.png" height="40%" width="60%" walt="John" >

					<h3 id="username"></h3>
					<h3 id="contact">Contact: </h3>
				</div>
			</center>
		</div>
		<div class="float-child ">
			<div class="services">
				<ul>
					<li><a href="/epayments/pay">Pay</a></li>
					<li><a href="/epayments/accounts/add_money_to_wallet">Add Money to Wallet</a></li>
					<li><a href="/epayments/accounts/transfer_money_to_bank">Transfer Money to Bank</a></li>
				</ul>
			</div>
		</div>
		<div class="float-child">
			<div class="balance" >
				<center>
					<br>
					<h2>Wallet Balance</h2>
					<img src="/epayments/resources/images/rupee.png" height="10%" width="20%">
					<h1 id="amount"></h1>
				</center>
			</div>
		</div>
	</div>
	<div >
		<div>
			<table id="txn_table" class="table">
				<caption ><h2><b>Recent Transactions</b></h2></caption>
				<thead>
					<tr id="table_header">
						<th>Transactions ID</th>
						<th>Sender Name</th>
						<th>Receiver Name</th>
						<th>Date</th>
						<th>Time</th>
						<th>Amount</th>
						<th>Comment</th>
					</tr>
				</thead>
				<tbody></tbody>
				<tfoot>
					<tr>
						<td colspan="7" style="text-align:center">
							<button id="show_more" class="button" onclick="more_transactions()">More Transactions</button>
						</td>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
</div>
<?php
include("../../resources/footer.php");
?>

