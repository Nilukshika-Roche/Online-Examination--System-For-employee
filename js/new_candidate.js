function confirmDelete() {
    if (confirm("Are you sure you want to delete this record?")) {
      // Submit form to a delete handler PHP script
      window.location.href =
        "../php/new_candidate_issue_delete.php?ticket_id=" +
        encodeURIComponent(document.getElementsByName("ticket_id")[0].value);
    }
  }
  