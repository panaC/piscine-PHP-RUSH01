<html>
<head>
    <style>
        body {
            margin: 0;
        }

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            width: 25%;
            background-color: #f1f1f1;
            position: fixed;
            height: 100%;
            overflow: auto;
        }

        li a {
            display: block;
            color: #000;
            padding: 8px 16px;
            text-decoration: none;
        }

        li a.active {
            background-color: dodgerblue;
            color: white;
        }

        li a:hover:not(.active) {
            background-color: #555;
            color: white;
        }
    </style>
</head>
<body>

<ul>
    <li><a <?php if (!isset($_GET['loc'])) echo "class=\"active\" "; ?> href="index.php">Home</a></li>
    <li><a <?php if (isset($_GET['loc']) && $_GET['loc'] == "user") echo "class=\"active\" "; ?> href="index.php?loc=user">Client</a></li>
    <li><a <?php if (isset($_GET['loc']) && $_GET['loc'] == "panier") echo "class=\"active\" "; ?> href="index.php?loc=panier">Commande</a></li>
    <li><a <?php if (isset($_GET['loc']) && $_GET['loc'] == "product") echo "class=\"active\" "; ?> href="index.php?loc=product">Produits</a></li>
    <li><a <?php if (isset($_GET['loc']) && $_GET['loc'] == "categorie") echo "class=\"active\" "; ?> href="index.php?loc=categorie">Categorie</a></li>
    <li><a <?php if (isset($_GET['loc']) && $_GET['loc'] == "admin") echo "class=\"active\" "; ?> href="index.php?loc=admin">Admin</a></li>
    <li><a href="../user/logout.php">Logout</a></li>
    <li><a href="../index/index.php">Boutique</a></li>
</ul>

<div style="margin-left:25%;padding:1px 16px;height:1000px;">
<?php

include "../db/setting.php";
include "../db/auth.php";

session_start();

if (!empty($_SESSION['loggued_on_user'])) {
    if (auth_admin($_SESSION['loggued_on_user'])) {
        if (isset($_GET['loc'])){
            switch ($_GET['loc']) {
                case "user":
                    include "user.php";
                    break;
                case "panier":
                    include "panier.php";
                    break;
                case "product":
                    include "product.php";
                    break;
                case "categorie":
                    include "categorie.php";
                    break;
                case "admin":
                    include "admin.php";
                    break;
            }
        } else {
            echo "PAGE D'ACCUEIL D'ADMINISTRATION DE CETTE E_BOUTIQUE<br>";
        }
    } else {
        echo "Vous n'avez pas les droits<br>";
    }
} else {
    header("location: ../index.php");
}

?>
</div>
</body>
</html>

