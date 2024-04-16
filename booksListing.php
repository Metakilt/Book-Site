
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
            <li><a href="index.php">Home</a></li>
            <li><a href="about.html">About Me</a></li>
            <li>
              <a href="books.php" onclick="search-db">Books</a>
              <ul class="dropdown">
                <li><a href="#">Book Listing</a></li>
                <li><a href="#">Book Reviews</a></li>
                <li><a href="#">Book Ratings</a></li>
              </ul>
            </li>
          </ul>
        </nav>
      </div>
    </header>
        <?php
        include 'bookListing_query.php'
        ?>
    <section>
        <div class="container">

        </div>
    </section>
  </body>
</html>