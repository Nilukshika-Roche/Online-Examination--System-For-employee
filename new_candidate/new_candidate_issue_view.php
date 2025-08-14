

<DOCTYPE.html>
  <html>
    <head>
      <title>New Candidate</title>
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
              <div class="p-3 header-title">New Candidate</div>
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
          <div class="p-3 table-header">Support Requested</div>
                    <div class="d-flex1 justify-content-center">
                        <?php
                        // Database connection 
                        include '../php/database.php';
                        $user = 1;
                        // SQL to retrieve data from Ticket table
                        $sql = "SELECT Ticket_ID, Description, Type, Date, User_ID FROM Ticket WHERE  User_ID = ? ORDER BY Ticket_ID";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("i", $user);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        if ($result->num_rows > 0) {
                            echo "<table><tr><th>Ticket ID</th><th>Description</th><th>Type</th><th>Date</th><th>Action</th></tr>";
                            while($row = $result->fetch_assoc()) {
                                echo "<tr><td>" . $row["Ticket_ID"] . "</td><td>" . htmlspecialchars($row["Description"]) . "</td><td>" . $row["Type"] . "</td><td>" . $row["Date"] . "</td><td><a href='new_candidate_issue_update.php?ticket_id=" . $row["Ticket_ID"] . "'>Update</a></td></tr>";
                            }
                            echo "</table>";
                        } else {
                            echo "0 results";
                        }

                        // Close connection
                        $conn->close();
                        ?>
                    </div>
                </div>
          <div class="footer-section">@copyright 2024</div>
        </div>
      </div>
    </body>
  </html>
</DOCTYPE.html>
