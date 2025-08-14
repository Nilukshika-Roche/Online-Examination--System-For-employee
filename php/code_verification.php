<?php
include 'database.php';  // Ensure this file contains MySQLi connection setup


// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['exam_id']) && isset($_POST['exam_Password'])) {
        $exam_id = $_POST['exam_id'];
        $exam_password = $_POST['exam_Password'];

        $stmt = $conn->prepare("SELECT Exam_ID, code, password FROM Exams WHERE code = ? AND password = ?");
        $stmt->bind_param("ss", $exam_id, $exam_password);
        $stmt->execute();
        $result = $stmt->get_result(); 
        if ($row = $result->fetch_assoc()) {

            header("Location: /online_examination22/employee/employee_exam.php?exam_id=" . $row['Exam_ID']);

        }

         else {
            // Redirect if not an employee or login failed
            header("Location: login_failure.php");
        }
        exit(); // Ensure no further execution occurs after redirection
    } else {
        echo "Please fill in all required fields.";
    }
} else {
    echo "Please submit the form.";
}
?>
