<?php 
    session_start();
    if(isset($_GET['logout'])){
        unset($_SESSION['login']);
        unset($_SESSION['password']);
    }
    if(!isset($_SESSION['login']) && !isset($_SESSION['password'])){
        header("Location:../index.php");
    }
    require_once("../connexion.inc.php");

    if(isset($_GET['id'])){

        $deleteCrud=$bdd->prepare("DELETE FROM users WHERE id = ?");
        $deleteCrud->execute(array($_GET['id']));
    }
    $selectCrud=$bdd->query("SELECT id, nom FROM users ");
    // var_dump($_GET);
    if(isset($_GET['search'])){
        if(!empty($_GET['search'])){
            $selectCrud=$bdd->prepare("SELECT id, nom FROM users WHERE nom LIKE ?");
            $selectCrud->execute(array("%$_GET[search]%"));
        }
    }
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style.css">
    <title>CRUD</title>
</head>
<body>
     <!-- include header-->
     <?php 
        include("../header.inc.php");
    ?>

     <!-- main page -->
    
    <div id="main_page">
        <table border="1" cellspacing="0" cellpading="1" width="100%" >
            <caption>
                <form action="index.php" method="get">
                    <label for="search">Search</label>
                    <input type="search" name="search" id="search" value="<?php if(isset($_GET['search'])) echo $_GET['search']; ?>">
                    <input type="submit" name="btnSearch" value="Search">
                </form>
            </caption>
            <tr>
                <th>ID</th>
                <th>NOM</th>
                <th>MODIFICATION</th>
                <th>SUPPRESSION</th>
            </tr>
            <?php while($donneesCrud=$selectCrud->fetch()) { ?>
            <tr>
                <td><?php echo $donneesCrud['id']; ?></td>
                <td><?php echo $donneesCrud['nom']; ?></td>
                <td><a href="update.php?id=<?php echo $donneesCrud['id']; ?>">Modif</a></td>
                <td><a href="index.php?id=<?php echo $donneesCrud['id']; ?>">Suppr</a></td>
            </tr>
            <?php } $selectCrud->closeCursor(); ?>
        </table>
    </div>
</body>
</html>