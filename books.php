<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="styles.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
  </head>
  <body>
    <header>
      <div class="container">
        <div id="logo">
          <h1><a href="index.php">Algernon's Library</a></h1>
        </div>
        <nav>
          <ul class="nav_links">
            <li><a href="./index.php">Home</a></li>
            <li><a href="about.html">About Me</a></li>
            <li>
            <a href="books.php">Books</a>
            <ul class="dropdown">
                <li><a href="./booksListing.php">Book Listing</a></li>
                <li><a href="#">Book Reviews</a></li>
                <li><a href="#">Book Ratings</a></li>
              </ul>
            </li>
          </ul>
        </nav>
      </div>
    </header>

    <section>
      <div class="new-search">
          <span class="search-icon material-symbols-outlined">search</span>
          <input type="search" name="search-db" class="search-input" placeholder="Search for books">
      </div>
    </section>

      <?php
if (isset($_POST['search-db'])) {
    $search = $_POST['search-db'];
    
    // Include the query.php file to fetch and display the table with search results
    include 'query.php';
} else {
    echo "<div class='container'><h1>No search query provided</h1></div>";
}
?>

        

        
    </div>

    </body>
</html>
