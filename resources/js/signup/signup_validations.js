function validateFname() {
    var fname = document.getElementsByName("firstname");
    alert(isCharOnly(fname));
}

function validateMname() {
    var mname = document.getElementsByName("middlename");
    isCharOnly(mname);
}

function validateLname() {
    var lname = document.getElementsByName("lastname");
    isCharOnly(lname);
}

function isCharOnly()  {
    var char_rex = /^[A-Za-z]+$/;
    return name.value.match(char_rex);
}

function validatePassword() {
    let pass = document.getElementByName('password');
    return pass.length >= 8;
}
