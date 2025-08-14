<?php
include '../php/database.php'; // Includes MySQLi connection from 'database.php'

if (isset($_GET['exam_id'])) {
    $exam_id = $_GET['exam_id'];
    
    // Fetch all questions for the given exam
    $stmt = $conn->prepare("SELECT * FROM Questions WHERE Exam_ID = ?");
    $stmt->bind_param("i", $exam_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $questions = $result->fetch_all(MYSQLI_ASSOC);
    $user_id = 3;
    
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
        // Process form submission
        foreach ($_POST['answers'] as $question_id => $answer) {
            // Insert each answer into the database
            $insert_stmt = $conn->prepare("INSERT INTO Answers (answer, Question_ID, Exam_ID, User_ID) VALUES (?, ?, ?, ?)");
            // User_ID should be fetched from your user management system or session
            $insert_stmt->bind_param("siii", $answer, $question_id, $exam_id, $user_id);
            $insert_stmt->execute();
        }
        echo "Answers submitted successfully!";
    }
} else {
    echo "No exam ID provided.";
}
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
                <a class="select-a" href="../login.html"><button class="logout-btn">logout</button></a>
              </div>
            </div>
          </div>

          <div class="content-section">
            <div class="d-flex p-3">
              <div
                class="col-6 d-flex1 justify-content-center align-items-center"
              >
                <img src="../images/emp previous.png" width="60%" height="auto" />
              </div>

              <div class="col-6">
              <?php if (!empty($questions)): ?>
        <form method="post">
            <?php foreach ($questions as $question): ?>
                <div class="p-3">
                    <label for="answer_<?php echo $question['Question_ID']; ?>"><?php echo $question['question']; ?></label>
                    <input class="input-style" type="text" id="answer_<?php echo $question['Question_ID']; ?>" name="answers[<?php echo $question['Question_ID']; ?>]">
                </div>
            <?php endforeach; ?>
            <button class="login-submit" type="submit" name="submit">Submit Answers</button>
        </form>
    <?php else: ?>
        <p>No questions found for this exam.</p>
    <?php endif; ?>
              </div>
            </div>
          </div>
          <div class="footer-section">@copyright 2024</div>
        </div>
      </div>
    </body>
  </html>
</DOCTYPE.html>
