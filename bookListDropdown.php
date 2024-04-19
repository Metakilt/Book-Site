<?php
include 'db_connection.php';
$query = "SELECT bookId, title FROM Book";
$result = mysqli_query($dbc, $query);
while ($book = mysqli_fetch_assoc($result)) {
    echo '<option value="' . htmlspecialchars($book['bookId']) . '">' . htmlspecialchars($book['title']) . '</option>';
}
?>
