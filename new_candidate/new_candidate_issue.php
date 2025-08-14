
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

    </head>
    <body>
      <div class="d-flex">
        <div class="menu">
          <div class="logo-section">
            <img width="80%" src="../images/images.png" />
          </div>
          <div class="form-title">Hi Candidate!!!</div>

            <div class="menu-list">
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
                <form method="post" action="../php/new_candidate_issue_add.php">
                  <div class="form-section">
       
                    <div class="form-title">Something went wrong? Request Support</div>
                    <input type='hidden' name='user_id' value='<?php echo $user_id; ?>'>
                    <div class="pb-3">
                      <input
                        class="input-style"
                        placeholder="Support Subject"
                        type="text"
                        name="ticket_type"
                        id="ticket_type"

   
                      />
                    </div>
                    <div class="pb-3">
                      <textarea  class="input-style" placeholder="Add Support required description" id="ticket_description" name="ticket_description"></textarea>

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
      <script src="../js/qa_assuarance_script.js"></script>
    </body>
  </html>
</DOCTYPE.html>
