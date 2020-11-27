<script type="text/javascript" src="../../resources/js/transactions/transactions_history.js"></script>
<script type="text/javascript" src="../../resources/js/jquery-3.5.1.js"></script>
<script type="text/javascript" src="../../resources/js/user_details/about_user.js"></script>
<link rel="stylesheet" type="text/css" href="../../resources/css/transactions_table.css">
<link rel="stylesheet" type="text/css" href="../../resources/css/usercard.css">

<div>
	<div>
		<div align="center" style="width: 300px; background-color: blue">
			<h2>Profile Card</h2>
		</div>
		<div class="usercard" style="background-color: blue">
			<img src="jhondoe.jpg" alt="John" style="width: 100%">
			<h1 id="username"></h1>
			<h2 id="contact">Contact: </h2>
		</div>
	</div>
	<div>
		<div class="balance" style="background-color: yellow; float: right">
			<h2>Your Wallet Balance Is</h2>
			<h1 id="amount"></h1>
		</div>
	</div>
	<div style="margin-bottom: 10px">
		<div>
			<table id="txn_table" class="table">
				<caption style="margin-bottom: 10px"><b><u>RECENT TRANSACTION TABLE</u></b></caption>
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
			</table>
		</div>
		<div id="btn_div" align="center">
			<button id="show_more" class="button" onclick="more_transactions()">More Transactions</button>
		</div>
	</div>
</div>
