<?php
// Include database connection
include '../php/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming your form sends 'employee_id', 'type', and 'description'
    $exam_id = isset($_POST['exam_id']) ? intval($_POST['exam_id']) : null;
    $exam = isset($_POST['exam']) ? $_POST['exam'] : '';
    $description = isset($_POST['exam_description']) ? $_POST['exam_description'] : '';
    $code = isset($_POST['code']) ? $_POST['code'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // Validate data here (example: check if not empty, etc.)
    if ($exam_id && !empty($exam) && !empty($description)) {
        // Prepare SQL statement to update the Exam
        $stmt = $conn->prepare("UPDATE Exams SET exam = ?, exam_description = ?, code = ?, password = ? WHERE Exam_ID = ?");
        $stmt->bind_param("ssssi", $exam, $description, $code, $password, $exam_id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "Exam updated successfully.";
            header("Location: /online_examination22/department_head/department_head_view_exams.php"); 
        } else {
            echo "No changes were made or ticket not found.";
        }
        
        $stmt->close();
    } else {
        echo "Invalid input or missing data.";
    }
} else {
    echo "Invalid request method.";
}

$conn->close();
?>
