<?php
// Include database connection
include '../php/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming your form sends 'employee_id', 'type', and 'description'
    $ticket_id = isset($_POST['ticket_id']) ? intval($_POST['ticket_id']) : null;
    $type = isset($_POST['type']) ? $_POST['type'] : '';
    $description = isset($_POST['description']) ? $_POST['description'] : '';

    // Validate data here (example: check if not empty, etc.)
    if ($ticket_id && !empty($type) && !empty($description)) {
        // Prepare SQL statement to update the ticket
        $stmt = $conn->prepare("UPDATE Ticket SET Description = ?, Type = ? WHERE Ticket_ID = ?");
        $stmt->bind_param("ssi", $description, $type, $ticket_id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "Ticket updated successfully.";
            header("Location: /online_examination22/qa_support/view_inquries.php"); 
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
