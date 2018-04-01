<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Shop</title>
		<link rel="stylesheet" type="text/css" href="css/theme.css">
	</head>
	<body>
    <h1><?php include "var.php"; echo $title; ?></h1>
    <ul>
        <li><a <?php if (!isset($_GET['loc'])) echo "class=\"active\" "; ?> href="index.php">Home</a></li>
        <li><a <?php if (isset($_GET['loc']) && $_GET['loc'] == "categorie") echo "class=\"active\" "; ?> href="index.php?loc=categorie">Categorie</a></li>
        <li><a <?php if (isset($_GET['loc']) && $_GET['loc'] == "panier") echo "class=\"active\" "; ?> href="index.php?loc=panier">Panier</a></li>
        <li><a <?php if (isset($_GET['loc']) && $_GET['loc'] == "login") echo "class=\"active\" "; ?> href="user/login.php">Se connecter</a></li>
        <li><a <?php if (isset($_GET['loc']) && $_GET['loc'] == "logout") echo "class=\"active\" "; ?> href="user/logout.php">Deconnection</a></li>
        <li><a <?php if (isset($_GET['loc']) && $_GET['loc'] == "admin") echo "class=\"active\" "; ?> href="admin/index.php">Administration</a></li>
        <li><p><?php include "user/whoami.php";?></p></li>
    </ul>
    <?php
        if (isset($_GET['loc'])){
            switch ($_GET['loc']) {
                case "categorie":
                    include "boutique/categorie.php";
                    break;
            }
        } else {
            include "db/array_product_limit.php";
            include "boutique/home.php";
        }

    ?>
	</body>
</html>
