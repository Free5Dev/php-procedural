<?php 
    session_start();
    //include function connexion in bdd
    include "./../connexion.inc.php";
    
    if(!isset($_SESSION['login']) && !isset($_SESSION['password'])){
        header("location:./../index.php");
    }
    // verification dee l'existance du params get
    if(isset($_GET['ref'])){
        $sql = $bdd->prepare("SELECT reference, prix, description, photo, intitule FROM articles as a INNER JOIN familles as f WHERE a.famillesID = f.id AND reference = ?");
        $sql->execute(array($_GET['ref']));
        $row = $sql->fetch();
    }else{
        header("Location: ./index.php");
    }
    $sql = $bdd->query("SELECT reference, prix FROM articles");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Describe</title>
    <link rel="stylesheet" href="https://bootswatch.com/4/yeti/bootstrap.min.css">
    <link rel="stylesheet" href="./../style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</head>
<body>
    <div id="main_page">
        <!-- header -->
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <a class="navbar-brand" href="index.php">K.<span class="text-warning">B</span></span>.<span class="text-danger">Z</span></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
              
                <div class="collapse navbar-collapse" id="navbarColor01">
                  <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                      <a class="nav-link" href="index.php?logout=ok" title="Deconnecteez-vous"><span class="text-warning">Decon</span>nexion</a>
                    </li>
                  </ul>
                </div>
            </nav>
        </header>
        <!-- body -->
        <section>
            <div class="container bg-light mb-0 mt-2">
                <a href="./index.php" class="btn btn-primary mb-2 mt-2">Retour...! </a> 
                <h1>Description An Article : <strong class="text-danger"><?php echo $row['description']; ?></strong></h1>
                <div class="row pb-5">
                    <div class="col-8">
                        <h2><span class="text-primary">Titre:</span> <?php echo $row['description']; ?></h2>
                        <p> <span class="text-primary">Prix:</span> <?php echo $row['prix']; ?> &euro;</p>
                        <p> <span class="text-primary">Famille:</span> <?php echo $row['intitule']; ?></p>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Distinctio porro itaque corporis quisquam modi quas adipisci non exercitationem! Perferendis, cumque.</p>
                    </div>
                    <div class="col-4">
                        <img src="./../images/<?php echo $row['photo']; ?>" alt="" class="img-thumbnail" width="100" height="80">
                    </div>
                </div>
            </div>
        </section>
        <!-- footer include  -->
        <?php include "./../footer.inc.php" ?>
    </div>
</body>
</html>