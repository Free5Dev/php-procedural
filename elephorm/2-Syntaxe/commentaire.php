<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php 
        // les variables en php avec leurdsd types
        $nbn=5;
        $nom="said";
        $bol=4;
        $tab[]=10;
        $retour="<br/>";
        /* affichage d'une variable et son type*/
        echo gettype($nb)." => ".$nb." ".$retour;
        echo gettype($nom)." => ".$nom." ".$retour;
        echo gettype($bolnb)." => ".$bol." ".$retour;
        echo gettype($tab)." => ".$tab[0]." ".$retour;

    ?>
</body>
</html>