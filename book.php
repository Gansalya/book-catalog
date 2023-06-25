<?php
$servername = "localhost";
$username = "root";
$password = "123";
$dbname = "book_catalog";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Ошибка подключения к базе данных: " . $conn->connect_error);
}

$book_id = $_GET['book_id'];

$sql = "SELECT books.*, authors.name AS author_name FROM books
        JOIN authors ON books.author_id = authors.id
        WHERE books.id = $book_id";
$result = $conn->query($sql);
$book = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="">
<head>
    <title>Каталог книг</title>
</head>
<body>
<h1><?= htmlspecialchars($book['title']) ?></h1>
<p><strong>Автор:</strong> <?= htmlspecialchars($book['author_name']) ?></p>
<p><strong>Описание:</strong> <?= htmlspecialchars($book['description']) ?></p>
<p><strong>Цена:</strong> <?= htmlspecialchars($book['price']) ?></p>
</body>
</html>

<?php
$result->close();
$conn->close();
?>
