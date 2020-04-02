<?php 
    session_start();
    include 'connexion.inc.php';
    if(isset($_POST['btnConnexion'])){
        if(!empty($_POST['login'] && $_POST['password'])){
            $sql = $bdd->query('SELECT * FROM registration');
            $resultat = $sql->fetchAll();
            echo"<pre>";
            print_r($resultat[1]['login']);
            echo"</pre>";
            foreach($resultat as $row){
                if(($_POST['login'] == $row['login']) && ($_POST['password'] ==$row['password'])){
                    $_SESSION['login'] = $_POST['login'];
                    $_SESSION['password'] = $_POST['password'];
                   header("Location: ./admin");
                }else{
                    $error='Error Identification';
                }
            }
        }else{
            echo"The fields is empty";
        }
    }
    echo"<pre>";
    print_r($_POST);
    echo"</pre>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Form</title>
</head>
<body>
    <?php 
        if(isset($error)){
            echo $error;
        }
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div>
            <label for="login">Login</label>
            <input type="text" name="login" id="login">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
        </div>
        <input type="submit" value="Connexion" id="btn" name="btnConnexion">
    </form>
</body>
</html>