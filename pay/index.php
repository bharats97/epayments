<?php
include("../resources/header.php");
?>
<link rel="stylesheet" type="text/css" href="../resources/css/tab_style_form.css"> 
<script type="text/javascript" src="../resources/js/payment/pay.js"></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<div class="forms">
    <form method="POST" action="../app/payment/complete_payment.php" id="pay_form">
          <h1>Pay</h1>
          <p id="error_message"></p>
          <p id="response_message"></p>
  
          <div class="input-field">
            <label for="pay_to">Mobile Number*</label>
            <input type="text" name="pay_to" id="pay_to" onfocusout="validate_contact()" required/>
            <label for="contact_name">Name* </label>
            <input type="text" name="contact_name" id="contact_name" readonly required/>
            <label for="amount">Amount*</label> 
            <input type="text" name="amount" id="amount" onfocusout="validate_amount()" required/>
            <label for="comment">Comment</label> 
            <input type="text" name="comment" id="comment"/>
            <input type="submit" value="Pay" class="button" id="pay"/>
          </div>
      </form>

</div>
<?php
include("../resources/footer.php");
?>
