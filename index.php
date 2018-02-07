<?php
require_once "config.php";

?>

<!doctype html>
<html lang="en">
<head>
    <title>Домашнее задание к лекции 4.1 «Реляционные базы данных и SQL»</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<form id="form" action="" method="POST">
    <input type="text" placeholder="Название книги" name="name">
    <input type="text" placeholder="Автор книги" name="author">
    <input type="text" placeholder="ISBN" name="isbn">
    <input class="sub" type="submit" value="Поиск">
</form>

<table>
    <tr>
        <th>Название</th>
        <th>Автор</th>
        <th>Год выпуска</th>
        <th>Жанр</th>
        <th>ISBN</th>
    </tr>

<?php

if (!isset($_POST['name']) AND !isset($_POST['author']) AND !isset($_POST['isbn'])) {
    $sql = "SELECT * FROM books";
    $res = mysqli_query($connect, $sql);
    $data = mysqli_fetch_array($res);
} else {
    $name = 'name like \'%' .$_POST['name']. '%\'';
    $author = 'author like \'%' .$_POST['author']. '%\'';
    $isbn = 'isbn like \'%' .$_POST['isbn']. '%\'';
    $sql = ('SELECT * FROM books WHERE ' . $name . ' AND ' .  $author . ' AND ' . $isbn);
    $res = mysqli_query($connect, $sql);
    $data = mysqli_fetch_array($res);
    echo "<pre>";
} while ( $data = mysqli_fetch_array($res)) {

?>

<tr>
    <td><?=$data['name']?></td>
    <td><?=$data['author']?></td>
    <td><?=$data['year']?></td>
    <td><?=$data['genre']?></td>
    <td><?=$data['isbn']?></td>
</tr>
<?php
}?>
</table>

</body>
</html>