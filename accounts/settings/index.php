<?php
include("../../resources/header.php");
?>

<div class="forms">
    <form action="#" id="update_password_form">
          <h1>Update Password</h1>
          <p id="error_message"></p>
          <p id="response_message"></p>
  
          <div class="input-field">
            <label for="password">New Password</label>
            <input type="password" name="password" id="password"required />
            <label for="password">Confirm Password</label>
            <input type="password" name="confirm_password" id="confirm_password"required />
            
            <input type="submit" value="Update" class="button" id="update_password"/>
          </div>
      </form>

</div>
<?php
include("../../resources/footer.php");
?>