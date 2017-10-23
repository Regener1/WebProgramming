/**
 * Created by Администратор on 18.10.2017.
 */
$(document).ready(function(){
    $("#register").validate({
        rules:{
            username:{
                required: true,
                minlength: 4,
                maxlength: 16,
            },

            email:{
                required: true,
                minlength: 6,
                maxlength: 100,
                email: true,
            },

            new_password:{
                required: true,
                minlength: 4,
                maxlength: 16,
            },

            password_confirm:{
                required: true,
                minlength: 4,
                maxlength: 16,
            },
        },

        messages:{
            username:{
                required: "This field must be filled",
                minlength: "Min length 4",
                maxlength: 16,
            },

            email:{
                required: "This field must be filled",
                minlength: "Min length 6",
                maxlength: 32,
                email: true,
            },

            new_password:{
                required: "This field must be filled",
                minlength: "Min length 4",
                maxlength: 16,
            },

            password_confirm:{
                required: "This field must be filled",
                minlength: "Min length 4",
                maxlength: 16,
            },
        }
    });
});