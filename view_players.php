<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = $_POST['password'];

    // Check if the entered password is correct
    if ($password === 'vignancricket') {
        // Password is correct, proceed to display registered players
        // Include your logic to retrieve and display player details here
        echo "Authentication successful. Displaying registered players.";

        // Database connection
        $servername = "localhost";
        $username = "my_database";
        $password = "my_database";
        $dbname = "cricket_db";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

    // Retrieve and display registered players
$sql = "SELECT * FROM player_registration";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>
            <tr>
                <th>Name</th>
                <th>Register Number</th>
                <th>College Name</th>
                <th>Address</th>
                <th>Contact Number</th>
                <th>Email</th>
                <th>Bonafide Certificate</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row['name'] . "</td>
                <td>" . $row['registerNumber'] . "</td>
                <td>" . $row['college'] . "</td>
                <td>" . $row['address'] . "</td>
                <td>" . $row['contactNumber'] . "</td>
                <td>" . $row['email'] . "</td>
                <td><a href='uploads/" . $row['bonafideCertificate'] . "' target='_blank'>View Certificate</a></td>
            </tr>";
    }

    echo "</table>";
} else {
    echo "No registered players.";
}

        // Close the database connection
        $conn->close();

    } else {
        // Password is incorrect, display an error message
        echo "Incorrect password. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Registered Players</title>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        h1 {
            color: #333;
        }

        form {
            margin-top: 20px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 12px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>View Registered Players</h1>
    <form method="post" action="">
        <h4>admin:vignan university
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">Submit</button>
    </form>
</body>
</html>

