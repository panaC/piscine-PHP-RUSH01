<div id="conteneur"><br><br>
    <ul>


<?php
/**
 * Created by PhpStorm.
 * User: pleroux
 * Date: 4/1/18
 * Time: 7:43 PM
 */

    $sql = mysqli_connect($servername, $username, $password, $database);
    echo mysqli_error($sql) . "<br>";

    $s = "SELECT * FROM categorie";
    $res = mysqli_query($sql, $s);

    $arr = mysqli_fetch_field($res);
    for ($y = 1; $y < mysqli_num_fields($res); $y = $y + 1) {
        echo "<li>";
        $arr = mysqli_fetch_field($res);
        echo "<a ";
        if (isset($_GET['categorie']) && $_GET['categorie'] == $arr->name)
            echo "class=\"active\"";
        echo "href=\"index.php?loc=categorie&categorie=".$arr->name."\">";
        echo $arr->name."</a></li>";
    }

    echo "</ul>";
    echo "<div id=\"conteneur\" style='padding:50px'>";

    if (!empty($_GET['categorie'])) {
        $ap = array_product_categorie($_GET['categorie']);

        if (!empty($ap)) {
            foreach ($ap as $a) {
                $arr = get_product($a[0]);
                if (!empty($arr)) {
                    echo "<div id=\"element\" style='padding:10px'><table>";
                    echo "<tr><div id='title'>" . $arr[0] . "</div></tr>";
                    echo "<tr><div id='desc'>" . $arr[3] . "</div></tr>";
                    echo "<tr><div id='prix'>" . $arr[1] . " €</div></tr>";
                    echo "<tr><form method='get' action='../panier/panier.php' style='display: block;'>
                    Quantite: <input type='text' value='1' name='qty' style='display: block;'>
                    <input type='text' value='" . $arr[2] . "' name='id_product' style='display: none;' style='display: block;'>
                    <input type='submit' value='Acheter' style='display: block;'>
                </form></tr>";
                    echo "</table></div>";
                }
            }
        }
    }

    echo "</div>";


?>


</div>

