function fetch_user_details(){
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if(this.readyState == 4 && this.status == 200){
			var rows = (this.responseText).split(",");
			$('#username').html(rows[0]);
			$('#contact').append(rows[1]);
			$('#amount').append("Rs. "+rows[2]+"/-");
		}
	};
	xmlhttp.open("GET", "../../app/user_details/about_user.php", true);
	xmlhttp.send();
}
fetch_user_details();
