<?php
session_start(); // Ensure the session is started
if (!isset($_SESSION['user_id'])||$_SESSION['position']!="it-support") {
    // Redirect user to login page if not logged in
    header("Location: ../login.html");
    exit();
}
$user_id = $_SESSION['user_id'];
$position = $_SESSION['position'];
?>


<DOCTYPE.html>
  <html>
    <head>
      <title>IT Support</title>
      <link rel="stylesheet" href="../styles/styles.css" />
      <link rel="preconnect" href="https://fonts.googleapis.com" />
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
      <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet"
      />
      <link rel="stylesheet" href="../images/icons/css/font-awesome.min.css" />

      <script src="../js/it_support.js"></script>
    </head>
    <body>
      <div class="d-flex">
        <div class="menu">
          <div class="logo-section">
            <img width="80%" src="../images/images.png" />
          </div>
          <div class="form-title">Employee Management</div>
          <div class="menu-list-inactive">
            <i class="fa fa-user pe-3" aria-hidden="true"></i>
            <a class="select-a" href="./it_support.php">Add Users </a>
          </div>
          <div class="menu-list">
            <i class="fa fa-user-o pe-3" aria-hidden="true"></i>
            <a class="select-a" href="./it_support_display.php">View Users</a>
          </div>
          <div class="form-title">Ticket Management</div>
          <div class="menu-list-inactive">
            <i class="fa fa-pencil-square-o pe-3" aria-hidden="true"></i>
            <a class="select-a" href="./view_tickets.php">View Tickets</a>
          </div>
        </div>
        <div class="container">
          <div class="header-section">
            <div class="d-flex align-items-center">
              <div class="p-3 header-title">IT Support</div>
              <div class="header-right-items">
                <img
                  src="../images/img_avatar.png"
                  alt="Avatar"
                  class="avatar"
                />
                <a class="select-a" href="../login.html"><button class="logout-btn">logout</button></a>
              </div>
            </div>
          </div>

          <div class="content-section">
            <div class="p-3 table-header">Details of Employees</div>

            <div class="d-flex1 justify-content-center">
          <?php
    // Database connection 
    include '../php/database.php';

    // SQL to retrieve combined data from Employee and User tables using JOIN
    $sql = "SELECT Employee.Employee_ID, Employee.First_Name AS Emp_First_Name, Employee.Last_Name AS Emp_Last_Name, Employee.DOB, Employee.Position, 
            User.User_ID, User.First_Name AS User_First_Name, User.Last_Name AS User_Last_Name, User.Candidate_ID, User.Email
            FROM Employee
            JOIN User ON Employee.Employee_ID = User.Employee_ID 
            WHERE User.Candidate_ID IS NULL";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table ><tr><th>Employee ID</th><th>Employee First Name</th><th>Employee Last Name</th><th>DOB</th><th>Position</th><th>User ID</th><th>Email</th><th>Action</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["Employee_ID"] . "</td><td>" . $row["Emp_First_Name"] . "</td><td>" . $row["Emp_Last_Name"] . "</td><td>" . $row["DOB"] . "</td><td>" . $row["Position"] . "</td><td>" . $row["User_ID"] . "</td><td>" . $row["Email"] . "</td><td><a href='it_support_update.php?employee_id=" . $row["Employee_ID"] . "&user_id=" . $row["User_ID"] . "'>Update</a></td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }

    // Close connection
    $conn->close();
    ?></div>

          </div>
          <div class="footer-section">@copyright 2024</div>
        </div>
      </div>
    </body>
  </html>
</DOCTYPE.html>
