<?php
include("../resources/header.php");
?>
<link rel="stylesheet" type="text/css" href="../resources/css/tab_style_form.css"> 

<div class="forms">
    <form action="#" id="login_form">
          <h1>Login</h1>
          <p id="error_message"></p>
          <p id="response_message"></p>
  
          <div class="input-field">
            <label for="contact">Mobile Number</label>
            <input type="text" name="contact" id="contact"required />
            <label for="password">Password</label>
            <input type="password" name="password" id="password"required />
            <input type="submit" value="Login" class="button" id="login"/>
          </div>
          Don't have an account?
          <a href="/epayments/signup">Sign up</a>  
      </form>

</div>
<?php
include("../resources/footer.php");
?>
