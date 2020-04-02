<?php 
    session_start();
    if(!isset($_SESSION['login']) && !isset($_SESSION['password'])){
        header("Location: ./../index.php");
    }
    include './../connexion.inc.php';
    if(isset($_GET['ref'])){
        $sth = $bdd->prepare('SELECT * FROM articles INNER JOIN familles WHERE articles.famillesID = familles.id AND reference = ?');
        $sth->execute(array($_GET['ref']));
        $result = $sth->fetch();
    }else{
        header("Location:./index.php");
    }
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Describe | Article</title>
</head>
<body>
    <a href="./index.php">Retour</a>
    <br/>
    <a href="index.php?logout=ok">Logout</a>
    <h1>Describe An Article <mark><?php echo htmlspecialchars($result['reference']); ?></mark> </h1>
    <table border="1" cellspacing='1' cellpadding='1' width='600'>
        <tr>
            <th>Reference</th>
            <td><?php echo htmlspecialchars($result['reference']); ?></td>
        </tr>
        <tr>
            <th>Prix</th>
            <td><?php echo htmlspecialchars($result['prix']); ?></td>
        </tr>
        <tr>
            <th>Describe</th>
            <td><?php echo htmlspecialchars($result['details']); ?></td>
        </tr>
        <tr>
            <th>Photo</th>
            <td><img src="./../img/<?php echo htmlspecialchars($result['photo']); ?>" alt="<?php echo htmlspecialchars($result['photo']); ?>" width="150" height="150"></td>
        </tr>
        <tr>
            <th>Famille</th>
            <td><?php echo htmlspecialchars($result['intitule']); ?></td>
        </tr>
    </table>
</body>
</html>