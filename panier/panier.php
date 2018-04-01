<html>
<body>
<h1>Panier de l'e-shop</h1>
<br>
<h2>Panier en cours :</h2>
<br>
<table>
    <tr>
        <th>Ref</th>
        <th>Title</th>
        <th>Qty</th>
        <th>Prix</th>
        <th>Total</th>
    </tr>
</table>

<?php
/**
 * Created by PhpStorm.
 * User: pierre
 * Date: 01/04/18
 * Time: 12:24
 */

session_start();
include "../db/setting.php"

if (!empty($_GET['id_product']) && !empty($_GET['qty']))
{
    if (empty($_SESSION['panier']))
        $_SESSION['panier'] = array();
    $_SESSION['panier'][] = array('id_product'=>$_GET['id_product'], 'qty'=>$_GET['qty']);

    foreach ($_SESSION['panier'] as $arr){
        $ap = get_product($arr['id_product']);
        $total = $ap['prix'] * $arr['qty'];
        echo "<tr>";
        echo "<td>".$arr['id_product']."</td><td>".$ap['title']."</td><td>".$arr['qty']."</td><td>".$ap['prix']."</td><td>".$total."</td>";
    }
}

echo "<br><a href=\"../sql/val_panier.php\">Valider le panier</a>";

echo "<br><br>";
echo "<h2>Paniers commandés et validés: </h2>";
echo "<br>";


// display the ongoing panier in table
//add validate form -> in validate verify the $session login because redirection to login.php else
    // fill the database with current;

echo "<br><br>";
echo "<h2>Paniers archivés et envoyés: </h2>";
echo "<br>";

// display html code for the next table the current table
// display html code for the next table the archive table


// fill the archive table

?>

</body>
</html>

