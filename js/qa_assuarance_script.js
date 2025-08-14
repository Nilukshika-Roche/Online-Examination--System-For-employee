var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function () {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
  });
}

function confirmDelete() {
  if (confirm("Are you sure you want to delete this record?")) {
    // Submit form to a delete handler PHP script
    window.location.href =
      "../php/qa_delete_inquiry.php?ticket_id=" +
      encodeURIComponent(document.getElementsByName("ticket_id")[0].value);
  }
}
