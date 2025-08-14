<?php
include 'database.php';

if (isset($_POST['employee_id'], $_POST['user_id'])) {
    $employee_id = $_POST['employee_id'];
    $user_id = $_POST['user_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $dob = $_POST['dob'];
    $position = $_POST['position'];
    $email = $_POST['email'];

    $sql_employee = "UPDATE Employee SET First_Name = ?, Last_Name = ?, DOB = ?, Position = ? WHERE Employee_ID = ?";
    $stmt_employee = $conn->prepare($sql_employee);
    $stmt_employee->bind_param("ssssi", $first_name, $last_name, $dob, $position, $employee_id);
    $stmt_employee->execute();

    $sql_user = "UPDATE User SET Email = ? WHERE User_ID = ?";
    $stmt_user = $conn->prepare($sql_user);
    $stmt_user->bind_param("si", $email, $user_id);
    $stmt_user->execute();

    echo "Record updated successfully.";
    header("Location: /online_examination22/it_support/it_support_display.php"); 
} else {
    echo "Invalid update request.";
}
$conn->close();
?>
