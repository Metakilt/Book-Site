<?php
if (isset($_POST["search-db"])) {
    $dbc = mysqli_connect('localhost', '22104695', 'b4SYEMXprD2K3j', 'db_22104695') or die (mysqli_connect_error());

    $search = mysqli_real_escape_string($dbc, $_POST["search-db"]);

    $query = "SELECT b.bookId, b.title, b.copyRight, a.authorId, CONCAT(a.firstName, ' ', a.lastName) AS authorName, b.imageUrl
    FROM Book b
    JOIN Authorship ash ON b.bookId = ash.bookId
    JOIN Author a ON ash.authorId = a.authorId
    WHERE b.title LIKE '%$search%' OR
          b.bookId LIKE '%$search%' OR
          CONCAT(a.firstName, ' ', a.lastName) LIKE '%$search%' OR
          b.copyRight LIKE '%$search%'";

    $result = mysqli_query($dbc, $query);

    if (!$result) {
    
        die("<p>Could not execute query: " . mysqli_error($dbc) . "</p>");
    }

    echo "<div class='book-listing-container'>
            <h1>Search Results</h1>
            <div class='book-listing'>";

    if (mysqli_num_rows($result) > 0) {
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
    } else {
        echo "<p>No results found for your search criteria.</p>";
    }

    echo "</div></div>";

    mysqli_close($dbc);
}
?>
