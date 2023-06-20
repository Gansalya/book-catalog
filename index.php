<?php
$servername = "localhost";
$username = "root";
$password = "123";
$dbname = "book_catalog";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Ошибка подключения к базе данных: " . $conn->connect_error);
}


$sql = "SELECT * FROM authors";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="">
<head>
    <title>Каталог книг</title>
</head>
<body>
    <h1>Список авторов</h1>
    <ul>
        <?php while ($row = $result->fetch_assoc()): ?>
            <li><a href="books.php?author_id=<?= $row['id'] ?>"><?= $row['name'] ?></a></li>
        <?php endwhile; ?>
    </ul>
</body>
</html>

<?php
$conn->close();
?>