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
    </head>
    <body>
      <div class="d-flex">
        <div class="menu">
          <div class="logo-section">
            <img width="80%" src="../images/images.png" />
          </div>
          <div class="form-title">HR Management</div>
          <div class="menu-list">
            <i class="fa fa-address-card pe-3" aria-hidden="true"></i> 
            <a class="select-a" href="./hr_admin.php">Add Candidates</a>
          </div>
          <div class="menu-list-inactive">
            <i class="fa fa-address-card-o pe-3" aria-hidden="true"></i> 
            <a class="select-a" href="./hr_admin_view_candidates.php">View Candidates</a>
          </div>
        </div>
        <div class="container">
          <div class="header-section">
            <div class="d-flex align-items-center">
              <div class="p-3 header-title">HR Manager</div>
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
                <img src="../images/hradmin.png" width="90%" height="auto" />
              </div>

              <div class="col-6">
                <form method="post" action="../php/hr_admin_add_new_candidate.php">
                  <div class="form-section">
                    <div class="form-title">Add New Candidate</div>
                    <div class="pb-3">
                      <input
                        class="input-style"
                        placeholder="Candiate First Name"
                        type="text"
                        name="can_fname"
                        id="can_fname"
                      />
                    </div>

                    <div class="pb-3">
                      <input
                        class="input-style"
                        placeholder="Candiate Last Name"
                        type="text"
                        name="can_lname"
                        id="can_lname"
                      />
                    </div>

                    <div class="pb-3">
                      <input
                        class="input-style"
                        placeholder="Source of Candidate"
                        type="text"
                        name="source"
                        id="source"
                      />
                    </div>

                    <div class="pb-3">
                      <input
                        class="input-style"
                        placeholder="Email"
                        type="email"
                        name="can_email"
                        id="can_email"
                      />
                    </div>

                    <div class="pb-3">
                      <input
                        class="input-style"
                        placeholder="Contact No"
                        type="text"
                        name="can_contact"
                        id="can_contact"
                      />
                    </div>

                    <div class="pb-3">
                                <select class="input-style" name="can_Exam_ID" id="can_Exam_ID">
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

                    <div>
                      <input
                        id="candidate_submit"
                        name="candidate_submit"
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
