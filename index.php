<?php 
    // session
    session_start();
    // include function connexion in bdd
    include "connexion.inc.php";
    $sql = $bdd->query("SELECT * FROM user");
    $row = $sql->fetchAll();
    // si soumission du formulaire
    if(isset($_POST['btnConnexion'])){
        // verification de ssi les valeurs des saisis sont égales aux valeurs bdd
        foreach($row as $data){
            if($_POST['login'] == $data['pseudo'] && $_POST['password'] == $data['password']){
                $_SESSION['login'] = $_POST['login'];
                $_SESSION['password'] = $_POST['password'];
                header("Location:./admin/index.php");
            }else{
                $error = "Login or password is incorrecte";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://bootswatch.com/4/yeti/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <title>Logo | Connexion </title>
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
                      <a class="nav-link" href="index.php"><span class="text-warning">Form</span>  Login</a>
                    </li>
                  </ul>
                </div>
            </nav>
        </header>
        <!-- section -->
        <section>
            <div class="container bg-light mb-0">
                <h1>Connexion !</h1>
                <?php 
                    if(isset($error)){
                        echo"<div class='alert alert-danger' id='remove'>".$error."</div>";
                    }
                ?>
                <form id="myForme" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="pb-2">
                    <div class="form-group">
                        <label for="login">Login</label>
                        <input type="text" name="login" placeholder="Ex:SaidSoumah" required id="login" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" placeholder="ex:...." required id="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="btnConnexion" id="btnConnexion" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </section>
        <!-- footer include  -->
        <?php include "./footer.inc.php" ?>
    </div>
</body>
</html>