<?php 
require_once('./Class/GameClass.php');

$games = new GameClass();
$games->createFighters();
echo"<pre>";
var_dump($games);
echo"<pre>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <header><h1>Header</h1></header>
    <main>

<h1>Que le jeu commence</h1>

<?php 
$games->fight();
?>

<?php 
echo"<pre>";
var_dump($games);
echo"<pre>";
?>

    </main>
    <footer><h1>Footer</h1></footer>
</body>
</html>
