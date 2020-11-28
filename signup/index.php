
<?php
include("../resources/header.php");
?>
<link rel="stylesheet" type="text/css" href="../resources/css/signup.css"> 
<script src="../resources/js/auth/validate_contact.js"></script>
<script src="../resources/js/signup/signup_validations.js"></script>
<div class="float-container">
	<div class="float-child">
		<img src="../resources/images/transfer.jpg" height="100%" width="100%">
	</div>
	<div class="float-child">

		<div class="forms">
				<h1>Sign Up</h1>
				<p id="error_message"></p>
				<p id="response_message"></p>

			<form action="../app/signup/db_insert.php" method="post" id="signup_form">
			
				<div class="input-field">
					<label for="firstname">First Name</label>
					<input type="text" name="firstname" id="firstname" placeholder="First Name">
					<label for="middlename">Middle Name</label>
					<input type="text" name="middlename" id="middlename" placeholder="Middle Name">
					<label for="lastname">Last Name</label>
					<input type="text"  name="lastname" id="lastname" placeholder="Last Name">
					<label for="contact">Mobile Number</label>
					<input type="text"  name="contact" id="contact" placeholder="Phone Number">
					<label for="password">Password</label>
					<input type="password" name="password" id="password" placeholder="Password">
					<input type="submit" value="Sign Up" class="button" id="Sign_Up"/>
				</div>
			</form>

		</div>
	</div>
</div>
<?php
include("../resources/footer.php");
?>
