<script type="text/javascript" src="../resources/js/signup/signup_validations.js"></script>
<form action="../app/signup/db_insert.php" method="post">
    <input type="text" class="txt-fld" name="firstname" placeholder="First Name" onkeyup="validateFname()">
    <input type="text" class="txt-fld" name="middlename" placeholder="Middle Name">
    <input type="text" class="txt-fld" name="lastname" placeholder="Last Name">
    <input type="text" class="txt-fld" name="contact" placeholder="Phone Number">
    <input type="password" class="txt-fld" name="password" placeholder="Password">
    <input type="submit" class="btn" value="Sign Up">
</form>
