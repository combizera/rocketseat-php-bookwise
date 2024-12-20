# Tables

## Users

```mysql
CREATE TABLE users (
  id integer primary key,
  name VARCHAR(255) NOT NULL,
  email VARCHAR(200) NOT NULL
);
```

## Books

```mysql
CREATE TABLE books (
   id integer primary key,
   user_id INTEGER,
   title VARCHAR(255),
   author VARCHAR(200),
   description TEXT,
   year integer,
   FOREIGN KEY(user_id) REFERENCES users(id) ON DELETE CASCADE
);
```

# Seeder

## Users

```mysql
INSERT INTO users (id, name, email) VALUES (1, 'Ygor Combi', 'ygor@combi.com'), (2, 'Fulano', 'fulano@dasilva.com');
```

## Books

```mysql
INSERT INTO books (id, title, author, description, year) VALUES
(1, 'O Senhor dos Anéis', 'J. R. R. Tolkien', 'The Lord of the Rings is an epic high-fantasy novel. The story began as a sequel to Tolkien''s 1937 fantasy novel The Hobbit, but eventually developed into a much larger work.', 1922),
(2, 'Harry Potter and the Philosopher''s Stone', 'J. K. Rowling', 'The first novel in the Harry Potter series and J. K. Rowling''s debut novel. It follows Harry Potter, a young wizard who discovers his magical heritage.', 1855),
(3, 'To Kill a Mockingbird', 'Harper Lee', 'Published in 1960, it is widely studied in schools and universities. The novel is renowned for its warmth and humor, despite dealing with serious issues of rape and racial inequality.', 1984),
(4, '1984', 'George Orwell', 'A dystopian social science fiction novel and cautionary tale, warning of the dangers of totalitarianism and extreme political ideology.', 1865),
(5, 'Pride and Prejudice', 'Jane Austen', 'A romantic novel of manners written by Jane Austen in 1813. The novel follows the character development of Elizabeth Bennet, the dynamic protagonist of the book.', 1744),
(6, 'The Great Gatsby', 'F. Scott Fitzgerald', 'A 1925 novel written by American author F. Scott Fitzgerald that follows a cast of characters living in the fictional towns of West Egg and East Egg on prosperous Long Island in the summer of 1922.', 1933);
```