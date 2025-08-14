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

      <script src="../js/deparment_head.js"></script>
    </head>
    <body>
      <div class="d-flex">
        <div class="menu">
          <div class="logo-section">
            <img width="80%" src="../images/images.png" />
          </div>
          <div class="form-title">Exam Management</div>
          <div class="menu-list-inactive">
            <i class="fa fa-list pe-3" aria-hidden="true"></i> 
            <a class="select-a" href="./department_head.html">Add Exams </a>
          </div>
          <div class="menu-list">
            <i class="fa fa-list pe-3" aria-hidden="true"></i> 
            <a class="select-a" href="./department_head_view_exams.php">View Exams </a>
          </div>
          <div class="menu-list-inactive">
            <i class="fa fa-list pe-3" aria-hidden="true"></i> 
            <a class="select-a" href="./department_head_questions.php">Add Question </a>
          </div>
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

          <div class="d-flex p-3">
              <div
                class="col-6 d-flex1 justify-content-center align-items-center"
              >
                <img src="../images/dep addques.png" width="60%" height="auto" />
              </div>

              <div class="col-6">
            <?php
    include '../php/database.php';

    if (isset($_GET['exam_id'])) {
        $exam_id = $_GET['exam_id'];


        $sql = "SELECT Exam_ID, exam, exam_description, code, password FROM Exams WHERE Exam_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $exam_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        if ($row) {
            echo "<form action='../php/department_head_exam_update.php' method='post'>
            <div class='form-section'>
            <div class='form-title'>Update Exam Details</div>
             <input type='hidden'  name='exam_id' value='" . htmlspecialchars($row['Exam_ID']) . "' /> 
                    <div class='pb-3'>  Exam Name: <input type='text' class='input-style' name='exam' value='" . htmlspecialchars($row['exam']) . "' /></div>
                    <div class='pb-3'> Exam Description: <input type='text' class='input-style' name='exam_description' value='" . htmlspecialchars($row['exam_description']) . "' /></div>
                    <div class='pb-3'> Exam Code: <input type='text' name='code' class='input-style' value='" . htmlspecialchars($row['code']) . "' /> </div>
                    <div class='pb-3'> Exam Password: <input type='text' class='input-style' name='password' value='" . htmlspecialchars($row['password']) . "' /> </div>
                    <input type='submit' class='login-submit' value='Update Record' />  
                    <button type='button' class='login-submit-delete' onclick='confirmDelete();'>Delete Record</button>
                    </div>
                </form>";
        } else {
            echo "No record found.";
        }
    } else {
        echo "Invalid request.";
    }
    $conn->close();
    ?></div>

          </div>
</div>

          <div class="footer-section">@copyright 2024</div>
        </div>
      </div>
    </body>
  </html>
</DOCTYPE.html>
