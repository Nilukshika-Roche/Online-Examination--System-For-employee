<?php
include '../php/database.php';

if (isset($_GET['candidate_id'])) {
    $candidate_id = $_GET['candidate_id'];

    // Begin transaction
    $conn->begin_transaction();

    try {
        // Delete User records
        $sql_delete_user = "DELETE FROM User WHERE Candidate_ID = ?";
        $stmt = $conn->prepare($sql_delete_user);
        $stmt->bind_param("i", $candidate_id);
        $stmt->execute();

        // Delete NewCandidate record
        $sql_delete_candidate = "DELETE FROM NewCandidate WHERE Candidate_ID = ?";
        $stmt = $conn->prepare($sql_delete_candidate);
        $stmt->bind_param("i", $candidate_id);
        $stmt->execute();

        // Commit transaction
        $conn->commit();
        echo "Records deleted successfully.";
        header("Location: /online_examination22/hr_admin/hr_admin_view_candidates.php"); 

    } catch (mysqli_sql_exception $exception) {
        $conn->rollback(); // Rollback transaction on error
        echo "Error deleting records: " . $exception->getMessage();
    }

    $conn->close();
} else {
    echo "Invalid request.";
}
?>
