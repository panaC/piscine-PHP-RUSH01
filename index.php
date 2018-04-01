<?PHP
?>
session_start();
$sql = mysqli_connect($servername, $username, $password, $database);
echo mysqli_error($sql) . "<br>";

$s = "SELECT * FROM categorie";
$res = mysqli_query($sql, $s);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Shop</title>
		<link rel="stylesheet" type="text/css" href="theme.css">
	</head>
	<body>
<ul>
  <li><a class = active href="index.php" style="text-color:white">Home</a></li>
  <li><a  href="Categorie.php">Categorie</a></li>
  <li><a href="#contact">Panier</a></li>
  <li><a href="#about">log IN/OUT</a></li>
</ul>
	</body>
</html>
