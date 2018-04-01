<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Shop</title>
    <link rel="stylesheet" type="text/css" href="../css/theme.css">
</head>
<body>
<h1><?php include "../var.php"; echo $title; ?></h1>
<ul>
    <li><a <?php if (!isset($_GET['loc'])) echo "class=\"active\" "; ?> href="index.php">Home</a></li>
    <li><a <?php if (isset($_GET['loc']) && $_GET['loc'] == "categorie") echo "class=\"active\" "; ?> href="index.php?loc=categorie&categorie=all_cat">Categorie</a></li>
    <li><a <?php if (isset($_GET['loc']) && $_GET['loc'] == "panier") echo "class=\"active\" "; ?> href="../panier/panier.php">Panier</a></li>
    <li><a <?php if (isset($_GET['loc']) && $_GET['loc'] == "login") echo "class=\"active\" "; ?> href="../user/login.php">Se connecter</a></li>
    <li><a <?php if (isset($_GET['loc']) && $_GET['loc'] == "logout") echo "class=\"active\" "; ?> href="../user/logout.php">Deconnection</a></li>
    <li><a <?php if (isset($_GET['loc']) && $_GET['loc'] == "admin") echo "class=\"active\" "; ?> href="../admin/index.php">Administration</a></li>
    <li><p style="Position:absolute; right:30px; color: #f1f1f1"><?php include "../user/whoami.php";?></p></li>
</ul>
<?php
if (!empty($_GET['loc'])){
    switch ($_GET['loc']) {
        case "categorie":
            include "../db/array_product_categorie.php";
            include "../db/setting.php";
            include "../db/get_product.php";
            include "../boutique/categorie.php";
            break;
    }
} else {
    include "../db/array_product_limit.php";
    include "../boutique/home.php";
}

?>
</body>
</html>
