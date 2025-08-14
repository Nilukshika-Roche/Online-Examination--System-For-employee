<?php
include '../php/database.php';

if (isset($_GET['employee_id'])) {
    $employee_id = $_GET['employee_id'];

    // Begin transaction
    $conn->begin_transaction();

    try {
        // Delete User records
        $sql_delete_user = "DELETE FROM User WHERE Employee_ID = ?";
        $stmt = $conn->prepare($sql_delete_user);
        $stmt->bind_param("i", $employee_id);
        $stmt->execute();

        // Delete Employee record
        $sql_delete_employee = "DELETE FROM Employee WHERE Employee_ID = ?";
        $stmt = $conn->prepare($sql_delete_employee);
        $stmt->bind_param("i", $employee_id);
        $stmt->execute();

        // Commit transaction
        $conn->commit();
        echo "Records deleted successfully.";
        header("Location: /online_examination22/it_support/it_support_display.php"); 

    } catch (mysqli_sql_exception $exception) {
        $conn->rollback(); // Rollback transaction on error
        echo "Error deleting records: " . $exception->getMessage();
    }

    $conn->close();
} else {
    echo "Invalid request.";
}
?>
