<?php
include 'database.php'; // Includes MySQLi connection from 'database.php'

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and validate form data
    $fname = htmlspecialchars($_POST['can_fname']);
    $lname = htmlspecialchars($_POST['can_lname']);
    $source = htmlspecialchars($_POST['source']);
    $email = htmlspecialchars($_POST['can_email']);
    $phone = htmlspecialchars($_POST['can_contact']);
    $exam = htmlspecialchars($_POST['can_Exam_ID']);
    $addOn = "10/05/2024";
    $password = password_hash("12345678", PASSWORD_DEFAULT); // Encrypt the password

    // Assume department_ID, candidate_ID are collected from the form or are set to default values
    $departmentID = null; 
    $employeeID = null; 

    // SQL to insert into Employee table
    $sql = "INSERT INTO NewCandidate (email, add_on, source, Exam_ID) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("MySQL prepare error: " . $conn->error);
    }

    $stmt->bind_param("sssi", $email, $addOn, $source, $exam);
    $stmt->execute();
    $candidateID = $conn->insert_id; // Get the ID of the newly created employee record

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
        header("Location: /online_examination22/hr_admin/hr_admin_view_candidates.php"); 
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>
