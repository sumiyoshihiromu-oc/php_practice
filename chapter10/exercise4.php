<?php

session_start();

if ($_SERVER['REQUEST_METHOD']  == 'POST') {
    $_SESSION["soy_sauce"] = $_POST["soy_sauce"];
    $_SESSION["salt"] = $_POST["salt"];
    $_SESSION["pig_bones"] = $_POST["pig_bones"];
    $_SESSION["miso"] = $_POST["miso"];
    $_SESSION["ie"] = $_POST["ie"];
    $_SESSION["jirou"] = $_POST["jirou"];
    print "確認<br>";
    print "醤油ラーメン：" . $_POST["soy_sauce"] . "　食<br>";
    print "塩ラーメン　：" . $_POST["salt"] . "　食<br>";
    print "豚骨ラーメン：" . $_POST["pig_bones"] . "　食<br>";
    print "味噌ラーメン：" . $_POST["miso"] . "　食<br>";
    print "家系ラーメン：" . $_POST["ie"] . "　食<br>";
    print "二郎ラーメン：" . $_POST["jirou"] . "　食<br>";
    print <<< FORM
<form method="post" action="exercise4_reset.php">
    <input type="submit" value="注文を確定する">
</form>
FORM;
    var_dump($_SESSION);
} else {
    print "注文する個数を入力してください。(それぞれ最大5食まで)";
    print '<form method="post" action="' . $_SERVER["PHP_SELF"] . '">';
    if (isset($_SESSION["soy_sauce"])) {
        print '醤油ラーメン：<input type="number" min="0" max="5" name="soy_sauce" style="width: 50px" value="' . $_SESSION["soy_sauce"] . '">　食<br>';
    } else {
        print '醤油ラーメン：<input type="number" min="0" max="5" name="soy_sauce" style="width: 50px">　食<br>';
    }
    if (isset($_SESSION["salt"])) {
        print '塩ラーメン：　<input type="number" min="0" max="5" name="salt" style="width: 50px" value="' . $_SESSION["salt"] . '">　食<br>';
    } else {
        print '塩ラーメン：　<input type="number" min="0" max="5" name="salt" style="width: 50px">　食<br>';
    }
    if (isset($_SESSION["pig_bones"])) {
        print '豚骨ラーメン：<input type="number" min="0" max="5" name="pig_bones" style="width: 50px" value="' . $_SESSION["pig_bones"] . '">　食<br>';
    } else {
        print '豚骨ラーメン：<input type="number" min="0" max="5" name="pig_bones" style="width: 50px">　食<br>';
    }
    if (isset($_SESSION["miso"])) {
        print '味噌ラーメン：<input type="number" min="0" max="5" name="miso" style="width: 50px" value="' . $_SESSION["miso"] . '">　食<br>';
    } else {
        print '味噌ラーメン：<input type="number" min="0" max="5" name="miso" style="width: 50px">　食<br>';
    }
    if (isset($_SESSION["ie"])) {
        print '家系ラーメン：<input type="number" min="0" max="5" name="ie" style="width: 50px" value="' . $_SESSION["ie"] . '">　食<br>';
    } else {
        print '家系ラーメン：<input type="number" min="0" max="5" name="ie" style="width: 50px">　食<br>';
    }
    if (isset($_SESSION["jirou"])) {
        print '二郎ラーメン：<input type="number" min="0" max="5" name="jirou" style="width: 50px" value="' . $_SESSION["jirou"] . '">　食<br>';
    } else {
        print '二郎ラーメン：<input type="number" min="0" max="5" name="jirou" style="width: 50px">　食<br>';
    }
    print '<input type="submit" value="注文確認画面"></form>';
    var_dump($_SESSION);
}
