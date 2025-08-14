<?php
session_start(); // Ensure the session is started
if (!isset($_SESSION['user_id'])||$_SESSION['position']!="hr-admin") {
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

      <script src="../js/script.js"></script>
    </head>
    <body>
      <div class="d-flex">
        <div class="menu">
          <div class="logo-section">
            <img width="80%" src="../images/images.png" />
          </div>
          <div class="form-title">HR Management</div>
          <div class="menu-list-inactive">
            <i class="fa fa-address-card-o pe-3" aria-hidden="true"></i> 
            <a class="select-a" href="./hr_admin.php">Add Candidates</a>
          </div>
          <div class="menu-list">
            <i class="fa fa-address-card pe-3" aria-hidden="true"></i> 
            <a class="select-a" href="./hr_admin_view_candidates.php">View Candidates</a>
          </div>
        </div>
        <div class="container">
          <div class="header-section">
            <div class="d-flex align-items-center">
              <div class="p-3 header-title">HR Admint</div>
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
            <div class="p-3 table-header">Details of Candidates</div>

            <div class="d-flex1 justify-content-center">
          <?php
    // Database connection 
    include '../php/database.php';

    // SQL to retrieve combined data from Employee and User tables using JOIN
    $sql = "SELECT NewCandidate.Candidate_ID, NewCandidate.source AS Source, NewCandidate.Exam_ID, 
            User.User_ID, User.First_Name AS User_First_Name, User.Last_Name AS User_Last_Name, User.Candidate_ID, User.Email
            FROM NewCandidate
            JOIN User ON NewCandidate.Candidate_ID = User.Candidate_ID 
            WHERE User.Employee_ID IS NULL";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table ><tr><th>Candidate ID</th><th>Candidate First Name</th><th>Candidate Last Name</th><th>Source</th><th>Assigned Exam</th><th>User ID</th><th>Email</th><th>Action</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["Candidate_ID"] . "</td><td>" . $row["User_First_Name"] . "</td><td>" . $row["User_Last_Name"] . "</td><td>" . $row["Source"] . "</td><td>" . $row["Exam_ID"] . "</td><td>" . $row["User_ID"] . "</td><td>" . $row["Email"] . "</td><td><a href='hr_admin_update.php?candidate_id=" . $row["Candidate_ID"] . "&user_id=" . $row["User_ID"] . "'>Update</a></td></tr>";
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
