// Function to validate the registration form
function validateAndSubmit() {
    // Basic validation for demonstration purposes

    // Validation for personal details
    var registerNumber = document.getElementById('registerNumber').value;
    var name = document.getElementById('name').value;
    var college = document.getElementById('college').value;
    var address = document.getElementById('address').value;
    var contactNumber = document.getElementById('contactNumber').value;
    var email = document.getElementById('email').value;
    var bonafideCertificate = document.getElementById('bonafideCertificate').files[0]; // Get the file object

    // Validation for team members
    var captainDetails = document.getElementById('captainDetails').value;
    var captainRole = document.getElementById('captainRole').value;

    var mainPlayers = [];
    for (var i = 2; i <= 11; i++) {
        var playerDetails = document.getElementById('player' + i + 'Details').value;
        var playerRole = document.getElementById('player' + i + 'Role').value;
        mainPlayers.push({ details: playerDetails, role: playerRole });
    }

    var substituteDetails = document.getElementById('substitute1Details').value;
    var substituteRole = document.getElementById('substitute1Role').value;

    // Check if any field is empty
    if (
        !registerNumber || !name || !college || !address ||
        !contactNumber || !email || !bonafideCertificate ||
        !captainDetails || captainRole === 'Select Role' ||
        mainPlayers.some(player => !player.details || player.role === 'Select Role') ||
        !substituteDetails || substituteRole === 'Select Role'
    ) {
        alert('Please fill out all fields in the form.');
        return;
    }

    // Check for PDF format in bonafide certificate
    if (!validateBonafideCertificate(bonafideCertificate)) {
        alert('Please upload a valid PDF bonafide certificate.');
        return;
    }

    // Check for duplicate registration
    if (isDuplicateRegistration(registerNumber)) {
        alert('Duplicate registration! Player with the same Register Number already exists.');
        return;
    }

    // If all validations pass, you can submit the form or perform further actions
    alert('Registration successful!');
}

// Function to check if the uploaded bonafide certificate is in PDF format
function validateBonafideCertificate(file) {
    // Get the file extension
    var extension = file.name.split('.').pop().toLowerCase();

    // Check if the file is a PDF
    return extension === 'pdf';
}
