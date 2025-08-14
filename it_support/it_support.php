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
          <div class="menu-list">
            <i class="fa fa-user pe-3" aria-hidden="true"></i>
            <a class="select-a" href="./it_support.php">Add Users </a>
          </div>
          <div class="menu-list-inactive">
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
            <div class="d-flex p-3">
              <div
                class="col-6 d-flex1 justify-content-center align-items-center"
              >
                <img src="../images/employee.png" width="60%" height="auto" />
              </div>

              <div class="col-6">
                <form method="post" action="../php/it_support_employee_add.php">
                  <div class="form-section">
                    <div class="form-title">Add Employee Details</div>
                    <div class="pb-3">
                      <input
                        class="input-style"
                        placeholder="Enter First Name"
                        type="text"
                        name="fname"
                        id="fname"
                      />
                    </div>

                    <div class="pb-3">
                      <input
                        class="input-style"
                        placeholder="Enter Last Name"
                        type="text"
                        name="lname"
                        id="lname"
                      />
                    </div>

                    <div class="pb-3">
                      <input
                        class="input-style"
                        placeholder="Enter Birthday"
                        type="date"
                        name="dob"
                        id="dob"
                      />
                    </div>

                    <div class="pb-3">
                      <select class="input-style" name="position" id="position">
                        <option value="">Select Position</option>
                        <option value="it-support">IT Support</option>
                        <option value="qa">QA Engineer</option>
                        <option value="department-head">Department Head</option>
                        <option value="employee">Employee</option>
                        <option value="hr-admin">HR Admin</option>
                      </select>
                      <!-- <input
                        placeholder="Enter Position"
                        type="text"
                        name="position"
                        id="position"
                      /> -->
                    </div>

                    <div class="pb-3">
                      <input
                        class="input-style"
                        placeholder="Enter Email"
                        type="email"
                        name="email"
                        id="email"
                      />
                    </div>

                    <div class="pb-3">
                      <input
                        class="input-style"
                        placeholder="Enter Password"
                        type="password"
                        name="password"
                        id="password"
                      />
                    </div>

                    <div>
                      <input
                        id="employee_submit"
                        name="employee_submit"
                        type="submit"
                        class="login-submit"
                      />
                    </div>
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
