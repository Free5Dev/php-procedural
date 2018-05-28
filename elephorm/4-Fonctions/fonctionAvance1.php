<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Function Simple</title>
</head>
<body>
    <?php 
        // functio n avancé une
        function moyenne($x,$y)
        {
            $som=$x+$y;
            $moy=$som/2;
            $res=array($som,$moy);
            return  $res;
        }
        // appel de la function
        $calcul=moyenne(2,4);
        echo"La somme est:".$calcul[0]."<br/>";
        echo"La moyenne est:".$calcul[1];
        // --------------------------------------
       
        $calcul2=moyenne(6,8);
        echo"<br/>La somme est:".$calcul2[0]."<br/>";
        echo"<br/>La moyenne est:".$calcul2[1];
    ?>
</body>
</html>