<?php
require "delivery_class.php";

//新規登録画面で入力された値を確認画面で使うため変数に代入しました。
$name = $_POST['name'];
$zip_code = $_POST['zip_code'];
$address = $_POST['address'];

//htmlの部分はcheck_delivery_layout.phpというファイルへ書きました。
include "check_delivery_layout.php";
