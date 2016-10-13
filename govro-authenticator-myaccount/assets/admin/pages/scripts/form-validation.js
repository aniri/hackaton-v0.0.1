var FormValidation = function () {

    // basic validation
    var insertNewUser = function() {
        // for more info visit the official plugin documentation: 
            // http://docs.jquery.com/Plugins/Validation

            var form1 = $('#addUserForm');
            var error1 = $('.alert-danger', form1);
            var success1 = $('.alert-success', form1);

            form1.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",  // validate all fields including form hidden input
                messages: {
                    select_multi: {
                        maxlength: jQuery.validator.format("Max {0} items allowed for selection"),
                        minlength: jQuery.validator.format("At least {0} items must be selected")
                    }
                },
               rules: {
                    name: {
                        minlength: 2,
                        required: true
                    },
					 surname: {
                        minlength: 2,
                        required: true
                    },
					 userRights: {
                        required: true
                    },
					active: {
                        required: true
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    password:{
                        minlength: 5,
                        required: true
                    },
                     rpassword: {
                        minlength: 5,
                        required: true,
                        equalTo: "#password"
                    },
                    url: {
                        required: true,
                        url: true
                    },
                    number: {
                        required: true,
                        number: true
                    },
                    digits: {
                        required: true,
                        digits: true
                    },
                    creditcard: {
                        required: true,
                        creditcard: true
                    },
                    occupation: {
                        minlength: 5,
                    },
                    select: {
                        required: true
                    },
                    select_multi: {
                        required: true,
                        minlength: 1,
                        maxlength: 3
                    }
                },

                messages: { // custom messages for radio buttons and checkboxes
                    'payment[]': {
                        required: "Please select at least one option",
                        minlength: jQuery.validator.format("Please select at least one option")
                    },
                    password: {
                        required: "Acest camp este obligatoriu.",
                        minlength: "Parola trebuie sa contina minim 5 caractere.",
                        equalTo: "Parola nu este introdusa la fel in ambele campuri."
                    },
                    rpassword: {
                        required: "Acest camp este obligatoriu.",
                        minlength: "Parola trebuie sa contina minim 5 caractere.",
                        equalTo: "Parola nu este introdusa la fel in ambele campuri."
                    },
                    userRights: {
                        required: "Nu a fost selectata o optiune."
                    },
                    active: {
                        required: "Nu a fost selectata o optiune."
                    },
                    name: {
                        required: "Acest camp nu a fost completat."
                    },
                    surname: {
                        required: "Acest camp nu a fost completat."
                    },
                     email: {
                        required: "Acest camp nu a fost completat."
                    },
                     phone: {
                        required: "Acest camp nu a fost completat.",
                        minlength: "Numarul de telefon trebuie sa contina minim 10 caractere."
                    },
                    tipBeneficiari : {
                        required: "Tipul beneficiarilor nu a fost introdus."
                    }
                },
                invalidHandler: function (event, validator) { //display error alert on form submit              
                    success1.hide();
                    error1.show();
                    Metronic.scrollTo(error1, -200);
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (form) {
                    success1.show();
					document.getElementById("addUserForm").submit();
                    error1.hide();
                }
            });


    }
	
	var editUser = function() {
        // for more info visit the official plugin documentation: 
            // http://docs.jquery.com/Plugins/Validation

            var form1 = $('#editUserForm');
            var error1 = $('.alert-danger', form1);
            var success1 = $('.alert-success', form1);

            form1.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",  // validate all fields including form hidden input
                messages: {
                    select_multi: {
                        maxlength: jQuery.validator.format("Max {0} items allowed for selection"),
                        minlength: jQuery.validator.format("At least {0} items must be selected")
                    }
                },
               rules: {
                    name: {
                        minlength: 2,
                        required: true
                    },
					 surname: {
                        minlength: 2,
                        required: true
                    },
					active: {
                        required: true
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    password:{
                        minlength: 5,
                    },
                     rpassword: {
                        minlength: 5,
                        equalTo: "#password"
                    },
                    url: {
                        required: true,
                        url: true
                    },
                    number: {
                        required: true,
                        number: true
                    },
                    digits: {
                        required: true,
                        digits: true
                    },
                    creditcard: {
                        required: true,
                        creditcard: true
                    },
                    occupation: {
                        minlength: 5,
                    },
                    select: {
                        required: true
                    },
                    select_multi: {
                        required: true,
                        minlength: 1,
                        maxlength: 3
                    }
                },

                messages: { // custom messages for radio buttons and checkboxes
                    'payment[]': {
                        required: "Please select at least one option",
                        minlength: jQuery.validator.format("Please select at least one option")
                    },
                    password: {
                        required: "Acest camp este obligatoriu.",
                        minlength: "Parola trebuie sa contina minim 5 caractere.",
                        equalTo: "Parola nu este introdusa la fel in ambele campuri."
                    },
                    rpassword: {
                        required: "Acest camp este obligatoriu.",
                        minlength: "Parola trebuie sa contina minim 5 caractere.",
                        equalTo: "Parola nu este introdusa la fel in ambele campuri."
                    },
                    userRights: {
                        required: "Nu a fost selectata o optiune."
                    },
                    active: {
                        required: "Nu a fost selectata o optiune."
                    },
                    name: {
                        required: "Acest camp nu a fost completat."
                    },
                    surname: {
                        required: "Acest camp nu a fost completat."
                    },
                     email: {
                        required: "Acest camp nu a fost completat."
                    },
                     phone: {
                        required: "Acest camp nu a fost completat.",
                        minlength: "Numarul de telefon trebuie sa contina minim 10 caractere."
                    },
                    tipBeneficiari : {
                        required: "Tipul beneficiarilor nu a fost introdus."
                    }
                },
                invalidHandler: function (event, validator) { //display error alert on form submit              
                    success1.hide();
                    error1.show();
                    Metronic.scrollTo(error1, -200);
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (form) {
                    success1.show();
					document.getElementById("editUserForm").submit();
                    error1.hide();
                }
            });


    }

   

    return {
        //main function to initiate the module
        init: function () {

            
            insertNewUser();
			editUser();

        }

    };

}();