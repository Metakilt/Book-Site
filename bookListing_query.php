<?php
include 'db_connection.php'; 

$query = "SELECT * FROM titles";
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