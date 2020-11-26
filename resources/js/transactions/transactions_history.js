function fetch_show_transaction(num=1){
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if(this.readyState == 4 && this.status == 200){
			var rows = (this.responseText).split("\n");
			var table_content = "";
			for(var i=0; i<rows.length-1; i++){
				var row = (rows[i]).split(",");
				table_content+="<tr>";
				table_content+="<td>"+row[0]+"</td>";
				table_content+="<td>"+row[1]+"</td>";
				table_content+="<td>"+row[2]+"</td>";
				table_content+="<td>"+row[3]+"</td>";
				table_content+="<td>"+row[4]+"</td>";
				table_content+="<td>"+row[5]+"</td>";
				table_content+="<td>"+row[6]+"</td>";
				table_content+="</tr>";
			}
			$('table tbody').html(table_content);
		}
	};
	xmlhttp.open("GET", "../../app/transactions/transactions_history.php?num="+num, true);
	xmlhttp.send();
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