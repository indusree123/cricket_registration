<?php

function isDuplicateRegistration($registerNumber, $conn)
{
    // Query to check if the register number already exists
    $sql = "SELECT registerNumber FROM player_registration WHERE registerNumber = '$registerNumber'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Duplicate registration found
        return true;
    } else {
        // No duplicate registration found
        return false;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $registerNumber = $_POST['registerNumber'];
    $name = $_POST['name'];
    $college = $_POST['college'];
    $address = $_POST['address'];
    $contactNumber = $_POST['contactNumber'];
    $email = $_POST['email'];

    // Set default values for player details
    $player2Details = $player3Details = $player4Details = $player5Details = $player6Details = $player7Details = $player8Details = $player9Details = $player10Details = $player11Details = "";

    // Set default values for player roles
    $player2Role = $player3Role = $player4Role = $player5Role = $player6Role = $player7Role = $player8Role = $player9Role = $player10Role = $player11Role = "";


    // Check if player2 details and role are set
    if (isset($_POST['player2Details'])) {
        $player2Details = $_POST['player2Details'];
        $player2Role = $_POST['player2Role'];
    }

    // Check if player3 details and role are set
    if (isset($_POST['player3Details'])) {
        $player3Details = $_POST['player3Details'];
        $player3Role = $_POST['player3Role'];
    }

    // Check if player4 details and role are set
    if (isset($_POST['player4Details'])) {
        $player4Details = $_POST['player4Details'];
        $player4Role = $_POST['player4Role'];
    }

    // Check if player5 details and role are set
    if (isset($_POST['player5Details'])) {
        $player5Details = $_POST['player5Details'];
        $player5Role = $_POST['player5Role'];
    }

    // Check if player6 details and role are set
    if (isset($_POST['player6Details'])) {
        $player6Details = $_POST['player6Details'];
        $player6Role = $_POST['player6Role'];
    }

    // Check if player7 details and role are set
    if (isset($_POST['player7Details'])) {
        $player7Details = $_POST['player7Details'];
        $player7Role = $_POST['player7Role'];
    }

    // Check if player8 details and role are set
    if (isset($_POST['player8Details'])) {
        $player8Details = $_POST['player8Details'];
        $player8Role = $_POST['player8Role'];
    }

    // Check if player9 details and role are set
    if (isset($_POST['player9Details'])) {
        $player9Details = $_POST['player9Details'];
        $player9Role = $_POST['player9Role'];
    }

    // Check if player10 details and role are set
    if (isset($_POST['player10Details'])) {
        $player10Details = $_POST['player10Details'];
        $player10Role = $_POST['player10Role'];
    }

    // Check if player11 details and role are set
    if (isset($_POST['player11Details'])) {
        $player11Details = $_POST['player11Details'];
        $player11Role = $_POST['player11Role'];
    }

    // Set default values for captain details and role
    $captainDetails = isset($captainDetails) ? $captainDetails : "";
    $captainRole = isset($captainRole) ? $captainRole : "";

    // Set default values for substitute1 details and role
    $substitute1Details = isset($substitute1Details) ? $substitute1Details : "";
    $substitute1Role = isset($substitute1Role) ? $substitute1Role : "";

    // Set default values for substitute2 details and role
    $substitute2Details = isset($substitute2Details) ? $substitute2Details : "";
    $substitute2Role = isset($substitute2Role) ? $substitute2Role : "";


        // Database connection
        $servername = "localhost";
        $username = "my_database";
        $password = "my_database";
        $dbname = "cricket_db";
    
        $conn = new mysqli($servername, $username, $password, $dbname);
    
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        
        }
    
        if (isDuplicateRegistration($registerNumber, $conn)) {
            echo "Error: Duplicate registration! Player with the same Register Number already exists.";
            exit;
        }



    // Check if the file is set and not empty
    if (isset($_FILES['bonafide_certificate']) && !empty($_FILES['bonafide_certificate']['name'])) {
        $file = $_FILES['bonafide_certificate'];

        // Check if the file is a PDF
        $fileType = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        if ($fileType !== 'pdf') {
            echo "Error: Only PDF files are allowed.";
            exit;
        }

        // Specify the target directory for file upload
        $targetDirectory = 'E:/T&D/3-1/assignment_5(final)/uploads/';

        // Generate a unique name for the uploaded file
        $bonafideCertificate = uniqid('pdf_') . '.pdf';

        // Move the file to the specified directory
        if (move_uploaded_file($file['tmp_name'], $targetDirectory . $bonafideCertificate)) {
            echo "File uploaded successfully.";
        } else {
            echo "Error uploading file.";
            exit;
        }
    } else {
        echo "Error: No file selected.";
        exit;
    }




    // Insert data into the database (customize as needed)
    $sql = "INSERT INTO player_registration (
        registerNumber, name, college, address, contactNumber, email, bonafideCertificate,
        captainDetails, captainRole,
        player2Details, player2Role,
        player3Details, player3Role,
        player4Details, player4Role,
        player5Details, player5Role,
        player6Details, player6Role,
        player7Details, player7Role,
        player8Details, player8Role,
        player9Details, player9Role,
        player10Details, player10Role,
        player11Details, player11Role,
        substitute1Details, substitute1Role,
        substitute2Details, substitute2Role
    ) VALUES (
        '$registerNumber', '$name', '$college', '$address', '$contactNumber', '$email', '$bonafideCertificate',
        '$captainDetails', '$captainRole',
        '$player2Details', '$player2Role',
        '$player3Details', '$player3Role',
        '$player4Details', '$player4Role',
        '$player5Details', '$player5Role',
        '$player6Details', '$player6Role',
        '$player7Details', '$player7Role',
        '$player8Details', '$player8Role',
        '$player9Details', '$player9Role',
        '$player10Details', '$player10Role',
        '$player11Details', '$player11Role',
        '$substitute1Details', '$substitute1Role',
        '$substitute2Details', '$substitute2Role'
    )";

    if ($conn->query($sql) === true) {
        echo "Record added successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
