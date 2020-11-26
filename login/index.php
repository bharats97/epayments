<?php
include("../resources/header.php");
?>
<script src="../resources/js/add_money_to_wallet/bank_transactions.js"></script>
<link rel="stylesheet" type="text/css" href="../resources/css/tab_style_form.css"> 

<div class="forms">
    <form action="#" id="bank_transfer">
          <h1>Login</h1>
          <p id="error_message"></p>
          <p id="response_message"></p>
  
          <div class="input-field">
            <label for="contact">Mobile Number</label>
            <input type="text" name="contact" id="contact"required />
            <label for="password">Password</label>
            <input type="password" name="password" id="password"required />
            <input type="submit" value="Login" class="button" id="transfer_money_to_bank"/>
          </div>
      </form>

</div>
<?php
include("../resources/footer.php");
?>