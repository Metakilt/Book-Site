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
    <script type="text/javascript" src="./modal.js"></script>
  </head>

  <!-- PAGE SECTION -->
  <body>
    <div class="container">
      <header class="main-header">

        <nav>
          <div class="logo">
          <h1>📘 Algernon's Library</h1>

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

      <section class="banner">
        <div class="banner-text">
          <h2>Welcome to Algernon's Library</h2>
          <p>Browse through our selection of fine IT books</p>
          <div class="banner-buttons">
          <button id="browse"><a href="booksListing.php" onclick="search-db">Browse through our Catalog</a></button>
          <button class="add_book"><a href="addBook.php">Add a Book</a></button>
          </div>
         
        </div>
        <div class="banner-image">
        <img src="./Bibliophile-rafiki.svg" alt="library image">

        </div>
       
      </section>

<!-- Pulls new releases from the Book Table, will pull books put in from 2023 to 2024 -->
      <section class="new_releases">
          <h2>New Releases!</h2>
            <div class="release_items">
              <?php include 'new_releases.php';?>
            </div>

  
      </section>

    <!-- This is for the modal code. It is placed at the botom to not disturb
    the html structure -->

  

    <div id="bookModal" class="modal">
      <div class="modal-content">
        <span class="close">&times;</span>
        <h2 id="modalTitle"></h2>
        <p id="modalAuthor"></p>
        <p id="modalYear"></p>
        <img id="modalImage" src="" alt="Book Image">
       </div>
</div>

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
  </body>
</html>
