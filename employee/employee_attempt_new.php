<?php
session_start(); // Ensure the session is started
if (!isset($_SESSION['user_id'])||$_SESSION['position']!="employee") {
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
      <title>Employee</title>
      <link rel="stylesheet" href="../styles/styles.css" />
      <link rel="preconnect" href="https://fonts.googleapis.com" />
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
      <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet"
      />
      <link rel="stylesheet" href="../images/icons/css/font-awesome.min.css" />
    </head>
    <body>
      <div class="d-flex">
        <div class="menu">
          <div class="logo-section">
            <img width="80%" src="../images/images.png" />
          </div>
          <div class="form-title">Examinations</div>
          <div class="menu-list">
            <i class="fa fa-list pe-3" aria-hidden="true"></i> 
            <a class="select-a" href="./employee_attempt_new.php">Attempt Exams </a>
          </div>
          <div class="menu-list">
            <i class="fa fa-list pe-3" aria-hidden="true"></i> 
            <a class="select-a" href="./employee_training.php">Request Training </a>
          </div>

          <div class="menu-list">
            <i class="fa fa-list pe-3" aria-hidden="true"></i> 
            <a class="select-a" href="./view_training.php">View Requested Training </a>
          </div>

        </div>
        <div class="container">
          <div class="header-section">
            <div class="d-flex align-items-center">
              <div class="p-3 header-title">Employee</div>
              <div class="header-right-items">
                <img
                  src="../images/img_avatar.png"
                  alt="Avatar"
                  class="avatar"
                />
                <a class="select-a" href="../login.html"
                  ><button class="logout-btn">logout</button></a
                >
              </div>
            </div>
          </div>

          <div class="content-section">
            <div class="d-flex p-3">
              <div
                class="col-6 d-flex1 justify-content-center align-items-center"
              >
                <img
                  src="../images/emp previous.png"
                  width="90%"
                  height="auto"
                />
              </div>

              <div class="col-6">
                <form method="post" action="../php/code_verification.php">
                  <div class="form-section">
                    <div class="form-title">Attemt New Exam</div>
                    <div class="pb-3">
                      <input
                        class="input-style"
                        placeholder="Exam ID"
                        type="text"
                        name="exam_id"
                        id="exam_id"
                      />
                    </div>

                    <div class="pb-3">
                      <input
                        class="input-style"
                        placeholder="Password"
                        type="text"
                        name="exam_Password"
                        id="exam_Password"
                      />
                    </div>

                    <input
                      type="submit"
                      value="Submit"
                      class="login-submit"
                      name="exam_code_submit"
                      id-="exam_code_submit"
                    />
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="footer-section">@copyright 2024</div>
        </div>
      </div>
    </body>
  </html>
</DOCTYPE.html>
