<?php
session_start(); // Ensure the session is started
if (!isset($_SESSION['user_id'])||$_SESSION['position']!="department-head") {
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
          <div class="form-title">Exam Management</div>
          <div class="menu-list">
            <i class="fa fa-list pe-3" aria-hidden="true"></i> 
            <a class="select-a" href="./department_head.php">Add Exams </a>
          </div>
          <div class="menu-list">
            <i class="fa fa-list pe-3" aria-hidden="true"></i> 
            <a class="select-a" href="./department_head_view_exams.php">View Exams </a>
          </div>
          <div class="menu-list-inactive">
            <i class="fa fa-list pe-3" aria-hidden="true"></i> 
            <a class="select-a" href="./department_head_questions.php">Add Question </a>
          </div>
          <!-- <div class="menu-list-inactive">
            <i class="fa fa-user-o pe-3" aria-hidden="true"></i> Check Result
          </div>
          <div class="menu-list-inactive">
            <i class="fa fa-user-o pe-3" aria-hidden="true"></i> Recommend to HR
          </div> -->
        </div>
        <div class="container">
          <div class="header-section">
            <div class="d-flex align-items-center">
              <div class="p-3 header-title">Department Head</div>
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
            <div class="p-3 table-header">Details of Exams</div>

            <div class="d-flex1 justify-content-center">
            <?php
              // Database connection 
              include '../php/database.php';

              // SQL to retrieve combined data from Employee and User tables using JOIN
              $sql = "SELECT Exam_ID, exam, exam_description, code, password FROM Exams";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                  echo "<table><tr><th>Exam ID</th><th>Exam</th><th>Exam Description</th><th>Code</th><th>Password</th><th>Action</th></tr>";
                  while($row = $result->fetch_assoc()) {
                      echo "<tr><td>" . $row["Exam_ID"] . "</td><td>" . $row["exam"] . "</td><td>" . $row["exam_description"] . "</td><td>" . $row["code"] . "</td><td>" . $row["password"] . "</td><td><a href='department_head_update_exams.php?exam_id=" . $row["Exam_ID"] . "'>Update</a></td></tr>";
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
