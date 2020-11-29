$(document).ready(function(){
	$("#transfer_money_to_bank").on("click",function(e){
		e.preventDefault();

		var IFSC_code=$("#IFSC_code").val();
		var transfer_amount=$("#amount").val();
		var account_number=$("#receiver_name").val();
		if(isNaN(IFSC_code)||isNaN(transfer_amount)||transfer_amount<=0||isNaN(account_number))
		{
			$("#error_message").fadeIn(500).html("Please fill in correct details").fadeOut(5000);
		}
		else
		{
			$.post("/epayments/app/bank_transactions/transfer_money_to_bank.php",
    			{
    				amount: transfer_amount,
    				IFSC_code:IFSC_code,
    				receiver_name:$("#receiver_name").val(),
					bank_name:$("#bank_name").val(),
					comment:$("#comment").val()
    			},
    			function(data, status){
  					$("#response_message").fadeIn(500).html( data ).fadeOut(5000);
  					setTimeout(function(){
                        window.location.href = "http://localhost/epayments/";
                    },2000);
                    
  				});
		}

	});
});
