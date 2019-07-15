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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD</title>
</head>
<body>
    <a href="add.php">ADD USER</a>
    <a href="index.php?logout=ok">Deconnexion</a>
    <table border="1" cellspacing="0" cellpading="1" width="100%">
        <caption>CRUD USERS</caption>
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
</body>
</html>