function validate_contact(){
	var contact = $("#pay_to").val();
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if(this.readyState == 4 && this.status == 200){
			if(this.responseText=='0'){
				alert("Contact number does not found!!!");
				$("#contact_name").val("");
			}else{
				$("#contact_name").val(this.responseText);
			}
		}
	};
	xmlhttp.open("GET", "../app/payment/validate_pay_contact.php?contact="+contact, true);
	xmlhttp.send();
}

function validate_amount(){
	var amount = $("#amount").val();
	var dot = 0;
	for(var i=0; i<amount.length; i++){
		if(amount.charCodeAt(i)==46){
			dot++;
		}
		if(!((amount.charCodeAt(i)>=48 && amount.charCodeAt(i)<=57)||amount.charCodeAt(i)==46)){
			alert("Amount should be numeric!!!");
			return;
		}
		if(dot>1){
			alert("Wrong amount!!!");
			return;
		}
	}
}

function show_msg(){
	event.preventDefault();
	$("#paid_to").html($("#contact_name").val());
	$("#paid_amount").html("Rs. "+$("#amount").val()+"/-");
	var x1 = document.getElementById("paid_toast");
	x1.className = 'show';
	setTimeout(function(){
		x1.className = x1.className.replace("show","");
	}, 3000);

	window.setTimeout(function(){
		document.getElementById("pay_form").action = "../app/payment/complete_payment.php";
		document.getElementById("pay_form").submit();
	},4000);
}


