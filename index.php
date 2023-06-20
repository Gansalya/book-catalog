<?php
$servername = "localhost";
$username = "root";
$password = "123";
$dbname = "book_catalog";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Ошибка подключения к базе данных: " . $conn->connect_error);
}

$authors_query = "SELECT * FROM authors";
$authors_result = $conn->query($authors_query);
?>

    <!DOCTYPE html>
    <html lang="">
    <head>
        <title>Каталог книг</title>
    </head>
    <body>
    <h1>Список авторов</h1>
    <ul>
        <?php while ($row = $authors_result->fetch_assoc()): ?>
            <li><a href="books.php?author_id=<?= $row['id'] ?>"><?= htmlspecialchars($row['name']) ?></a></li>
        <?php endwhile; ?>
    </ul>
    </body>
    </html>

<?php
$authors_result->close();
?><?php
$servername = "localhost";
$username = "root";
$password = "123";
$dbname = "book_catalog";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Ошибка подключения к базе данных: " . $conn->connect_error);
}

$authors_query = "SELECT * FROM authors";
$authors_result = $conn->query($authors_query);
?>

<!DOCTYPE html>
<html lang="">
<head>
    <title>Каталог книг</title>
</head>
<body>
<h1>Список авторов</h1>
<ul>
    <?php while ($row = $authors_result->fetch_assoc()): ?>
        <li><a href="books.php?author_id=<?= $row['id'] ?>"><?= htmlspecialchars($row['name']) ?></a></li>
    <?php endwhile; ?>
</ul>
</body>
</html>

<?php
$authors_result->close();
$conn->close();
?>
