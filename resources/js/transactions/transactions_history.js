function fetch_show_transaction(nums=5){
	$.get("../../app/transactions/transactions_history.php",
	{
		num:nums
	},
	function(data, status){
		var rows = (data).split("\n");
		var table_content = "";
		for(var i=0; i<rows.length-1; i++){
			var row = (rows[i]).split(",");
			table_content+="<tr>";
			table_content+="<td>"+row[0]+"</td>";
			table_content+="<td>"+row[1]+"</td>";
			table_content+="<td>"+row[2]+"</td>";
			table_content+="<td>"+row[3]+"</td>";
			table_content+="<td>"+row[4]+"</td>";
			var amount = parseFloat(row[5]).toFixed(2);
			table_content+="<td>"+amount+"</td>";
			table_content+="<td>"+row[6]+"</td>";
			table_content+="</tr>";
		}
		$('table tbody').html(table_content);
	});

}

fetch_show_transaction();

function more_transactions(){
	fetch_show_transaction(0);
	$("#show_more").remove();
	var new_button = '<button id="show_less" class="button" onclick="less_transactions()">Less Transactions</button>';
	$("#btn_div").append(new_button);
}

function less_transactions(){
	fetch_show_transaction();
	$("#show_less").remove();
	var new_button = '<button id="show_more" class="button" onclick="more_transactions()">More Transactions</button>';
	$("#btn_div").append(new_button);	
}
