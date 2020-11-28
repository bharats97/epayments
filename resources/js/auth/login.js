$(document).ready(function(){
	var validationFailed=false;
	$("#contact").on('blur',function(){
		var contact=$("#contact").val();
		if(!validate_contact(contact))
		{
			validationFailed=true;
			$("#error_message").fadeIn(500).html("Invalid Mobile Number").fadeOut(5000);
		}
		else
		{
			validationFailed=false;
		}
	});
	$("#login_form").submit(function (e) {
		if (validationFailed) {
			e.preventDefault();
			return false;
		}
	}); 

}); 
