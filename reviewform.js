function openForm() {
  document.getElementById("myForm").style.display = "block";
}
function closeForm() {
  document.getElementById("myForm").style.display = "none";
}

function openPopup(url) {
  var selectedBookId = document.getElementById("bookId").value; // Get selected book ID
  var url = "add_review.php?bookId=" + selectedBookId; // Construct URL with selected book ID
  window.open(
    url,
    "_blank",
    "toolbar=yes,scrollbars=yes,resizable=yes,top=100,left=100,width=800,height=600"
  );
}
