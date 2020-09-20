<?php 
    // session start
    session_start();
    // include file connexion in bdd
    require "./../connexion.inc.php";
    if(!isset($_SESSION['login']) && !isset($_SESSION['password'])){
        header("Location:./../index.php");
    }    
    // get ref
    if(isset($_GET['ref'])){
        $queryArticle = $bdd->prepare("SELECT intitule, reference, prix, description, photo FROM familles INNER JOIN articles  WHERE familles.id=articles.famillesID  and  reference = ?");
        $queryArticle->execute(array($_GET['ref']));
        $article = $queryArticle->fetch();
        echo"<pre>";
        echo $article['photo'];
        echo"</pre>";
    }else{
        header("Location:index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Describe</title>
</head>
<body>
    <a href="index.php">Retour</a>
    <a href="index.php?logout=ok">Deconnexion</a>
    <div>
        <img src="./../images/<?php echo $article['photo']; ?>" alt="">
    </div>
    <div>   
        <table border="1" cellspacing="1" cellpadding="0" width="600">
            <tr>
                <th>Reference</th>
                <td><?php echo htmlspecialchars($article['reference']); ?></td>
            </tr>
            <tr>
                <th>Prix</th>
                <td><?php echo htmlspecialchars($article['prix']); ?></td>
            </tr>
            <tr>
                <th>Famille</th>
                <td><?php echo htmlspecialchars($article['intitule']); ?></td>
            </tr>
        </table>
    </div>
</body>
</html>