<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    list($errors) = validate_form();
    if ($errors) {
        show_form($errors);
    } else {
        process_form();
    }
} else {
    show_form();
}

function show_form($errors = []) {
    if ($errors) {
        print "※エラー<br>";
        foreach ($errors as $error) {
            print $error. "<br>";
        }
    }
    print <<< HTML
<form method="post" action="$_SERVER[PHP_SELF]">
    <b>小包情報</b>
    <br>
    発送元：<input type="text" name="from_address"><br>
    宛先：<input type="text" name="to_address"><br>
    荷物の高さ：<input type="text" name="height"><br>
    荷物の横幅：<input type="text" name="width"><br>
    荷物の縦の長さ：<input type="text" name="depth"><br>
    荷物の重さ：<input type="text" name="weight"><br>
    <br>
    <input type="submit" value="送信する">
</form>
HTML;

}

function process_form() {
    $from_address = $_POST["from_address"];
    $to_address = $_POST["to_address"];
    $height = $_POST["height"];
    $width = $_POST["width"];
    $depth = $_POST["depth"];
    $weight = $_POST["weight"];

    print <<< HTML
<tr><th>発送元</th><th>宛先</th><th>荷物の高さ</th><th>荷物の横幅</th><th>荷物の縦の長さ</th><th>荷物の重さ</th></tr>
<tr><td>$from_address</td><td>$to_address</td><td>$height</td><td>$width</td><td>$depth</td><td>$weight</td></tr>
HTML;

}

function validate_form() {
    $errors = [];

    $input["from_address"] = trim($_POST["from_address"]);
    if (! strlen($input["from_address"])) {
        $errors[] = "発送元を入力してください";
    }

    $input["to_address"] = trim($_POST["to_address"]);
    if (! strlen($input["to_address"])) {
        $errors[] = "宛先を入力してください";
    }

    $input["height"] = trim($_POST["height"]);
    if (! strlen($input["height"]) || ! is_numeric($input["height"])) {
        $errors[] = "小包の高さを半角英数字で入力してください。";
    }

    $input["width"] = trim($_POST["width"]);
    if (! strlen($input["width"]) || ! is_numeric($input["width"])) {
        $errors[] = "小包の横幅を半角英数字で入力してください。";
    }

    $input["depth"] = trim($_POST["depth"]);
    if (! strlen($input["depth"]) || ! is_numeric($input["depth"])) {
        $errors[] = "小包の縦の長さを半角英数字で入力してください。";
    }

    $input["weight"] = trim($_POST["weight"]);
    if (! strlen($input["weight"]) || ! is_numeric($input["weight"])) {
        $errors[] = "小包の縦の重さを半角英数字で入力してください。";
    }

    $input["size"] = intval($_POST["height"]) + intval($_POST["width"]) + intval($_POST["depth"]);
    if ($input["size"] > 32) {
        $errors[] = "荷物が大きすぎます。3辺の合計は36インチまでです。";
    }

    if ($_POST["weight"] > 150) {
        $errors[] = "荷物が重すぎます。150ポンドまで可能です。";
    }

    return [$errors];
}
