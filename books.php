<?php
$servername = "localhost";
$username = "root";
$password = "123";
$dbname = "book_catalog";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Ошибка подключения к базе данных: " . $conn->connect_error);
}

$author_id = $_GET['author_id'];

$author_query = "SELECT * FROM authors WHERE id = $author_id";
$author_result = $conn->query($author_query);
$author = $author_result->fetch_assoc();

$books_query = "SELECT * FROM books WHERE author_id = $author_id";
$books_result = $conn->query($books_query);
?>

<!DOCTYPE html>
<html lang="">
<head>
    <title>Каталог книг</title>
</head>
<body>
<h1>Список книг автора <?= htmlspecialchars($author['name']) ?></h1>
<ul>
    <?php while ($row = $books_result->fetch_assoc()): ?>
        <li><a href="book.php?book_id=<?= $row['id'] ?>"><?= htmlspecialchars($row['title']) ?></a></li>
    <?php endwhile; ?>
</ul>
</body>
</html>

<?php
$books_result->close();
$author_result->close();
$conn->close();
?>
