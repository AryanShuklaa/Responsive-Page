document.getElementById('registrationForm').addEventListener('submit', function(event) {
    var isValid = true;

    // Validate Email
    var email = document.getElementById('email').value;
    if (!email.includes('@')) {
        alert('Email must contain @');
        isValid = false;
    }

    // Validate Phone Number
    var phone = document.getElementById('phone').value;
    if (phone.length !== 10) {
        alert('Phone number must have 10 digits');
        isValid = false;
    }

    if (!isValid) {
        event.preventDefault(); // Prevent form submission
    }
});
