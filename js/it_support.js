document.addEventListener("DOMContentLoaded", function () {
  // login variables
  const loginButton = document.querySelector('.login-submit'); // Select the login button by its class

  loginButton.addEventListener('click', function(event) {
      const username = document.getElementById('username').value.trim();
      const password = document.getElementById('password').value.trim();
      let valid = true;
      let errors = [];

      // Validate email
      if (!username) {
          errors.push("Email is required.");
          valid = false;
      } else if (!/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/.test(username)) { // Simple email regex validation
          errors.push("Please enter a valid email address.");
          valid = false;
      }

      // Validate password
      if (!password) {
          errors.push("Password is required.");
          valid = false;
      }

      // If validation fails, prevent form submission and show errors
      if (!valid) {
          event.preventDefault(); // Prevent form submission
          alert("Errors: \n" + errors.join("\n"));
      }
  });

  //IT support - add employee

  var employeeSubmit = document.getElementById("employee_submit");

  employeeSubmit.addEventListener("click", function (event) {
    // Retrieve the values inside the event listener to get current values
    var fname = document.getElementById("fname").value;
    var lname = document.getElementById("lname").value;
    var dob = document.getElementById("dob").value;
    var position = document.getElementById("position").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;

    // Validate the inputs
    if (
      fname.trim() === "" ||
      lname.trim() === "" ||
      dob === "" ||
      position.trim() === "" ||
      email.trim() === "" ||
      password.trim() === ""
    ) {
      alert("Please fill out all fields.");
      event.preventDefault(); // Stop form submission
    } else if (!email.includes("@")) {
      alert("Please enter a valid email address.");
      event.preventDefault(); // Stop form submission
    } else if (password.length < 8) {
      alert("Password must be at least 8 characters long.");
      event.preventDefault(); // Stop form submission
    }
  });
});


function confirmDelete() {
  if (confirm("Are you sure you want to delete this record?")) {
    // Submit form to a delete handler PHP script
    window.location.href =
      "../php/it_support_employee_delete.php?employee_id=" +
      encodeURIComponent(document.getElementsByName("employee_id")[0].value);
  }
}

