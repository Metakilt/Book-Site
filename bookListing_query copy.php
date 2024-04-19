<?php
include 'db_connection.php'; 

$query = "SELECT b.title, b.bookId, CONCAT(a.firstName, ' ', a.lastName) AS authorName, b.copyRight, b.imageUrl
FROM Book b
JOIN Authorship ash ON b.bookId = ash.bookId
JOIN Author a ON ash.authorId = a.authorId";

$result = mysqli_query($dbc, $query);

if (!$result) {
    die("<p>Could not execute query: " . mysqli_error($dbc) . "</p>");
}

echo "<div class='book-listing-container'>
        <h1>Book Listing</h1>
        <div class='book-listing'>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<div class='book-card'>";
    echo "<img src='" . htmlspecialchars($row['imageUrl']) . "' alt='Cover image of " . htmlspecialchars($row['title']) . "' class='book-cover'>";
    echo "<div class='book-info'>";
    echo "<h2>" . htmlspecialchars($row['title']) . "</h2>";
    echo "<p>ID: " . htmlspecialchars($row['bookId']) . "</p>";
    echo "<p>Author: " . htmlspecialchars($row['authorName']) . "</p>";
    echo "<p>Copyright: " . htmlspecialchars($row['copyRight']) . "</p>";
    echo "</div>";
    echo "</div>";
}

echo "</div></div>";

mysqli_close($dbc);
?>
