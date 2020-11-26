function add_slash_in_date(dom_element)
{
	if(dom_element.val().length==2)
	{
		dom_element.val(dom_element.val()+'/');
	}
}

function validate_data(card_details)
{
    var card_no=card_details.find("input[name=card_number]").val();
    var expiry_date=card_details.find("input[name=expiry_date]").val().split('/');
    var cvv=card_details.find("input[name=cvv]").val();
    var amount=card_details.find("input[name=amount]").val();
    var month=expiry_date[0];
    var year=expiry_date[1];
    var d=new Date();
    var current_month=d.getMonth();
    var current_year=d.getFullYear();
    if(isNaN(card_no)||isNaN(cvv)||isNaN(amount)||isNaN(month)||isNaN(year))
    {
        return false;
    }
    if(cvv.length!=3)
        return false;
    if(amount<0)
        return false;
    if(year<current_year&&current_month>month||(month>12||month<=0))
        return false;
    return true;
}
$(document).ready(function(){

    $('#debit_card_expiry_date').on('keypress',function(e){
    	add_slash_in_date($(debit_card_expiry_date));
    });
    $('#credit_card_expiry_date').on('keypress',function(e){
    	add_slash_in_date($(credit_card_expiry_date));
    });
    $('#add_using_debit_card').on('click',function(e){
    	e.preventDefault();
    	// var amount=$('#debit_card input[name=amount]').val();
    	if(validate_data($("#debit_card")))
    	{
    		$.post("/epayments/app/bank_transactions/add_money_to_wallet.php",
    			{
    				amount: $('#debit_card input[name=amount]').val(),
    				card_type:"debit_card"
    			},
    			function(data, status){
  					$("#response_message").fadeIn(500).html( data ).fadeOut(5000);
  				});
    	}
    	else
    	{
    		$("#error_message").fadeIn(500).html("Please fill in correct amount").fadeOut(5000);
    	}
    });

    $('#add_using_credit_card').on('click',function(e){
    	e.preventDefault();
    	if(validate_data($("#debit_card")))
    	{
    		$.post("/epayments/app/bank_transactions/add_money_to_wallet.php",
    			{
    				amount: $('#credit_card input[name=amount]').val(),
    				card_type:"credit_card"
    			},
    			function(data, status){
  					$("#response_message").fadeIn(500).html( data ).fadeOut(5000);
  				});
    	}
    	else
    	{
    		$("#error_message").fadeIn(500).html("Please fill in correct amount").fadeOut(5000);
    	}
    });



});