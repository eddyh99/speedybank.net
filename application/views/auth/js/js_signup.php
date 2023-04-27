<script>


// Validation Password & Confirmation Password
$(document).ready(function() {
    $('#password1').keyup(function() {
        var pswd = $(this).val();
        var p1 = 0;
        var p2 = 0;
        var p3 = 0;
        var p4 = 0;
        var p5 = 0;

        //validate the length 8 - 35 char
        if (pswd.length < 8 || pswd.length > 35 ) {
            $('#length').removeClass('valid').addClass('invalid');
            p1 = 0;
        } else {
            $('#length').removeClass('invalid').addClass('valid');
            p1 = 1;
        }

        //validate letter
        if (pswd.match(/[a-z]/)) {
            $('#letter').removeClass('invalid').addClass('valid');
            p2 = 1;
        } else {
            $('#letter').removeClass('valid').addClass('invalid');
            p2 = 0;
        }

        //validate capital letter
        if (pswd.match(/[A-Z]/)) {
            $('#capital').removeClass('invalid').addClass('valid');
            p3 = 1;
        } else {
            $('#capital').removeClass('valid').addClass('invalid');
            p3 = 0;
        }

        //validate number
        if (pswd.match(/\d/)) {
            $('#number').removeClass('invalid').addClass('valid');
            p4 = 1;
        } else {
            $('#number').removeClass('valid').addClass('invalid');
            p4 = 0;
        }

        if (pswd.match(/(?:[^!@#$%^&*\-_=+]*[!@#$%^&*\-_=+]){2}/)) {
            $('#special').removeClass('invalid').addClass('valid');
            p5 = 1;
        } else {
            $('#special').removeClass('valid').addClass('invalid');
            p5 = 0;
        }
    }).focus(function() {
        $('#password_info').show();
    }).blur(function() {
        $('#password_info').hide();
    });

    
    $('#password2').keyup(function() {
        var cpswd = $(this).val();
        var pswd = $("#password1").val();

        if (cpswd == pswd) {
            $("#pswdmatch").hide();
        } else {
            $("#pswdmatch").show();
        }
    }).focus(function() {
        var cpswd = $(this).val();
        var pswd = $("#password1").val();
        if (cpswd == pswd) {
            $("#pswdmatch").hide();
        } else {
            $("#pswdmatch").show();
        }
    }).blur(function() {
        var cpswd = $(this).val();
        var pswd = $("#password1").val();
        if (cpswd == pswd) {
            $("#pswdmatch").hide();
        } else {
            $("#pswdmatch").show();
        }
    });


});

</script>