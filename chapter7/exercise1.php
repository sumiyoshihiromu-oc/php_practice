<?php

if ("POST" == $_SERVER["REQUEST_METHOD"]) {
    process_form();
} else {
    print<<<HTML
<form method="POST" action="$_SERVER[PHP_SELF]">
Braised Noodles with: <select name="noodle">
<option>crab meat</option>
<option>mushroom</option>
<option>barbecued pork</option>
<option>shredded ginger and green onion</option>
</select>
<br>
Sweet: <select name="sweet[]" multiple>
<option value="puff"> Sesame Seed Puff
<option value="square"> Coconut Milk Gelatin Square
<option value="cake"> Brown Sugar Cake
<option value="ricemeat"> Sweet Rice and Meat
</select>
<br>
Sweet Quantity: <input type="text" name="sweet_q">
<br>
<input type="submit" name="submit" value="Order">
</form>
HTML;
}

function process_form() {
//    $keyを配列の形でとっているのでhtmlentitiesがうまく動作しなくなっている
//    print "<ul>";
//    foreach ( $_POST as $key => $value ) {
//        print "<li>" . htmlentities($key) . htmlentities($value). "</li>";
//    }
//    print "</ul>";
    var_dump($_POST);
}




