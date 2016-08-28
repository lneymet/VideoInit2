/**
 * Created by Spiritus on 16/07/24.
 */
(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            //form validation rules
            $("#register-form").validate({
                rules: {
                    nomUser: "required",
                    prenUser: "required",
                    // email: {
                    //     required: true,
                    //     email: true
                    // },
                    password: {
                        required: true,
                        minlength: 5
                    },
                    // agree: "required"
                },
                messages: {
                    prenUser: "<p style='color: #880009; margin-left: 45%; margin-top: 0px; margin-bottom: 0px;'>Please enter your firstname</p>",
                    nomUser: "<p style='color: #880009; margin-left: 45%; margin-top: 0px; margin-bottom: 0px;'>Please enter your lastname</p>",
                    password: {
                        required: "<p style='color: #880009; margin-left: 45%; margin-top: 0px; margin-bottom: 0px;'>Please provide a password</p>",
                        minlength: "<p style='color: #880009; margin-left: 10%; margin-top: 0px; margin-bottom: 0px;'>Your password must be at least 5 characters long</p>"
                    },
                    // email: "Please enter a valid email address",
                    // agree: "Please accept our policy"
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        }
    }

    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });

})(jQuery, window, document);