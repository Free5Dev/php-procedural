<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Tableau indicé</h1>
    <?php 
        // boucle foreach avec un tableau indicé
        $agence=array("Paris","Nantes","Marseille");
        foreach($agence as $ville)
        {
            echo"L'agence de: ".$ville."<br/>";
        }
    ?>
    <h1>Tableau Associatif</h1>
    <?php 
        // boucle foreach avec un tableau indicé
        $agence=array("Centre"=>"Paris","Nord"=>"Nantes","Sud"=>"Marseille");
        foreach($agence as $cle=>$ville)
        {
            echo"L'agence de:".$cle." se trouve ".$ville."<br/>";
        }
    ?>
</body>
</html>