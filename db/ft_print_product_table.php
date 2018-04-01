<?php
/**
 * Created by PhpStorm.
 * User: pleroux
 * Date: 4/1/18
 * Time: 4:51 PM
 */

function print_product_table($s) {

    echo "<table>";
    echo "<tr><th>Ref</th><th>Titre</th><th>Prix</th><th>Qty</th></tr>";

    $arr = unserialize($s);

    foreach ($arr as $ap) {
        $a = get_product($ap['id_product']);
        echo "<tr>";
        echo "<td>".$ap['id_product']."</td><td>".$a[0]."</td><td>".$a[1]."</td><td>".$ap['qty']."</td>";
        echo "</tr>";
    }
    echo "</table>";
}

?>