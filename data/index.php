<?php 
    require_once('./autoload.php');
    session_start();
    






 //   $games->createFighters();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Games</title>
</head>
<body>

    <main>

        <?php 
            $games = new GameClass();
          //  $games->fight();
        ?>
 <label><a href="/?state=reset">Reset</a></label>
    </main>

</body>
</html>
