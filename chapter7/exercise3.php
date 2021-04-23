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



function generate_options($options) {
    $html = "";
    foreach ($options as $option) {
        $html .= "<option>$option</option><br>";
    }
    return $html;
}

function show_form($errors = []) {
    $operators = ['+', '-', '*', '/'];
    $option_operators = generate_options($operators);
    if ($errors) {
        print "※エラー<br>";
        foreach ($errors as $error) {
            print $error. "<br>";
        }
    }
    print <<< HTML
<form method="post" action="$_SERVER[PHP_SELF]">
    <b>四則演算</b>
    <br>
    <input type="text" name="number_1">
    <select name="operators">$option_operators</select>
    <input type="text" name="number_2">
    <br>
    <input type="submit" value="計算する">
</form>
HTML;

}

function process_form() {
    $input["operators"] = $_POST["operators"];
    $input["number_1"] = $_POST["number_1"];
    $input["number_2"] = $_POST["number_2"];

    if ($input["operators"] == '+') {
        $result = $input["number_1"] + $input["number_2"];
        print $input['number_1'] . "+". $input["number_2"] . "=" . $result ;
    }

    if ($input["operators"] == '-') {
        $result = $input["number_1"] - $input["number_2"];
        print $input['number_1'] . "-". $input["number_2"] . "=" . $result ;
    }

    if ($input["operators"] == '*') {
        $result = $input["number_1"] * $input["number_2"];
        print $input['number_1'] . "*". $input["number_2"] . "=" . $result ;
    }

    if ($input["operators"] == '/') {
        $result = $input["number_1"] / $input["number_2"];
        print $input['number_1'] . "/". $input["number_2"] . "=" . $result ;
    }
}

function validate_form() {
    $errors = [];

    $input["number_1"] = trim($_POST["number_1"]);
    if (! strlen($input["number_1"]) or (! is_numeric($input["number_1"]))) {
        $errors[] = "1つ目の数字を入力してください";
    }

    $input["number_2"] = trim($_POST["number_2"]);
    if (! strlen($input["number_1"]) or (! is_numeric($input["number_2"]))) {
        $errors[] = "2つ目の数字を入力してください";
    }

    return [$errors];
}

