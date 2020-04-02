<?php  
    session_start();
    if(isset($_GET['logout'])){
        unset($_SESSION['login']);
        unset($_SESSION['password']);
    }
    if(!isset($_SESSION['login']) && !isset($_SESSION['password'])){
        header("Location: ./../index.php");
    }
    include '../connexion.inc.php';
    $sql = 'SELECT * FROM articles ORDER BY prix';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listing | Article</title>
</head>
<body>
    <h1>Listing All Articles</h1>
    <a href="add.php">ADD An Article</a> 
    <br/>
    <a href="index.php?logout=ok">Logout</a>
    <br><br>
    <table border="1" cellspacing="0" cellpadding="1" width="600">
        <tr>
            <th>Reference</th>
            <th>Prix</th>
            <th>Describe</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        <?php foreach  ($bdd->query($sql) as $row) { ?>
        <tr>
            <td><?php echo htmlspecialchars($row['reference']); ?></td>
            <td><?php echo htmlspecialchars($row['prix']); ?></td>
            <td><a href="describe.php?ref=<?php echo htmlspecialchars($row['reference']); ?>">describe</a></td>
            <td><a href="update.php?ref=<?php echo htmlspecialchars($row['reference']); ?>">update</a></td>
            <td><a href="delete.php?ref=<?php echo htmlspecialchars($row['reference']); ?>">delete</a></td>
        </tr>
        <?php }  ?>
    </table>
</body>
</html>