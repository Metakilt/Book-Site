<?php
include 'db_connection.php';

// Fetch book ID from GET request
$bookId = $_GET['bookId'] ?? 0;

// Fetch reviews for the selected book
$query = "SELECT r.rating, r.reviewDate, r.comment, v.reviewerName 
          FROM Report r 
          JOIN Reviewer v ON r.reviewerId = v.reviewerId 
          WHERE r.bookId = ?";
$stmt = $dbc->prepare($query);
$stmt->bind_param("i", $bookId);
$stmt->execute();
$result = $stmt->get_result();

$reviews = [];
while ($row = $result->fetch_assoc()) {
    $reviews[] = $row;
}

$stmt->close();
$dbc->close();
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />

    <title>Algernon's Library: Library of Tech</title>
    <link href="style.css" rel="stylesheet" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0"
    />
  </head>

  <!-- PAGE SECTION -->
  <body>
    <div class="wrapper">
    <div class="container">
      <header class="main-header">

        <nav>
          <div class="logo">
          <h1><a href="index.php">📘 Algernon's Library</a></h1>

          </div>
          <div class="nav-items">
          <a href="home.php"> Home</a>
          <a href="about.php"> About Me</a>
          <a href="addBook.php"> Add Books</a>
          <a href="bookReview.php"> Add or View Reviews</a>
          </div>

          <div class="nav-search">
          <form class=form_search action="./books.php" method="post">
          <div class="search">
                  <span class="search-icon material-symbols-outlined">search</span>
                  <input type="search" name="search-db" class="search-input" placeholder="Search for books">
                </div>

          </div>
          
        </nav>
      </header>
        <main>
        <section class="viewReview">
      <h1>Reviews for Book ID: <?php echo $bookId; ?></h1>

<?php if (count($reviews) > 0): ?>
    <table border="1">
        <thead>
            <tr>
                <th>Reviewer</th>
                <th>Rating</th>
                <th>Date</th>
                <th>Comment</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reviews as $review): ?>
            <tr>
                <td><?php echo htmlspecialchars($review['reviewerName']); ?></td>
                <td><?php echo htmlspecialchars($review['rating']); ?></td>
                <td><?php echo htmlspecialchars($review['reviewDate']); ?></td>
                <td><?php echo htmlspecialchars($review['comment']); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No reviews available for this book.</p>
<?php endif; ?>
        <a href="bookReview.php" class="button">Back to Reviews</a>

      </section>
        </main>
    </div>
   

     
   


    <footer>
    <div class="newsfeed">
          <h3>Stay Connected with us</h3>
          <p>
            Join our Newsletter for the latest updates on Tech Books.
          </p>
          <form action="">
            <div class="newsletter">
              <input type="text" placeholder="Type in your email">
            </div>
            <div class="subscribe-news">
              <input type="submit" value="Subscribe">
            </div>
          </form>
         
        </div>
        <p id="foot" class="copyright text">
          Copyright &copy; 2027 by The Code Magazine.
        </p>
      </footer>

    <div id="bookModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2 id="modalTitle"></h2>
        <p id="modalAuthor"></p>
        <p id="modalYear"></p>
        <img id="modalImage" src="" alt="Book Image">
    </div>
</div>

  </body>
</html>
