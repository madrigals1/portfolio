var pass1 = false;
var pass2 = false;

$("#password").on("keyup", function(){
    var pattern = new RegExp(/((?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,30})/);
    var password = $(this).val();
    if(pattern.test(password)){
        pass1 = true;
        $("#password_danger").hide();
        checkPass2();
        checkPass();
    } else {
        pass1 = false;
        $("#password_danger").show();
        checkPass2();
        checkPass();
    }
});

$("#password_confirm").on("keyup", function(){
    checkPass2();
});

function checkPass2(){
    var password = $("#password").val();
    var password_confirm = $("#password_confirm").val();
    if(password == password_confirm){
        pass2 = true;
        checkPass();
        $("#password_confirm_danger").hide();
    } else {
        pass2 = false;
        checkPass();
        $("#password_confirm_danger").show();
    }
}

function checkPass(){
    if(pass1 && pass2){
        $("#reg_button").removeAttr("disabled");
    } else {
        $("#reg_button").attr("disabled", "disabled");
    }
}
