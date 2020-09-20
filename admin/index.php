<?php 
    // session start
    session_start();
    // include file connexion in bdd
    require "./../connexion.inc.php";
    if(isset($_GET['logout'])){
        unset($_SESSION['login']);
        unset($_SESSION['password']);
    }
    if(!isset($_SESSION['login']) && !isset($_SESSION['password'])){
        header("Location:./../index.php");
    }
    // suppression 
    if(isset($_GET['ref']) && $_GET['supp']=="ok"){
        // querySupp
        $querySupp =  $bdd->prepare("DELETE FROM articles WHERE reference = ?");
        $querySupp->execute(array($_GET['ref']));
    }
    // query select in bdd
    $queryArticles = $bdd->query("SELECT * FROM articles");
    // search an article
    if(!empty($_GET['searchArticle'])){
        // query select in bdd
        $queryArticles = $bdd->prepare("SELECT  reference, prix, description FROM articles  WHERE reference LIKE ?");
        $queryArticles->execute(array("%".$_GET['searchArticle']."%"));
    }
    // query Menu deroulant
    $queryMenu = $bdd->query("SELECT * FROM familles");
    if(!empty($_GET['searchFamille'])){
        echo $_GET['searchFamille'];
    }
    // search an famille
    if(!empty($_GET['searchFamille'])){
        // query select in bdd
        $queryArticles = $bdd->prepare("SELECT  reference, prix, description, famillesID FROM familles INNER JOIN  articles  WHERE familles.id=articles.famillesID and  famillesID= ?");
        $queryArticles->execute(array($_GET['searchFamille']));
    }
    
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | CRUD</title>
</head>
<body>
    <a href="create.php">Ajout Article</a>
    <a href="index.php?logout=ok">Deconnexion</a>
    <form action="index.php" method="get">
        <label for="searchArticle">Recherche d'Article</label>
        <input type="text" name="searchArticle" id="searchArticle" placeholder="Recherche..." value="<?php if(isset($_GET['btnSearch'])) echo $_GET['searchArticle'] ?>"> 
        <select name="searchFamille" id="searchFamille">
                <option value="">Selectionner une Categorie</option>
                <?php while($dataMenu = $queryMenu->fetch()){ ?>
                    <option value="<?php echo htmlspecialchars($dataMenu['id']); ?>"><?php echo htmlspecialchars($dataMenu['intitule']); ?></option>
                <?php } $queryMenu->closeCursor(); ?>
        </select>
        <input type="submit" value="Recherche" name="btnSearch" id="btnSearch">
    </form>
    <table border="1" cellspacing="1" cellpadding="0" width="600">
        <thead>
            <tr>
                <th>#Reference</th>
                <th>Prix</th>
                <th>Description</th>
                <th>Details</th>
                <th>Modification</th>
                <th>Suppression</th>
            </tr>
        </thead>
        <tbody>
            <?php while($articles = $queryArticles->fetch()) { ?>
            <tr>
                <td><?php echo htmlspecialchars($articles['reference']); ?></td>
                <td><?php echo htmlspecialchars($articles['prix']); ?></td>
                <td><?php echo htmlspecialchars($articles['description']); ?></td>
                <td><a href="describe.php?ref=<?php echo htmlspecialchars($articles['reference']); ?>">Détails</a></td>
                <td><a href="update.php?ref=<?php echo htmlspecialchars($articles['reference']); ?>">Modification</a></td>
                <td><a href="index.php?ref=<?php echo htmlspecialchars($articles['reference']); ?>&amp;supp=ok">Suppression</a></td>
            </tr>
            <?php } $queryArticles->closeCursor(); ?>
        </tbody>
    </table>
</body>
</html>