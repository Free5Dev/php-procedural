<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Les variables tableuax à deux dimensions</h1>
    <?php 
        $ligne1=array(12,14,16);
        $ligne2=array(20,22,24);
        $ligne3=array(35,37);

        echo $ligne1[1];
        echo"<pre>";
        print_r($ligne1);
        echo"</pre>";

        echo $ligne2[2];
        echo"<pre>";
        print_r($ligne2);
        echo"</pre>";
        $classe=array($ligne1,$ligne2);
        $classe[]=$ligne3;

        echo $classe[1][2];
        echo"<pre>";
        print_r($classe);
        echo"</pre>";


    ?>
</body>
</html>