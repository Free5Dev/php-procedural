<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Couleurs indépendantes</title>
</head>

<body>
<?php
$couleur=array("00","33","66","99","CC","FF");
for($rouge=0;$rouge<count($couleur);$rouge++)
	{
	echo "<table>";
	for($vert=0;$vert<count($couleur);$vert++)
		{
		echo "<tr>";
		for($bleu=0;$bleu<count($couleur);$bleu++)
			{
			$couleurCellule=$couleur[$rouge].$couleur[$vert].$couleur[$bleu];
			echo "<td width='100' bgcolor='#".$couleurCellule."'>";
			  echo $couleurCellule;
			echo "</td>";
			}
		echo "</tr>";
		}
	echo "</table>";
	}
?>
</body>
</html>