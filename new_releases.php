<?php 
include 'db_connection.php';

$query = "SELECT Book.bookId, Book.title, Book.copyRight, Book.imageUrl, Author.firstName, Author.lastName
          FROM Book
          JOIN Authorship ON Book.bookId = Authorship.bookId
          JOIN Author ON Authorship.authorId = Author.authorId
          ORDER BY Book.copyRight DESC LIMIT 4";

$result = mysqli_query($dbc, $query);

if (!$result) {
    echo "Error running query: " . mysqli_error($dbc);
    exit;
}

if (mysqli_num_rows($result) > 0) {
    echo "<ul class='new-release-list'>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<li class='new-release-item' onclick='openModal(this)' 
                 data-title='{$row['title']}' 
                 data-author='{$row['firstName']} {$row['lastName']}' 
                 data-year='{$row['copyRight']}' 
                 data-image='{$row['imageUrl']}'>
              <img src='{$row['imageUrl']}' alt='Cover image of {$row['title']}' style='width:100px; height:auto;'>
              {$row['title']} by {$row['firstName']} {$row['lastName']} ({$row['copyRight']})
              </li>";
    }

    echo "</ul>";
} else {
    echo "<p>No new releases found.</p>";
}

mysqli_close($dbc);
?>
