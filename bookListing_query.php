<?php
include 'db_connection.php'; 

$query = "SELECT b.title, b.bookId, CONCAT(a.firstName, ' ', a.lastName) AS authorName, b.copyRight
FROM Book b
JOIN Authorship ash ON b.bookId = ash.bookId
JOIN Author a ON ash.authorId = a.authorId"; 

$result = mysqli_query($dbc, $query);

if (!$result) {
    // Error handling
    die("<p>Could not execute query: " . mysqli_error($dbc) . "</p>");
}

echo "<table class='table-style'>
        <caption>
            <h1>Book Listing</h1>
        </caption>
        <thead>
            <tr>
                <th class='Title'>Title</th>
                <th class='BookID'>Book ID</th>
                <th class='AuthorName'>Author</th>
                <th class='Copyright'>Copyright</th>
            </tr>
        </thead>
        <tbody>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['title'] . "</td>";
    echo "<td>" . $row['bookId'] . "</td>";
    echo "<td>" . $row['authorName'] . "</td>";
    echo "<td>" . $row['copyRight'] . "</td>";
    echo "</tr>";
}

echo "</tbody></table>";

mysqli_close($dbc);
?>