<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Palette couleur des navigateurs</title>
    <link rel="stylesheet" href="style.css"/>
    <link href="https://fonts.googleapis.com/css?family=Oleo+Script+Swash+Caps" rel="stylesheet">

</head>
<body>
    <div id="bloc_page">
        <h1><span style="color:red;">Palette couleurs</span> <span style="color:green;"> des navigateurs <span style="color:blue;"> indépendants....</span></h1>
        <?php 
            $couleur=array("00","33","66","99","CC","FF");
            for($rouge=0;$rouge<6;$rouge++)
            {
                ?>
                <table >
                    <?php 
                    for($vert=0;$vert<6;$vert++)
                    {
                        ?>
                        <tr>
                            <?php
                             for($blue=0;$blue<6;$blue++)
                            {
                                $couleurCellule=$couleur[$rouge].$couleur[$vert].$couleur[$blue];
                                ?>
                                <td bgcolor="<?php  echo'#'.$couleurCellule; ?>">
                                   <?php
                                    echo $couleurCellule;
                                   ?>
                                </td>
                                <?php
                            }
                            ?>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
                <?php
            }
        ?>
    </div>
</body>
</html>