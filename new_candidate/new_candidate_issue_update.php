

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
      <script src="../js/new_candidate.js"></script>
    </head>
    <body>
      <div class="d-flex">
        <div class="menu">
          <div class="logo-section">
            <img width="80%" src="../images/images.png" />
          </div>
          <div class="form-title">Hi Candidate!!!</div>

            <div class="menu-list-inactive">
            <i class="fa fa-user-o pe-3" aria-hidden="true"></i> 
            <a class="select-a" href="./new_candidate_issue.php">Any Issues?</a>
          </div>

          <div class="menu-list">
            <i class="fa fa-user-o pe-3" aria-hidden="true"></i> 
            <a class="select-a" href="./new_candidate_issue_view.php">Submitted Issues</a>
          </div>
        </div>

        <div class="container">
          <div class="header-section">
            <div class="d-flex align-items-center">
              <div class="p-3 header-title">
                New Candidate
              </div>
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
              <div class="col-6">
              <?php
    include '../php/database.php';

    if (isset($_GET['ticket_id'])) {
        $ticket_id = $_GET['ticket_id'];
     

        $sql = "SELECT Ticket_ID, Description, Type
                FROM Ticket
                WHERE Ticket_ID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $ticket_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        if ($row) {
            echo "<form action='../php/new_candidate_issue_update.php' method='post'>
            <div class='form-section'>
            <div class='form-title'>Update Support Requested Details</div>
             <input type='hidden'  name='ticket_id' value='" . htmlspecialchars($row['Ticket_ID']) . "' /> 
                    <div class='pb-3'>  Type: <input  type='text' class='input-style' name='type' value='" . htmlspecialchars($row['Type']) . "' /></div>
                    <div class='pb-3'> Description: <textarea class='input-style' name='description' id='description'>" . htmlspecialchars($row['Description']) . "</textarea>
                    </div>
                    <input type='submit' class='login-submit' value='Update Record' />  

                    <div> <button type='button' class='login-submit-delete' onclick='confirmDelete();'>Delete Record</button></div>
                    </div>

                </form>";
        } else {
            echo "No record found.";
        }
    } else {
        echo "Invalid request.";
    }
    $conn->close();
    ?>

              </div>

              <div
                class="col-6 d-flex1 justify-content-center align-items-center"
              >
                <img src="../images/support.png" width="60%" height="auto" />
              </div>
            </div>
          </div>
          <div class="footer-section">@copyright 2024</div>
        </div>
      </div>
    
    </body>
  </html>
</DOCTYPE.html>
