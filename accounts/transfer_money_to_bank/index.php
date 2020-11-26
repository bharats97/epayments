<?php
include("../../resources/header.php");
?>
<script src="../../resources/js/transfer_money_to_bank/transfer_money_to_bank.js"></script>
<div class="forms">
  <h1>Transfer Money To Bank</h1>
  <p id="error_message"></p>
    <p id="response_message"></p>
    <form action="#" id="bank_transfer">
          <div class="input-field">
            <label for="receiver_name">Receiver Name</label>
            <input type="text" name="receiver_name" id="receiver_name"required />
            <label for="bank_name">Bank Name</label>
            <input type="text" name="bank_name" id="bank_name"required />
            <label for="IFSC_code">IFSC Code</label>
            <input type="text" name="IFSC_code" id="IFSC_code"required />
            <label for="amount">Amount</label> 
            <input type="text" name="amount" id="amount" required/>
            <label for="comment">Comment</label>
            <input type="text" name="comment" id="comment"/>
            <input type="submit" value="transfer" class="button" id="transfer_money_to_bank"/>
          </div>
      </form>

</div>
<?php
include("../../resources/footer.php");
?>