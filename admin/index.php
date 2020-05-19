<?php 
    session_start();
    //include function connexion in bdd
    include "./../connexion.inc.php";
    if(isset($_GET['logout']) && $_GET['logout'] == "ok"){
        unset($_SESSION['login']);
        unset($_SESSION['password']);

    }
    if(!isset($_SESSION['login']) && !isset($_SESSION['password'])){
        header("location:./../index.php");
    }
    $sql = $bdd->query("SELECT reference, prix FROM articles");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | CRUD</title>
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
                <a href="adding.php" class="btn btn-primary mt-2">Ajouter une annonce </a> 
                <table class="table table-hover  mt-3">
                    <thead class="thead-dark">
                        <th scope="col">Reference</th>
                        <th scope="col">Prix</th>
                        <th scope="col">Describe</th>
                        <th scope="col">Update</th>
                        <th scope="col">Delete</th>
                    </thead>
                    <?php while($donnees = $sql->fetch()){ ?>
                    <tbody>
                        <td><?php echo htmlspecialchars($donnees['reference']); ?></td>
                        <td><?php echo htmlspecialchars($donnees['prix']); ?> &euro;</td>
                        <td><a href="describe.php?ref=<?php echo htmlspecialchars($donnees['reference']); ?>" class="btn btn-info" title="describe: <?php echo htmlspecialchars($donnees['reference']); ?> ">info description</a></td>
                        <td><a href="update.php?ref=<?php echo htmlspecialchars($donnees['reference']); ?>" class="btn btn-warning">update</a></td>
                        <td><a href="delete.php?ref=<?php echo htmlspecialchars($donnees['reference']); ?>" class="btn btn-danger">delete</a></td>
                    </tbody>
                    <?php } $sql->closeCursor(); ?>
                </table>      
            </div>
        </section>
        <!-- footer include  -->
        <?php include "./../footer.inc.php" ?>
    </div>
</body>
</html>