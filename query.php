<?php
$dbc = mysqli_connect('localhost', 'root', '', 'db_22104695') OR die (mysqli_connect_error());

// Sanitize user input
$search = mysqli_real_escape_string($dbc, $_POST["search-db"]);

$query = "SELECT 
            t.ISBN,
            t.Title,
            allAuthors.Authors,
            t.Copyright,
            t.EditionNumber,
            ROUND(AVG(r.rating)) AS AverageRating,
            COUNT(DISTINCT re.reviewerName) AS CountRating
          FROM 
            titles t
          JOIN 
            (SELECT ai.ISBN, GROUP_CONCAT(CONCAT(a.FirstName, ' ', a.LastName) ORDER BY a.AuthorID SEPARATOR ', ') AS Authors
             FROM authorisbn ai
             JOIN authors a ON ai.AuthorID = a.AuthorID
             GROUP BY ai.ISBN) AS allAuthors ON t.ISBN = allAuthors.ISBN
          JOIN 
            authorisbn ai ON t.ISBN = ai.ISBN
          JOIN 
            authors a ON ai.AuthorID = a.AuthorID
          LEFT JOIN 
            report r ON t.ISBN = r.ISBN 
          LEFT JOIN 
            reviewer re ON r.reviewerId = re.reviewerId 
          WHERE 
            t.Title LIKE '%$search%' OR
            allAuthors.Authors LIKE '%$search%' OR
            t.ISBN LIKE '%$search%'
          GROUP BY 
            t.ISBN, t.Title, allAuthors.Authors, t.Copyright, t.EditionNumber";

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
    echo "<td>" . $row['Title'] . "</td>";
    echo "<td>" . $row['ISBN'] . "</td>";
    echo "<td>" . $row['Authors'] . "</td>";
    echo "<td>" . $row['Copyright'] . "</td>";
    // Output more columns if needed
    echo "</tr>";
}

echo "</tbody></table>";

mysqli_close($dbc);
?>
