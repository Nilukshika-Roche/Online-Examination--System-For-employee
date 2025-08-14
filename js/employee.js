function confirmDelete() {
  if (confirm("Are you sure you want to delete this record?")) {
    // Submit form to a delete handler PHP script
    window.location.href =
      "../php/employee_delete_training.php?ticket_id=" +
      encodeURIComponent(document.getElementsByName("ticket_id")[0].value);
  }
}
