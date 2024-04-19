User
CREATE TABLE Reviewer (
    reviewerID INT AUTO_INCREMENT PRIMARY KEY,
    reviewerName VARCHAR(70) NOT NULL,
    );

CREATE TABLE Author (
  authorId INT AUTO_INCREMENT PRIMARY KEY,
  firstName VARCHAR(70) NOT NULL,
  lastName VARCHAR(70) NOT NULL
);

CREATE TABLE Book (
  bookId INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(100) NOT NULL,
  copyRight INT
);

CREATE TABLE Report (
  bookId INT,
  FOREIGN KEY(bookId) REFERENCES Book(bookId),
  reviewerId INT,
  FOREIGN KEY(reviewerId) REFERENCES Reviewer(reviewerId),
  rating INT DEFAULT 1,
  reviewDate DATETIME,
    comment VARCHAR(255)
  PRIMARY KEY (bookId, reviewerId)
  comment VARCHAR(255)
);

CREATE TABLE Authorship (
  bookId INT, 
  FOREIGN KEY(bookId) REFERENCES Book(bookId),
  authorId INT,
  FOREIGN KEY(authorId) REFERENCES Author(authorId),
  PRIMARY KEY (bookId, authorId)
); i have this tables, i want a search input in html that is going to search for either book title, book id, author name concat the first name and last name,  copyright and then it outputs a table that book id, book name, author id, author name and copyright



.nameBook {
  position: relative;
  font-size: 20px;
  padding-top: 20px;
  margin-bottom: 5px;
}

.nameBook input {
  border: none;
  appearance: none;
  background: #f2f2f2;
  padding: 12px;
  border-radius: 3px;
  width: 250px;
  outline: none;
  font-size: 14px;
}

.nameBook .placeholder {
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translateY(-50%);
  transform: translateX(-50%);
  color: #aaa;
  font-size: 14px;
  transition: top 0.3s ease, font-size 0.3s ease, color 0.3s ease;
  padding-left: 50px;
}

.nameBook input:valid + .placeholder,
.nameBook input:focus + .placeholder {
  top: 10px;
  font-size: 10px;
  color: #aaa;
}

.nameBook.two .placeholder {
  position: absolute;
  left: 48%;
  top: 65%;
  transform: translateY(-50%);
  color: #aaa;
  font-size: 14px;
  transition: top 0.3s ease, font-size 0.3s ease, color 0.3s ease;
}

.nameBook.two {
  background: none;
  transition: border-color 0.3s ease;
}

.nameBook.two input:valid,
.nameBook.two input:focus {
  border-color: #222;
  transition-delay: 0.1s;
}