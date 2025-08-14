<?php
// db.php
include '../php/database.php';
// Fetch all results from the database
// Fetch all results from the database including details
$sql = "SELECT First_Name, Last_Name, Exam_Result, Pass_Mark, Pass_Fail FROM Result ORDER BY Result_ID";
$result = $conn->query($sql);

$results = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $results[] = $row;
    }
} else {
    echo "0 results";
}
$conn->close();
?>

<DOCTYPE.html>
  <html>
    <head>
      <title>Quality Asuarance and complience officer</title>
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
          <div class="menu-list">
            <i class="fa fa-lightbulb-o pe-3" aria-hidden="true"></i> 
            <a class="select-a" href="./qa_assuarance.php">Add Inquiry</a>
          </div>
          <div class="menu-list-inactive">
            <i class="fa fa-lightbulb-o pe-3" aria-hidden="true"></i> 
            <a class="select-a" href="./view_inquries.php">View Inquiries</a>
          </div>
        </div>

        <div class="container">
          <div class="header-section">
            <div class="d-flex align-items-center">
              <div class="p-3 header-title">
                Quality Assuarance and compliance officer
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
                <form method="post" action="../php/qa_add_inquiry.php">
                  <div class="form-section">
                    <div class="form-title">Inquiry on Results</div>
                    <div class="pb-3">
                      <input
                        class="input-style"
                        placeholder="Ticket Type"
                        type="text"
                        name="ticket_type"
                        id="ticket_type"
                        value="complaint"
                        disabled
                      />
                    </div>
                    <div class="pb-3">
                      <textarea  class="input-style" placeholder="Add complaint description" id="ticket_description" name="ticket_description"></textarea>

</div>

<div>
                      <input
                        id="inquiry_submit"
                        name="inquiry_submit"
                        type="submit"
                        class="login-submit"
                      />
                    </div>
             
                  </div>


                </form>

              </div>

              <div class="col-6">
              <?php foreach ($results as $index => $result): ?>
                <button type="button" class="collapsible">Exam <?= $index + 1 ?> - <?= htmlspecialchars($result['First_Name']) ?> <?= htmlspecialchars($result['Last_Name']) ?></button>
                <div class="content">
                    <p>Result: <?= htmlspecialchars($result['Exam_Result']) ?></p>
                    <p>Pass Mark: <?= htmlspecialchars($result['Pass_Mark']) ?></p>
                    <p>Status: <?= htmlspecialchars($result['Pass_Fail']) ?></p>
                </div>
            <?php endforeach; ?>
</div>
            </div>
          </div>
          <div class="footer-section">@copyright 2024</div>
        </div>
      </div>
      <script src="../js/qa_assuarance_script.js"></script>
    </body>
  </html>
</DOCTYPE.html>
