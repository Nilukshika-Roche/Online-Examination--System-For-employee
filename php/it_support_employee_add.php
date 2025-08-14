<?php
include 'database.php'; // Includes MySQLi connection from 'database.php'

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and validate form data
    $fname = htmlspecialchars($_POST['fname']);
    $lname = htmlspecialchars($_POST['lname']);
    $dob = $_POST['dob'];
    $position = htmlspecialchars($_POST['position']);
    $email = htmlspecialchars($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Encrypt the password

    // Assume department_ID, candidate_ID are collected from the form or are set to default values
    $departmentID = 1; // or a fixed value if it's the same for all entries
    $candidateID = null; // this might come from another part of your application

    // SQL to insert into Employee table
    $sql = "INSERT INTO Employee (First_Name, Last_Name, DOB, Position, Department_ID) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("MySQL prepare error: " . $conn->error);
    }

    $stmt->bind_param("ssssi", $fname, $lname, $dob, $position, $departmentID);
    $stmt->execute();
    $employeeID = $conn->insert_id; // Get the ID of the newly created employee record

    // SQL to insert into User table
    $sql = "INSERT INTO User (First_Name, Last_Name, Candidate_ID, Employee_ID, Department_ID, Email, Password) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("MySQL prepare error: " . $conn->error);
    }
    
    $stmt->bind_param("ssiiiss", $fname, $lname, $candidateID, $employeeID, $departmentID, $email, $password);
    $stmt->execute();

    if ($stmt->error) {
        die("ERROR: Could not able to execute $sql. " . $stmt->error);
    } else {
        echo "Records inserted successfully.";
        header("Location: /online_examination22/it_support/it_support_display.php"); 
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>
