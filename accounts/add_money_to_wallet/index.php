<?php

session_start();

if (!isset($_SESSION['status'])) {
    include('../../index.php');
    exit();
}

include("../../resources/header.php");

?>
<script src="../../resources/js/add_money_to_wallet/bank_transactions.js"></script>

<div class="forms">
	<h1>Add Money To Wallet</h1>
    <ul class="tab-group">
        <li class="tab active"><a href="#debit_card">Debit Card</a></li>
        <li class="tab"><a href="#credit_card">Credit Card</a></li>
    </ul>

    <p id="error_message"></p>
    <p id="response_message"></p>
    <form action="#" id="debit_card">
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
      <form action="#" id="credit_card" style="display:none">
          <h1>Credit Card</h1>
          <div class="input-field">
            <label for="credit_card_number">Card Number</label>
            <input type="text" name="card_number" id="credit_card_number" required />
            <label for="expiry_date">Expiry Date</label>
            <input type="txt" name="expiry_date" id="credit_card_expiry_date" placeholder="MM/YY" required/>
            <label for="cvv">CVV</label>
            <input type="password" name="cvv" id="credit_card_cvv" required/>
            <label for="amount">Amount</label>
            <input type="text" name="amount" id="debit_card_amount" required/>
            <input type="submit" value="Add Money" class="button" id="add_using_credit_card"/>
          </div>
      </form>
</div>
<?php
include("../../resources/footer.php");
?>
