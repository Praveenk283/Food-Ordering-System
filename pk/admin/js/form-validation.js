$(function() {

  $("form[name='emp_form']").validate({
    // Specify validation rules
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
      e_name: {
        required: true,
        minlength: 3,
      },
      e_contact: "required",
      e_address: "required",
      e_email: {required: true, email: true,},
      e_username: "required",
      e_password: {required: true, minlength: 5,},
      }
    },
    // Specify validation error messages
    messages: {
      e_name: "Please enter your firstname",
      e_contact: "plz enter ph",
      e_address: "plz enter",
      e_password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      e_email: "Please enter a valid email address"
      e_username: "usenm",
    },
    
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    // submitHandler: function(form) {
    //   form.submit();
    // }
  });