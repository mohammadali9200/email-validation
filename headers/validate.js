$(document).ready(function () {

    $('#submit_email').click(function () {
        $('#validated').val('');
        $('#failed').val('');
        var input_email = $('#input_email').val();
        $('#input_email').html('');
        if (input_email.length > 0) {
            if (ValidateEmails()) {
                show_spinner();
                $.ajax({

                    type: 'POST',
                    dataType: "json",
                    data: {input_email: input_email},
                    url: 'validate.php',
                    beforeSend: show_spinner(),
                    success: function (content) {
                        hide_spinner();
                        //console.log(content);
                        $('#input_email').val(content.input_email)
                                .css({'color': 'black', 'font-size': '100%'});
                        $('#validated').val(content.validated)
                                .css({'color': 'green', 'font-size': '100%'});
                        $('#failed').val(content.failed)
                                .css({'color': 'red', 'font-size': '100%'});
                    }
                });
            }
        } else
            sweetAlert('', 'Please Enter emails to validate', 'error');
    });
});


function ValidateEmails() {
    var emailList = $("#input_email").val().split('\n');
    if (emailList.length > 0) {
        for (i = 0; i < emailList.length; i++)
        {
            if (emailList[i] != "undefined" && emailList[i].length > 1 && !isEmail(emailList[i])) {
                sweetAlert('', 'You have error in input.Please make sure that emails are added one at a line with correct email format.', 'info');
                return false;
            }
        }
        return true;
    }
}

function isEmail(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
}
var hide_spinner = function () {


    $('#spinner').hide();
    $('#result').css("opacity", "2");
}
var show_spinner = function () {

    $('#spinner').show();
    $('#result').css("opacity", "0.2");
}

  