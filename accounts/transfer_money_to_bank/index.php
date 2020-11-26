<?php
include("../../resources/header.php");
?>
<div class="forms">
	<h1>Transfet Money To Bank</h1>
	<p id="error_message"></p>
    <p id="response_message"></p>
    <form action="#" id="">
          <h1>Debit Card</h1>
          <div class="input-field">
            <label for="credit_card_number">Card Number</label>
            <input type="text" name="card_number" id="debit_card_number"required />
            <label for="expiry_date">Expiry Date</label> 
            <input type="txt" name="expiry_date" placeholder="MM/YY"  id="debit_card_expiry_date" required/>
            <label for="cvv">CVV</label> 
            <input type="password" name="cvv" id="debit_card_cvv" required/>
            <label for="amount">Amount</label> 
            <input type="text" name="amount" id="debit_card_amount" required/>
            <input type="submit" value="Add Money" class="button" id="add_using_debit_card"/>
          </div>
      </form>

</div>
<?php
include("../../resources/footer.php");
?>