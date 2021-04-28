<?php

if ($_SERVER['REQUEST_METHOD']  == 'POST') {
    $price = $_POST["price"];
    $db = new PDO('mysql:host=localhost; dbname=sample; charset=utf8', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $select_price = $db->query("SELECT dish_name, price FROM dishes WHERE price >='" . $price . "'");
    while ($row = $select_price->fetch()) {
        print "$row[dish_name], $row[price]<br>";
    }
    print <<< BUTTON
<form method="form" action="$_SERVER[HTTP_REFERER]">
<input type="submit" value="前のページへ戻る" style="margin-top: 10px">
</form>
BUTTON;

} else {
    print "<b style='font-size: 20px'>値段を半角英数字で入力してください</b>";
    print <<< FORM
<form method="post" action="$_SERVER[PHP_SELF]">
値段：<input type="text" name="price">
<input type="submit" value="送信する">
</form>
FORM;

}
