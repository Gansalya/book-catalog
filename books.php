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


$sql = "SELECT * FROM authors WHERE id = $author_id";
$result = $conn->query($sql);
$author = $result->fetch_assoc();

$sql = "SELECT * FROM books WHERE author_id = $author_id";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="">
<head>
    <title>Каталог книг</title>
</head>
<body>
    <h1>Список книг автора <?= $author['name'] ?></h1>
    <ul>
        <?php while ($row = $result->fetch_assoc()): ?>
            <li><a href="book.php?book_id=<?= $row['id'] ?>"><?= $row['title'] ?></a></li>
        <?php endwhile; ?>
    </ul>
</body>
</html>

<?php
$conn->close();
?>