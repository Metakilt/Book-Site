<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Algernon's Library: Library of Tech</title>
    <link href="style.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>
<body>
    <div class="container">
        <header class="main-header">
            <nav>
                <div class="logo">
                <h1><a href="index.php">📘 Algernon's Library</a></h1>
                </div>
                <div class="nav-items">
                    <a href="home.php">Home</a>
                    <a href="about.php">About Me</a>
                    <a href="addBook.php">Add Books</a>
                    <a href="bookReview.php">Add or View Reviews</a>
                </div>
                <div class="nav-search">
                    <form class="form_search" action="./books.php" method="post">
                        <div class="search">
                            <input type="search" name="search-db" class="search-input" placeholder="Search for books">
                            <button type="submit" class="search-button material-symbols-outlined">search</button>
                        </div>
                    </form>
                </div>
            </nav>
        </header>

        <section class="main">
            <div class="review_section">
                <h1>Book Reviews</h1>
                <form action="handle_reviews.php" method="post">
                    <select name="bookId">
                        <?php include 'bookListDropdown.php'; ?>
                    </select>
                    <button type="submit" name="action" value="view_reviews">View Reviews</button>
                    <button type="submit" name="action" value="add_review">Add Review</button>
                </form>
            </div>
        </section>

        <footer>
            <div class="newsfeed">
                <h3>Stay Connected with us</h3>
                <p>Join our Newsletter for the latest updates on Tech Books.</p>
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
    </div>
</body>
</html>
