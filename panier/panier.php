<html>
<body>
<style>
    table, th, td {
        border: 1px solid black;
    }
</style>
<h1>Panier de l'e-shop</h1>
<h2>Panier en cours :</h2>

<table style="width:100%">
    <tr>
        <th>Ref</th>
        <th>Title</th>
        <th>Qty</th>
        <th>Prix</th>
        <th>Total</th>
    </tr>
<?php
/**
 * Created by PhpStorm.
 * User: pierre
 * Date: 01/04/18
 * Time: 12:24
 */

session_start();
include "../db/setting.php";
include "../db/get_product.php";

if (!empty($_GET['id_product']) && !empty($_GET['qty'])) {
    if (empty($_SESSION['panier']))
        $_SESSION['panier'] = array();
    $_SESSION['panier'][] = array('id_product' => $_GET['id_product'], 'qty' => $_GET['qty']);
}

foreach ($_SESSION['panier'] as $arr){
    $ap = get_product($arr['id_product']);
    $_SESSION['panier-total'] = $ap[1] * $arr['qty'];
    echo "<tr>";
    echo "<td>".$arr['id_product']."</td><td>".$ap[0]."</td><td>".$arr['qty']."</td><td>".
        $ap[1]."</td><td>".$_SESSION['panier-total']."</td>";
    echo "</tr>";
}

echo "</table>";
echo "<br><a href=\"../db/val_panier.php\">Valider le panier</a>";


include "../db/print_panier_current.php";

include "../db/print_panier_archive.php";


// display the ongoing panier in table
//add validate form -> in validate verify the $session login because redirection to login.php else
    // fill the database with current;

// display html code for the next table the current table
// display html code for the next table the archive table


// fill the archive table

?>

</body>
</html>
