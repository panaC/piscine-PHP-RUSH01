<div id="conteneur">

<?php
/**
 * Created by PhpStorm.
 * User: pleroux
 * Date: 4/1/18
 * Time: 7:05 PM
 */

include "../var.php";

$arr = array_product_limit($lim_home);

foreach ($arr as $ap) {
    echo "<div id=\"element\"><table>";
    echo "<tr><div id='title'>".$ap[1]."</div></tr>";
    echo "<tr><div id='desc'>".$ap[2]."</div></tr>";
    echo "<tr><div id='prix'>".$ap[3]." €</div></tr>";
    echo "<tr><form method='get' action='panier/panier.php' style='display: block;'>
            Quantite: <input type='text' value='1' name='qty' style='display: block;'>
            <input type='text' value='".$ap[0]."' name='id_product' style='display: none;' style='display: block;'>
            <input type='submit' value='Acheter' style='display: block;'>
        </form></tr>";
    echo "</table></div>";
}

?>

</div>
