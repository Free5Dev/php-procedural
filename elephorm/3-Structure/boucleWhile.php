<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
</head>
<body>
    <h1>Avec la boucle while condition avant bouclage</h1>
	<?php 
        /*boucle while*/
        // declaration et initialisation du compteur
        $i=5;
        // condition de boucle
        while($i>0)
        {
            echo"Encore ".$i." à faire <br/>";
        //    decrément du compteur
            $i--;
        }
        echo "Fin du compteur";
		
	?>
    <h1>Avec la boucle do while boucle avant la condtion</h1>
    <?php 
        /*boucle while*/
        // declaration et initialisation du compteur
        $i=1;
        // condition de boucle
        do
        {
            echo"Encore ".$i." à faire <br/>";
        //    decrément du compteur
            $i++;
        }
        while($i<6);
        echo "Fin du compteur";
		
	?>
</body>
</html>