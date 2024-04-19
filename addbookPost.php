<?php
include "db_connection.php";

$title = mysqli_real_escape_string($dbc, $_POST['title']);
$firstName = mysqli_real_escape_string($dbc, $_POST['firstName']);
$lastName = mysqli_real_escape_string($dbc, $_POST['lastName']);
$copyRight = mysqli_real_escape_string($dbc, $_POST['copyRight']);

// Below looks for an author with the same first and last name
$authorQuery = "SELECT authorId FROM Author WHERE firstName = '$firstName' AND lastName = '$lastName'";
$authorResult = mysqli_query($dbc, $authorQuery);
if (mysqli_num_rows($authorResult) > 0) {
    // Author exists
    $authorRow = mysqli_fetch_assoc($authorResult);
    $authorId = $authorRow['authorId'];
} else {
    // Insert new author
    $insertAuthor = "INSERT INTO Author (firstName, lastName) VALUES ('$firstName', '$lastName')";
    mysqli_query($dbc, $insertAuthor);
    $authorId = mysqli_insert_id($dbc);
}

// Insert new book including the copyright year
$insertBook = "INSERT INTO Book (title, copyRight) VALUES ('$title', '$copyRight')";
mysqli_query($dbc, $insertBook);
$bookId = mysqli_insert_id($dbc);

// Link book and author
$insertAuthorship = "INSERT INTO Authorship (bookId, authorId) VALUES ('$bookId', '$authorId')";
mysqli_query($dbc, $insertAuthorship);

// This script makes it so that an alert pops up whenever the user adds in a book
echo '<script type="text/javascript">';
echo 'alert("Book and Author added successfully!");';
echo 'window.location.href="addbook.php";';
echo '</script>';
?>