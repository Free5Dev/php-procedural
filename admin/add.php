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
    if(isset($_POST['add'])){
        if(!empty($_POST['reference'] && $_POST['prix'] && $_POST['describe'] && $_FILES['photo']['error'] == 0 && $_POST['famille'])){
            $uploaddir = './../img/';
            $uploadfile = $uploaddir . basename($_FILES['photo']['name']);
            if (move_uploaded_file($_FILES['photo']['tmp_name'], $uploadfile)) {
                $stmt = $bdd->prepare("
                    INSERT INTO articles SET 
                    reference = :reference,
                    prix = :prix,
                    details = :details,
                    photo = :photo,
                    famillesID = :famillesID
                ");
                $stmt -> bindParam(':reference', $_POST['reference']);
                $stmt -> bindParam(':prix', $_POST['prix']);
                $stmt -> bindParam(':details', $_POST['describe']);
                $stmt -> bindParam(':photo', $_FILES['photo']['name']);
                $stmt -> bindParam(':famillesID', $_POST['famille']);
                $stmt->execute();
                header("Location:./index.php");
            } else {
                echo "Upload File is not possible";
            }
        }else{
            echo"Fields is empty";
        }
    }
    $sqlMenu = 'SELECT * FROM familles';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD | Article</title>
</head>
<body>
    <a href="./index.php">Return</a>
    <br/>
    <a href="index.php?logout=ok">Logout</a>
    <h1>Adding An Article</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <div>
            <label for="reference">Reference</label>
            <input type="text" name="reference" id="reference">
        </div>
        <div>
            <label for="prix">Prix</label>
            <input type="text" name="prix" id="prix">
        </div>
        <div>
            <label for="describe">Describe</label>
            <textarea name="describe" id="describe" cols="30" rows="10"></textarea>
        </div>
        <div>
            <label for="photo">Photo</label>
            <input type="file" name="photo" id="photo">
        </div>
        <div>
            <label for="famille">Famille</label>
            <select name="famille" id="famille">
                <?php foreach  ($bdd->query($sqlMenu) as $row) { ?>
                <option value="<?php echo $row['id']; ?>"><?php echo htmlspecialchars($row['intitule']); ?></option>
                <?php } ?>
            </select>
        </div>
        <input type="submit" value="ADD" name="add" id="add">
    </form>
</body>
</html>