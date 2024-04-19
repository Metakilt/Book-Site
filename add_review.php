<?php
include 'db_connection.php';

$bookId = $_GET['bookId'] ?? 0;
$reviewerName = '';
$success = '';
$error = '';

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $reviewerName = $_POST['reviewerName'];
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];

    // Checks if the reviewerName is already a part of an existing ID
    $query = "SELECT reviewerID FROM Reviewer WHERE reviewerName = ?";
    $stmt = $dbc->prepare($query);
    $stmt->bind_param("s", $reviewerName);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($row = $result->fetch_assoc()) {
        $reviewerId = $row['reviewerID'];
    } else {
        // Inserts a new reviewer if no one was made
        $insertReviewer = "INSERT INTO Reviewer (reviewerName) VALUES (?)";
        $stmt = $dbc->prepare($insertReviewer);
        $stmt->bind_param("s", $reviewerName);
        $stmt->execute();
        $reviewerId = $stmt->insert_id;
    }

    // Insert the new review into the database
    if ($reviewerId) {
        $query = "INSERT INTO Report (bookId, reviewerId, rating, reviewDate, comment) VALUES (?, ?, ?, NOW(), ?)";
        $stmt = $dbc->prepare($query);
        $stmt->bind_param("iiis", $bookId, $reviewerId, $rating, $comment);
        if ($stmt->execute()) {
            $success = "Review added successfully!";
        } else {
            $error = "Error: " . $dbc->error;
        }
    } else {
        $error = "Error: Failed to add reviewer.";
    }
    $stmt->close();
}

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


          </div>
          
        </nav>
      </header>

   

      <main>
      <section class="body">
    <div class="addReview">
        <h1>Add a Review for Book : <?php echo $bookId; ?></h1>

        <?php if ($success) echo "<p style='color:green;'>$success</p>"; ?>
        <?php if ($error) echo "<p style='color:red;'>$error</p>"; ?>

            <form action="add_review.php?bookId=<?php echo $bookId; ?>" method="post">
            <label for="reviewerName">Reviewer Name:</label>
            <input type="text" name="reviewerName" id="reviewerName" value="<?php echo htmlspecialchars($reviewerName); ?>" required><br>
            <label for="rating">Rating (1-5):</label>
            <input type="number" name="rating" id="rating" min="1" max="5" required><br>
            <label for="comment">Comment:</label>
            <textarea name="comment" id="comment" required></textarea><br>
            <button type="submit">Submit Review</button>
            <!-- Back to Reviews Button -->
            <a href="bookReview.php" class="button">Back to Reviews</a>
        </form>
    </div>
    
      

        
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
