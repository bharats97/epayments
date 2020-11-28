
function validateName(name) {
    var char_rex = /^[A-Za-z]+$/;
    return name.match(char_rex);
}


function validatePassword(password) {
    return password.length >= 8;
}

$(document).ready(function(){
    var valid_fname=false;
    var valid_mname=false;
    var valid_lname=false;
    var valid_contact=false;
    var valid_password=false;

    $("#firstname").on('blur',function(){
        var contact=$("#firstname").val();
        if(!validateName(contact))
        {
            valid_fname=true;
            $("#error_message").fadeIn(500).html("Invalid firstname").fadeOut(5000);
        }
        else
        {
            valid_fname=false;
        }
    });
    $("#middlename").on('blur',function(){
        var contact=$("#middlename").val();
        if(!validateName(contact))
        {
            valid_mname=true;
            $("#error_message").fadeIn(500).html("Invalid middlename").fadeOut(5000);
        }
        else
        {
            valid_mname=false;
        }
    });

    $("#lastname").on('blur',function(){
        var contact=$("#lastname").val();
        if(!validateName(contact))
        {
            valid_lname=true;
            $("#error_message").fadeIn(500).html("Invalid lastname").fadeOut(5000);
        }
        else
        {
            valid_name=false;
        }
    });

    $("#contact").on('blur',function(){
        var contact=$("#contact").val();
        if(!validate_contact(contact))
        {
            valid_contact=true;
            $("#error_message").fadeIn(500).html("Invalid contact").fadeOut(5000);
        }
        else
        {
            valid_contact=false;
        }
    });

    $("#password").on('blur',function(){
        var contact=$("#password").val();
        if(!validatePassword(contact))
        {
            valid_password=true;
            $("#error_message").fadeIn(500).html("Invalid password").fadeOut(5000);
        }
        else
        {
            valid_password=false;
        }
    });


    $("#signup_form").submit(function (e) {
        if (valid_fname||valid_mname||valid_lname||valid_contact||valid_password) {
            e.preventDefault();
            return false;
        }
    }); 

}); 
