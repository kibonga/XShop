window.addEventListener('DOMContentLoaded', () => {
    console.log("Register works again");
    setPasswordRegex();
    setNameRegex();
    setAddressRegex();
    setPhoneRegex();
    $("#register-form").validate({
        rules: {
            password : {
                required: true,
                password: true
            },
            password_confirmation : {
                required: true,
                equalTo: '#password'
            },
            email: {
                required: true,
                email: true
            },
            name: {
                required: true,
                custom_name: true
            },
            last_name: {
                required: true,
                custom_name: true
            },
            address: {
                required: true,
                address: true
            },
            phone: {
                required: true,
                phone: true
            }
        },
        messages : {
            email: {
                email: "The email should be in the format: abc@domain.tld"
            },
        },
        submitHandler: function(form) {
            $('#register-form').submit();
            // console.log("I am being submitted")
        },
    });
});

function setPasswordRegex() {
    $.validator.addMethod('password', function (value) {
        return /^[\w+\s+0-9]{8,}$/.test(value);
    }, 'Password must contain min 8 characters');
}
function setNameRegex() {
    $.validator.addMethod('custom_name', function (value) {
        return /^[a-zA-Z]{2,15}$/.test(value);
    }, 'Must be min 2 and max 15 characters long');
}
function setAddressRegex() {
    $.validator.addMethod('address', function (value) {
        return /^[#.0-9a-zA-Z\s,-]+$/.test(value);
    }, 'Invalid address format');
}
function setPhoneRegex() {
    $.validator.addMethod('phone', function (value) {
        return /^(\+\d{1,2}\s?)?1?\-?\.?\s?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$/.test(value);
    }, 'Invalid phone format');
}
