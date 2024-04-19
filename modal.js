function openModal(bookElement) {
  const modal = document.getElementById("bookModal");
  document.getElementById("modalTitle").textContent =
    bookElement.getAttribute("data-title");
  document.getElementById("modalAuthor").textContent =
    "Author: " + bookElement.getAttribute("data-author");
  document.getElementById("modalYear").textContent =
    "Copyright: " + bookElement.getAttribute("data-year");
  document.getElementById("modalImage").src =
    bookElement.getAttribute("data-image");
  document.getElementById("modalImage").alt =
    "Cover image of " + bookElement.getAttribute("data-title");
  modal.style.display = "block";

  const close = document.getElementsByClassName("close")[0];
  close.onclick = function () {
    modal.style.display = "none";
  };
  window.onclick = function (event) {
    if (event.target === modal) {
      modal.style.display = "none";
    }
  };
}
