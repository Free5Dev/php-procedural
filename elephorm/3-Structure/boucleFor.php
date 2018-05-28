<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
</head>
<body>
    <h1>Avec la boucle for très pratique </h1>
	<table border='1' width="600">
		<?php 
			for($i=1;$i<6;$i++)
			{
				echo"<tr>";
				for($j=6;$j>0;$j--)
				{
					echo"<td>";
					echo $i."-".$j;	
					echo"</td>";
				}
				echo"</tr>";
			}
		?>
	</table>
</body>
</html>