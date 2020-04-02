<?php 
    session_start();
    if(!isset($_SESSION['login']) && !isset($_SESSION['password'])){
        header("Location: ./../index.php");
    }
    include './../connexion.inc.php';

    echo"<pre>";
    print_r($_POST);
    print_r($_FILES);
    echo"</pre>";
    if(isset($_GET['ref'])){
        $sth = $bdd->prepare('SELECT * FROM articles INNER JOIN familles WHERE articles.famillesID = familles.id AND reference = ?');
        $sth->execute(array($_GET['ref']));
        $result = $sth->fetch();
    }
    if(isset($_POST['delete'])){
        $stmt = $bdd->prepare("
            DELETE FROM articles 
            WHERE reference = :reference
        ");
        $stmt -> bindParam(':reference', $_POST['reference']);
        $stmt->execute();
        header("Location:./index.php");
    }
    $sqlMenu = 'SELECT * FROM familles';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DELETE | Article</title>
</head>
<body>
    <a href="./index.php">Return</a>
    <br/>
    <a href="index.php?logout=ok">Logout</a>
    <h1>DELETE An Article</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <div>
            <label for="reference">Reference :</label>
            <input type="hidden" name="reference" id="reference" value="<?php if(isset($_GET['ref'])) echo htmlspecialchars($result['reference']); ?>">
           <mark> <?php if(isset($_GET['ref'])) echo htmlspecialchars($result['reference']); ?></mark>
        </div>
        <div>
            <label for="prix">Prix</label>
            <input type="text" name="prix" id="prix" value="<?php if(isset($_GET['ref'])) echo htmlspecialchars($result['prix']); ?>">
        </div>
        <div>
            <label for="describe">Describe</label>
            <textarea name="describe" id="describe" cols="30" rows="10">
            <?php if(isset($_GET['ref'])) echo$result['details']; ?>
            </textarea>
        </div>
        <div>
            <label for="photo">Photo</label>
            <input type="file" name="<?php if(isset($_GET['ref'])) echo htmlspecialchars($result['photo']); ?>" id="photo"><br/>
            <img src="./../img/<?php if(isset($_GET['ref'])) echo htmlspecialchars($result['photo']); ?>" alt="<?php if(isset($_GET['ref'])) echo htmlspecialchars($result['photo']); ?>" width="150" height="150">
        </div>
        <div>
            <label for="famille">Famille</label>
            <select name="famille" id="famille">
                <?php foreach  ($bdd->query($sqlMenu) as $row) { ?>
                <option <?php if(!isset($result['famillesID'])) $result['famillesID']=1;  if($result['famillesID'] == $row['id']) echo"selected='selected'"; ?> value="<?php echo $row['id']; ?>"><?php echo htmlspecialchars($row['intitule']); ?></option>
                <?php } ?>
            </select>
        </div>
        <input type="submit" value="DELETE CONFIRME" name="delete" id="delete">
    </form>
</body>
</html>