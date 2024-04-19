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
          <a href="bookReview.php">Add or View Reviews</a>
          </div>

          </form>
        </nav>
      </header>

      

      <section class="main">
         <div class="addBook">
            <h2>Add a Book to our database</h2>
              <form class=add_Book method="post" action="addbookPost.php">
                <label class="nameBook">
                  Name of Book:<input type = "text" required name="title"/>
                  <span class="placeholder">Enter Book Name</span> 
                  </label>

                  <label class="nameBook two">

                  Author's First Name: <input type = "text" required name="firstName"/>
                  <span class="placeholder">Enter First Name</span>
                  </label>

                  <label class="nameBook">

                  Author's Last Name: <input type = "text" required name="lastName" />
                  <span class="placeholder">Enter Last Name</span>
                  </label>

                  <label class="nameBook">
                  Publication date: <input type = "number" required name="copyRight" />
                  <span class="placeholder">Enter Year</span>
                  </label>
                  <button type="submit" name="action">Submit</button>
              
                  

              </form>
          </div>
       
      </section>
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
          Copyright &copy; 2024 by Algernon's Library.
        </p>
  </body>
</html>