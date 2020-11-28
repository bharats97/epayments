<?php
include("../resources/header.php");
?>
<div class="forms">
    <form action="#" id="pay_form">
          <h1>Pay</h1>
          <p id="error_message"></p>
          <p id="response_message"></p>
  
          <div class="input-field">
            <label for="pay_to">Mobile Number</label>
            <input type="text" name="pay_to" id="pay_to" required/>
            <label for="contact_name">Name </label>
            <input type="text" name="contact_name" id="contact_name" required />
            <label for="amount">Amount</label> 
            <input type="text" name="amount" id="amount" required/>
            <input type="submit" value="Pay" class="button" id="pay"/>
          </div>
      </form>

</div>
<?php
include("../resources/footer.php");
?>
