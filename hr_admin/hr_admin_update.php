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

      <script src="../js/hr_admin_script.js"></script>
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
              <div class="p-3 header-title">HR Admin</div>
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
                <img src="../images/hradmin.png" width="60%" height="auto" />
              </div>

              <div class="col-6">
            <?php
    include '../php/database.php';

    if (isset($_GET['candidate_id']) && isset($_GET['user_id'])) {
        $employee_id = $_GET['candidate_id'];
        $user_id = $_GET['user_id'];

        $sql = "SELECT NewCandidate.Candidate_ID, NewCandidate.source,  NewCandidate.Exam_ID,
                User.User_ID, User.Email, User.First_Name, User.Last_Name
                FROM NewCandidate
                JOIN User ON NewCandidate.Candidate_ID = User.Candidate_ID 
                WHERE NewCandidate.Candidate_ID = ? AND User.User_ID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $employee_id, $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        if ($row) {
            echo "<form action='../php/hr_admin_candidate_update.php' method='post'>
            <div class='form-section'>
            <div class='form-title'>Update Candidate Details</div>
             <input type='hidden'  name='candidate_id' value='" . htmlspecialchars($row['Candidate_ID']) . "' /> 
                    <input type='hidden' name='user_id'  value='" . htmlspecialchars($row['User_ID']) . "' />
                    <div class='pb-3'>  First Name: <input type='text' class='input-style' name='first_name' value='" . htmlspecialchars($row['First_Name']) . "' /></div>
                    <div class='pb-3'> Last Name: <input type='text' class='input-style' name='last_name' value='" . htmlspecialchars($row['Last_Name']) . "' /></div>
                    <div class='pb-3'> Source: <input type='text' name='source' class='input-style' value='" . htmlspecialchars($row['source']) . "' /> </div>
                    <div class='pb-3'> Email: <input type='email' class='input-style' name='email' value='" . htmlspecialchars($row['Email']) . "' /> </div>
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
