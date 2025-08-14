function confirmDelete() {
  if (confirm("Are you sure you want to delete this record?")) {
    // Submit form to a delete handler PHP script
    window.location.href =
      "../php/department_head_exam_delete.php?exam_id=" +
      encodeURIComponent(document.getElementsByName("exam_id")[0].value);
  }
}

document.addEventListener("DOMContentLoaded", function () {
  var examSubmit = document.getElementById("exam_submit");

  examSubmit.addEventListener("click", function (event) {
    // Retrieve the values inside the event listener to get current values
    var examName = document.getElementById("exam").value;
    var examDescription = document.getElementById("exam_description").value;
    var examCode = document.getElementById("exam_code").value;
    var examPassword = document.getElementById("exam_password").value;

    // Validate the inputs
    if (
      examName.trim() === "" ||
      examDescription.trim() === "" ||
      examCode.trim() === "" ||
      examPassword.trim() === ""
    ) {
      alert("Please fill out all fields.");
      event.preventDefault(); // Stop form submission
    } else if (examPassword.length < 8) {
      alert("Exam password must be at least 8 characters long.");
      event.preventDefault(); // Stop form submission
    }
  });
});
