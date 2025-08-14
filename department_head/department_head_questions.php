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
      <title>Department Head</title>
      <link rel="stylesheet" href="../styles/styles.css" />
      <link rel="preconnect" href="https://fonts.googleapis.com" />
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
      <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet"
      />
      <link rel="stylesheet" href="../images/icons/css/font-awesome.min.css" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
                <img src="../images/dep addques.png" width="90%" height="auto" />
              </div>
              <div class="col-6">
              <form method="post" action="../php/add_question.php">
                            <h1>Add Question</h1>
                            <div class="pb-3">
                                <select class="input-style" name="Exam_ID" id="Exam_ID">
                                  <option value="">Select Exam</option>
                                    <?php
                                        // Database connection 
                                        include '../php/database.php';

                                        // SQL to retrieve exams data
                                        $sql = "SELECT * FROM Exams;";
                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            while($row = $result->fetch_assoc()) {
                                                echo "<option value='" . $row["Exam_ID"] . "'>" . $row["exam"] . "</option>";
                                            }
                                        } else {
                                            echo "<option>No options</option>";
                                        }

                                        // Close connection
                                        $conn->close();
                                    ?>
                                </select>
                            </div>
                            <div class="pb-3">
                                <input class="input-style" placeholder="Enter Question" type="text" name="question" id="question" />
                            </div>
                            <div class="pb-3">
                                <input class="input-style" placeholder="Enter Correct Answer" type="text" name="correct_answer" id="correct_answer" />
                            </div>
                            <input class="login-submit" type="submit" value="Submit" name="exam_submit" id="question_submit" />
                        </form>
    </div>
    

            
          </div>
          
        </div>
        <div class="footer-section">@copyright 2024</div>
      </div>
    </body>
  </html>
</DOCTYPE.html>

