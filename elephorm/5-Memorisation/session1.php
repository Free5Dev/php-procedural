<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php 
        $_SESSION['log']='free';
    ?>
    <a href="session2.php">Lien de creation de session</a>
   <a href="suppSession.php">Suppression de session......</a>
</body>
</html>