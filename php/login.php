<?php
session_start(); // Start the session at the beginning
include 'database.php';

function loginUser($conn, $email, $password) {
    $stmt = $conn->prepare("SELECT User.User_ID, User.Password, Employee.Position FROM User LEFT JOIN Employee ON User.Employee_ID = Employee.Employee_ID WHERE User.Email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        if (password_verify($password, $row['Password'])) {
            // Save user ID and position to session
            $_SESSION['user_id'] = $row['User_ID'];
            $_SESSION['position'] = $row['Position'];
            return $row['Position'];
        }
    }
    return false;
}
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if email and password are set
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $email = $_POST['username'];
        $password = $_POST['password'];

        // Attempt to log in
        $position = loginUser($conn, $email, $password);
        
        if ($position) {
            // Redirect based on position
            switch ($position) {
                case 'it-support':
                    header("Location: /online_examination22/it_support/it_support.php"); 
                    break;
                case 'department-head':
                    header("Location: /online_examination22/department_head/department_head.php"); 
                    break;
                case 'employee':
                    header("Location: /online_examination22/employee/employee_attempt_new.php"); 
                    break;    
                case 'qa':
                    header("Location: /online_examination22/qa_support/qa_assuarance.php"); 
                    break;   
                case 'new-candidate':
                    header("Location: /online_examination22/new_candidate/new_candidate.php"); 
                    break;
                case 'hr-admin':
                    header("Location: /online_examination22/hr_admin/hr_admin.php"); 
                    break;                             
                default:
                    header("Location: login_failure.php"); // Default employee page
                    break;
            }
        } else {
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
