
  function confirmDelete() {
    if (confirm("Are you sure you want to delete this record?")) {
      // Submit form to a delete handler PHP script
      window.location.href =
        "../php/hr_admin_candidate_delete.php?candidate_id=" +
        encodeURIComponent(
          document.getElementsByName("candidate_id")[0].value
        ) +
        "&user_id=" +
        encodeURIComponent(document.getElementsByName("user_id")[0].value);
    }
  }

