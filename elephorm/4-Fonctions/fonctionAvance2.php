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
        function moyenne($x,$y,$unit="Euros")
        {
           $res=($x+$y)/2;
           $res.=$unit;
            return  $res;
        }
        // appel de la function
        $calcul=moyenne(2,4);
        echo"La moyenne est:".$calcul;
        // --------------------------------------
       
        $calcul2=moyenne(6,8);
        echo"<br/>La moyenne est:".$calcul2;
    ?>
</body>
</html>