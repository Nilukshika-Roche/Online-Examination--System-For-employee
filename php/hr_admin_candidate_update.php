<?php
include 'database.php';

if (isset($_POST['candidate_id'], $_POST['user_id'])) {
    $candidate_id = $_POST['candidate_id'];
    $user_id = $_POST['user_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $source = $_POST['source'];
    $email = $_POST['email'];

    $sql_employee = "UPDATE NewCandidate SET  source = ? WHERE Candidate_ID = ?";
    $stmt_employee = $conn->prepare($sql_employee);
    $stmt_employee->bind_param("si", $source, $candidate_id);
    $stmt_employee->execute();

    $sql_user = "UPDATE User SET First_Name = ?, Last_Name = ?, Email = ? WHERE User_ID = ?";
    $stmt_user = $conn->prepare($sql_user);
    $stmt_user->bind_param("sssi", $first_name, $last_name, $email, $user_id);
    $stmt_user->execute();

    echo "Record updated successfully.";
    header("Location: /online_examination22/hr_admin/hr_admin_view_candidates.php"); 
} else {
    echo "Invalid update request.";
}
$conn->close();
?>
