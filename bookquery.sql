<?php
$dbc = mysqli_connect('localhost', 'root', '', 'bookreview') OR die (mysqli_connect_error());

// Sanitize user input
$search = mysqli_real_escape_string($dbc, $_POST["search-db"]);

$query = "SELECT b.bookId, b.title, b.copyRight AS Copyright, a.authorId, CONCAT(a.firstName, ' ', a.lastName) AS authorName
FROM Book b
JOIN Authorship ash ON b.bookId = ash.bookId
JOIN Author a ON ash.authorId = a.authorId
WHERE b.title LIKE '%$search%' OR
      b.bookId LIKE '%$search%' OR
      CONCAT(a.firstName, ' ', a.lastName) LIKE '%$search%' OR
      b.copyRight LIKE '%$search%'"; 

$result = mysqli_query($dbc, $query);

if (!$result) {
    // Error handling
    die("<p>Could not execute query: " . mysqli_error($dbc) . "</p>");
}

echo "<table class='table-style'>
        <caption>
            <h1>Search</h1>
        </caption>
        <thead>
            <tr>
                <th class='Title'>TITLE</th>
                <th class='ISBN'>ISBN</th>
                <th class='Author'>Author</th>
                <th class='Copyright'>Date</th>
                <!-- Add more headers if needed -->
            </tr>
        </thead>
        <tbody>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['title'] . "</td>";
    echo "<td>" . $row['bookId'] . "</td>";
    echo "<td>" . $row['authorName'] . "</td>";
    echo "<td>" . $row['Copyright'] . "</td>";
    // Output more columns if needed
    echo "</tr>";
}

echo "</tbody></table>";

mysqli_close($dbc);
?>
