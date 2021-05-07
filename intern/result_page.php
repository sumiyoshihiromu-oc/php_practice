<?php
//delivery_class.phpをよみこみます。
require "delivery_class.php";

//チェックされている配送先がある場合、それを変数deliveriesへ代入します。
if (isset($_POST["delivery"])) {
    $deliveries = $_POST["delivery"];
}

//htmlの部分はresult_page_layout.phpへかきます。
include "result_page_layout.php";


