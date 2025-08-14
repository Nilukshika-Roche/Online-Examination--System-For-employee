<?php
// Include the database connection file
include 'database.php';  // Update the path if necessary to your database connection settings

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize input data
    $description = $conn->real_escape_string($_POST['ticket_description']);
    $type =  $conn->real_escape_string($_POST['ticket_type']);  // As the ticket type is disabled in the form and set to "complaint"

    // Assuming a session or another method is used to retrieve the user ID
    $user_id = 1;  // Uncomment and modify according to your user session handling
    //$user_id = 1;  // Placeholder for demonstration purposes; replace with actual user ID handling logic

    // Prepare the SQL statement
    $sql = "INSERT INTO Ticket (Description, Type, Date, User_ID) VALUES (?, ?, CURDATE(), ?)";

    // Prepare and bind
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die('MySQL prepare error: ' . $conn->error);
    }

    // Bind the parameters
    $stmt->bind_param('ssi', $description, $type, $user_id);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Inquiry saved successfully.";
        header("Location: /online_examination22/new_candidate/new_candidate_issue_view.php"); 
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>
