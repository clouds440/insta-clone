    // Profile picture preview after uploading
    window.addEventListener('load', function() {
    document.getElementById('fileUpload').addEventListener('change', function() {
    if (this.files && this.files[0]) {
        var img = document.getElementById('preview')
        img.onload = function() {
        URL.revokeObjectURL(img.src) // no longer needed, free memory
        }
        img.src = URL.createObjectURL(this.files[0]); // set src to blob url
        img.style.width = "100%"
        img.style.height = "260px"
        img.style.objectFit = "cover"
        img.style.borderRadius = "15px"
        img.style.marginBottom = "10px"
        img.style.marginTop = "10px"
    }
    });
});

function fieldLeftEmpty(fieldId) {
    var field = document.getElementById(fieldId)
    if (field.value === "") {
        field.style.border = "2px solid rgba(230, 30, 30, 0.6)"
    }
    else {
        field.style.border = "1px solid rgba(40, 40, 40, 0.2)"
    }
}

function validateName(evt) {
    var iKeyCode = (evt.which) ? evt.which : evt.keyCode;

    if (!((iKeyCode >= 65 && iKeyCode <= 90) || // A-Z
        (iKeyCode >= 97 && iKeyCode <= 122))) { // a-z
        document.getElementById("errorMessage").innerHTML = "You can only enter letters here";
        return false;
    }

    document.getElementById("errorMessage").innerHTML = "";
    return true;
}

function isNumber(evt) {
    var iKeyCode = (evt.which) ? evt.which : evt.keyCode
    if (iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57)) {
        document.getElementById("errorMessage").innerHTML = "You can only enter numbers here"
        return false;
    }
    document.getElementById("errorMessage").innerHTML = ""
    return true;
}

function validateForm() {
    var password = document.getElementById("password");
    var confPassword = document.getElementById("confirmPassword");
    var fileInput = document.getElementById('fileUpload');
    var errorMessage = document.getElementById("errorMessage");

    // Add event listeners to password fields
    password.addEventListener('input', validatePasswords);
    confPassword.addEventListener('input', validatePasswords);

    document.getElementById('registrationForm').addEventListener('submit', function(event) {
        var filePath = fileInput.value;
        validatePasswords();

        // Check if any file is selected
        if (!filePath) {
            errorMessage.innerHTML = "Profile picture is not selected";
            event.preventDefault();
        }
    });

    function validatePasswords() {
        if (password.value != confPassword.value) {
            errorMessage.innerHTML = "Passwords do not match";
            event.preventDefault();
        } else {
            errorMessage.innerHTML = ""; // Clear the error message when passwords match
        }
    }
}