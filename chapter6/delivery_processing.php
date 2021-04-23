<?php

require "delivery_class.php";

if ($_SERVER['REQUEST_METHOD']  == 'POST') {

    if (isset($_POST["delivery"])) {
        $deliveries = $_POST["delivery"];
        print "<b>配送先</b>";

        print <<< RESULT
<table border="1" style="border-collapse: collapse">
<tr><th>名前</th><th>郵便番号</th><th>住所</th><th>名前（カナ）</th></tr>
RESULT;

        foreach ($deliveries as $delivery) {
            print "<tr>$delivery</tr>";
        }

        print "</table>";


    } else {
        print "<b>※配送先を選んでください</b>";
    }

    print <<< BACK
<form method="form" action="$_SERVER[HTTP_REFERER]">
<input type="submit" value="前のページへ戻る" style="margin-top: 10px">
</form>
BACK;


} else {
    $lines = file("aichi_data.csv");

    foreach ($lines as $line) {
        $data = explode(",", $line);

        $deliveryLocation = new DeliveryLocation($data[0], $data[1], $data[2], $data[3], $data[4], $data[5], $data[6], $data[7], $data[8], $data[11]);

        $array[] = $deliveryLocation;
    }

    print "<b>配送先一覧</b>";

    print <<< TABLE
<form method="post" action="$_SERVER[PHP_SELF]">
<table border="1" style="border-collapse: collapse">
<tr><th></th><th>名前</th><th>郵便番号</th><th>住所</th><th>名前（カナ）</th></tr>
TABLE;

    $i = 0;
    foreach ($array as $value) {
        if ($i > 19) {
            break;
        }
        $value->print();
        $i++;
    }

    print <<< FORM
</table>
<input type="submit" value="送信する" style="margin-top: 10px">
</form>
FORM;
}
