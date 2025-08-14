<?php
include '../php/database.php';

if (isset($_GET['ticket_id'])) {
    $ticket_id = $_GET['ticket_id'];

    // Begin transaction
    $conn->begin_transaction();

    try {
        // Delete User records
        $sql_delete_ticket = "DELETE FROM Ticket WHERE Ticket_ID = ?";
        $stmt = $conn->prepare($sql_delete_ticket);
        $stmt->bind_param("i", $ticket_id);
        $stmt->execute();

        // Commit transaction
        $conn->commit();
        echo "Records deleted successfully.";
        header("Location: /online_examination22/new_candidate/new_candidate_issue_view.php");

    } catch (mysqli_sql_exception $exception) {
        $conn->rollback(); // Rollback transaction on error
        echo "Error deleting records: " . $exception->getMessage();
    }

    $conn->close();
} else {
    echo "Invalid request.";
}
?>
