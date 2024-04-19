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

   

      
      <section class="body">
        <div class="bannerDescript">
          <div class="imageDescription">
            <h1>About me</h1>
            <p>Hello! I'm Ryan, the creator of this website! I'm very happy to see you visit this place.
            I'm still currently learning Web Development and I am planning on uploading this to GitHub and maybe
            update it in the future.
            </p>
          </div>
      <div class="profileImage">
      <a href="https://storyset.com/business">
        <img src="./images/Research paper-pana.svg" alt="Research paper image">
      </a>      
      </div>

</div>
      <div class="aboutMes">
        <div class="hobbies">
          <h2>Hobbies</h2>
              <ul>
                <li>Basketball: As a Filipino, everyone plays Basketball at least once in their lives</li>
                <li>Anime: I'll read or watch anything.</li>
                <li>Reading: Same as above, I'll read any genre but my favourite are sci-fi and japanese novels.</li>
                <li>Technology: I like to keep up with the latest trends</li>
              </ul>
          </div>
          <div>

          </div>
        <div class="education">
          <h2>Education</h2>
          <ul>
            <li>Mapua University: Bachelor's in Electronics Engineering</li>
            <li>Western Sydney University: Masters in Information Technology</li>
          </ul>
          <p>Planning on transitioning from my Major of Networking to Cloud</p>
        </div>

        
      </section>
     
   


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
