<?php 
$unan=365*24*60*60;
    setcookie("log","said",time()+$unan);
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
    <a href="cookie2.php">Lien de creation de cookie</a>
    <a href="supcookie.php">Suppression de cookie</a>
</body>
</html>