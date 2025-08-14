<?php
include 'database.php'; // Includes MySQLi connection from 'database.php'

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and validate form data
    $Exam_ID = htmlspecialchars($_POST['Exam_ID']);
    $question = htmlspecialchars($_POST['question']);
    $answer = htmlspecialchars($_POST['correct_answer']);
    $add_on='2024-05-01';
    $CreatedBy='1';
  

    // SQL to insert into Employee table
    $sql = "INSERT INTO Questions (question, answer, add_on, CreatedBy, Exam_ID) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("MySQL prepare error: " . $conn->error);
    }

    $stmt->bind_param("sssii", $question, $answer, $add_on, $CreatedBy, $Exam_ID);
    $stmt->execute();
    if ($stmt->error) {
        die("ERROR: Could not able to execute $sql. " . $stmt->error);
    } else {
        echo "Records inserted successfully.";
      
    }
    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>
