window.addEventListener('DOMContentLoaded', () => {
    console.log("Login works again");
    setPasswordRegex();
    $("#login-form").validate({
        rules: {
            password : {
                required: true,
                password: true
            },
            email: {
                required: true,
                email: true
            },
        },
        messages : {
            email: {
                email: "The email should be in the format: abc@domain.tld"
            },
        },
        submitHandler: function(form) {
            $('#login-form').submit();
            // console.log("I am being submitted")
        },
    });
});

function setPasswordRegex() {
    $.validator.addMethod('password', function (value) {
        return /^[\w+\s+0-9]{8,}$/.test(value);
    }, 'Password must contain min 8 characters');
}
