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
        // echo"<pre>";
        // echo $article['photo'];
        // echo"</pre>";
    }else{
        header("Location:index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
    <link rel="stylesheet" href="./../style.css">
    <title>Admin | Describe</title>
</head>
<body>
    <header class="bg-success text-white">
        <div class="container d-flex justify-content-between align-items-center">
            <h1><i class="fas fa-book-reader"></i> ZBOOK</h1>
            <a href="index.php?logout=ok" class="text-white">Deconnexion</a>
        </div>
    </header>
    <div class="container m-5">
        <a href="index.php" class="btn btn-outline-success">Retour</a>
        <div class="row d-flex align-items-center mt-5">
            <div class="col-4">
                <img src="./../images/<?php echo $article['photo']; ?>" alt="" class="img-thumbnail">
            </div>
            <div class="col">   
                <table class="table table-hover">
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
        </div>
    </div>
    <footer class="bg-success text-white">
        <div class="container">
            <p><i class="fas fa-book-reader"></i> Copyright &copy; 2020 Tous droits Réservés</p>
        </div>
    </footer>
</body>
</html>