<?php
include '../php/database.php';

if (isset($_GET['exam_id'])) {
    $exam_id = $_GET['exam_id'];

    // Begin transaction
    $conn->begin_transaction();

    try {
        // Delete User records
        $sql_delete_exam = "DELETE FROM Exams WHERE Exam_ID = ?";
        $stmt = $conn->prepare($sql_delete_exam);
        $stmt->bind_param("i", $exam_id);
        $stmt->execute();

        // Commit transaction
        $conn->commit();
        echo "Records deleted successfully.";
        header("Location: /online_examination22/department_head/department_head_view_exams.php"); 

    } catch (mysqli_sql_exception $exception) {
        $conn->rollback(); // Rollback transaction on error
        echo "Error deleting records: " . $exception->getMessage();
    }

    $conn->close();
} else {
    echo "Invalid request.";
}
?>
