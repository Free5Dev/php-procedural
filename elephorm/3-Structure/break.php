<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Structure de control Break</h1>
    <?php 
        // break
        $nb=array(1,1,0,1,1);
        for($i=0;$i<count($nb); $i++)
        {
            if($nb[$i]==0) break;
            {
                echo"Tour:".$i."<br/>";
            }
        }
       
    ?>
   
</body>
</html>