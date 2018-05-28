<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Les tableaux indicés sans l'indice de dans n°1</h1>
    <?php 
       /*les tableuax indicés */
    //    ----------------------------------------------------------------tab indicé n°1 sans l'indice
    $tab[]=10;
    $tab[]=12;
    $tab[]=14;

    echo $tab[2];
    echo"<pre>";
    print_r($tab);
    echo"</pre>";

    ?>
    <!-- --------------------------------------------------------------------------------------- -->
    <h1>Les tableaux indicés avec l'indice de dans n°2</h1>
    <?php 
       /*les tableuax indicés */
    //    ----------------------------------------------------------------tab indicé n°1 sans l'indice
    $tab[0]=16;
    $tab[1]=18;
    $tab[2]=20;

    echo $tab[2];
    echo"<pre>";
    print_r($tab);
    echo"</pre>";

    ?>
    <!-- --------------------------------------------------------------------------------------- -->
    <h1>Les tableaux indicés déclaration sur une seul ligne </h1>
    <?php 
       /*les tableuax indicés */
    //    ----------------------------------------------------------------tab indicé n°1 sans l'indice
    $tab=array(22,24,26);

    echo $tab[2];
    echo"<pre>";
    print_r($tab);
    echo"</pre>";

    ?>
    <!-- -------------------------------------------------------------------------------------------- -->
    <h1>Les tableaux associatifs n°1</h1>
    <?php 
       /*les tableuax indicés */
    //    ----------------------------------------------------------------tab indicé n°1 sans l'indice
    $tabs['ss']=10;
    $tabs['tt']=12;
    $tabs['dd']=14;

    echo $tabs['dd'];
    echo"<pre>";
    print_r($tabs);
    echo"</pre>";

    ?>
    <!-- ------------------------------------------------------------------------------------------------ -->
    <h1>Les tableaux associatifs  n°2</h1>
    <?php 
       /*les tableuax indicés */
    //    ----------------------------------------------------------------tab indicé n°1 sans l'indice
   $tabss=array('kd'=>34,'as'=>25,'tr'=>77);

    echo $tabss['kd'];
    echo"<pre>";
    print_r($tabss);
    echo"</pre>";

    ?>
</body>
</html>