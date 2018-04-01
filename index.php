<?PHP
session_start();
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
		<h1 style="font-size:300%">SHOP</h1>
<ul>
  <li><a class="active" href="#home">Home</a></li>
  <li><a href="#news">News</a></li>
  <li><a href="#contact">Contact</a></li>
  <li><a href="#about">About</a></li>
</ul>
		<div id="conteneur">
			<div class="element"><h1>0</h1></div>
			<div class="element"><h1>1</h1></div>
			<div class="element"><h1>2</h1></div>
			<div class="element"><h1>3</h1></div>
			<div class="element"><h1>4</h1></div>
			<div class="element"><h1>5</h1></div>
			<div class="element"><h1>6</h1></div>
			<div class="element"><h1>7</h1></div>
			<div class="element"><h1>8</h1></div>
			<div class="element"><h1>9</h1></div>
			<div class="element"><h1>10</h1></div>
			<div class="element"><h1>0</h1></div>
			<div class="element"><h1>1</h1></div>
			<div class="element"><h1>2</h1></div>
			<div class="element"><h1>3</h1></div>
			<div class="element"><h1>4</h1></div>
			<div class="element"><h1>5</h1></div>
			<div class="element"><h1>6</h1></div>
			<div class="element"><h1>7</h1></div>
			<div class="element"><h1>8</h1></div>
			<div class="element"><h1>9</h1></div>
			<div class="element"><h1>10</h1></div>
			<div class="element"><h1>11</h1></div>
		</div>
	</body>
</html>
