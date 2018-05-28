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
        //function intégrée documentation
        $nb=array(10,11,12,13,14,15);
        $res=count($nb);
        echo $res;
        // -----------------------------------------
        for($i=0;$i<$res;$i++)
        {
            echo "Notes:".$i."<br/>";
        }
    ?>
</body>
</html>