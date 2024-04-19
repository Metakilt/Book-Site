<?php
// Include the database connection
include 'db_connection.php';

// Check what action has been requested
$action = $_POST['action'] ?? '';
$bookId = $_POST['bookId'] ?? 0;

if ($action == 'view_reviews') {
    // Redirect or include a file to display reviews
    header("Location: view_reviews.php?bookId=" . urlencode($bookId));
} elseif ($action == 'add_review') {
    // Redirect to a page where reviews can be added
    header("Location: add_review.php?bookId=" . urlencode($bookId));
} else {
    // Redirect back to the book review page with an error message or default view
    header("Location: bookReview.php?error=invalidAction");
}

// Close the database connection if it's still open
mysqli_close($conn);
?>
