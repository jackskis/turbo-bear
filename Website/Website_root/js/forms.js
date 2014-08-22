function confirmMatch (form, password, conf) {
    if (password.value == conf.value) {
        if(form.submit()) {
            alert("form submitted");
        }
    }
    else {
        if(form.submit()) {
            alert("form submitted");
        }
    }
}

function confpasshash(form, password, conf) {
    // Create a new element input, this will be our hashed password field. 
    var p = document.createElement("input");
    var c = document.createElement("input");

    if (password.value != "" && conf.value != "") {
         alert("Both fields have content.")
        // Add the new element to our form.
        form.appendChild(c);
        c.name = "c";
        c.type = "hidden";
        c.value = hex_sha512(conf.value);
        
        // Add the new element to our form. 
        form.appendChild(p);
        p.name = "p";
        p.type = "hidden";
        p.value = hex_sha512(password.value);
     
        // Make sure the plaintext password doesn't get sent. 
        password.value = "";
        conf.value = "";
     
        // Finally submit the form. 
        form.submit();
    }else {
        alert("Please enter data into all fields!");
    }
}

function formhash(form, password) {
    // Create a new element input, this will be our hashed password field. 
    var p = document.createElement("input");
 
    // Add the new element to our form. 
    form.appendChild(p);
    p.name = "p";
    p.type = "hidden";
    p.value = hex_sha512(password.value);
 
    // Make sure the plaintext password doesn't get sent. 
    password.value = "";
 
    // Finally submit the form. 
    form.submit();
}
 
function regformhash(form, uid, email, password, conf) {
     // Check each field has a value
    if (uid.value == ''         || 
          email.value == ''     || 
          password.value == ''  || 
          conf.value == '') {
 
        alert('You must provide all the requested details. Please try again');
        return false;
    }
 
    // Check the username
 
    re = /^\w+$/; 
    if(!re.test(form.username.value)) { 
        alert("Username must contain only letters, numbers and underscores. Please try again"); 
        form.username.focus();
        return false; 
    }
 
    // Check that the password is sufficiently long (min 6 chars)
    // The check is duplicated below, but this is included to give more
    // specific guidance to the user
    if (password.value.length < 6) {
        alert('Passwords must be at least 6 characters long.  Please try again');
        form.password.focus();
        return false;
    }
 
    // At least one number, one lowercase and one uppercase letter 
    // At least six characters 
 
    var re = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/; 
    if (!re.test(password.value)) {
        alert('Passwords must contain at least one number, one lowercase and one uppercase letter.  Please try again');
        return false;
    }
 
    // Check password and confirmation are the same
    if (password.value != conf.value) {
        alert('Your password and confirmation do not match. Please try again');
        form.password.focus();
        return false;
    }
 
    // Create a new element input, this will be our hashed password field. 
    var p = document.createElement("input");
 
    // Add the new element to our form. 
    form.appendChild(p);
    p.name = "p";
    p.type = "hidden";
    p.value = hex_sha512(password.value);
 
    // Make sure the plaintext password doesn't get sent. 
    password.value = "";
    conf.value = "";
 
    // Finally submit the form. 
    form.submit();
    return true;
}

function fillEmail(form, email) {
    if(email == '')
    {
        alert("You must provide an email address.")
    }

    form.submit();
}


