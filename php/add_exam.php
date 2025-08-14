<?php
include 'database.php'; // Includes MySQLi connection from 'database.php'

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and validate form data
    $exam = htmlspecialchars($_POST['exam']);
    $exam_description = htmlspecialchars($_POST['exam_description']);
    $exam_code = htmlspecialchars($_POST['exam_code']);
    $exam_password = htmlspecialchars($_POST['exam_password']);
    $add_on='2024-05-01';
    $CreatedBy='1';
  

    // SQL to insert into Employee table
    $sql = "INSERT INTO Exams (exam, exam_description, add_on, CreatedBy, code, password) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("MySQL prepare error: " . $conn->error);
    }

    $stmt->bind_param("sssiss",$exam, $exam_description, $add_on, $CreatedBy, $exam_code, $exam_password);
    $stmt->execute();
    if ($stmt->error) {
        die("ERROR: Could not able to execute $sql. " . $stmt->error);
    } else {
        echo "Records inserted successfully.";
        header("Location: /online_examination22/department_head/department_head_questions.php"); 
      
    }
    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>
