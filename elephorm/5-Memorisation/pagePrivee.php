<?php
    session_start();
    if(!isset($_SESSION['pseudo']) and !isset($_SESSION['password']))
    {
        header("Location:login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Page Privée</title>
</head>
<body>
    <h1>Page Privée</h1>
</body>
</html>