<?php

if ($_SERVER['REQUEST_METHOD']  == 'POST') {
    if ($form_errors = validate_form()) {
        show_form($form_errors);
    } else {
        process_form();
    }
} else {
    show_form();
}

function process_form() {
    print "こんにちわ, " . $_POST['my_name'] . "さん";

}

function show_form($errors = "") {
    if ($errors) {
        print "下記のエラーを修正してください<br><ul><li>";
        print implode("</li><li>", $errors);
        print "</li></ul>";
    }

    print<<<HTML
<form method="POST" action="$_SERVER[PHP_SELF]">
あなたの名前：<input type="text" name="my_name">
<br/>
<input type="submit" value="挨拶する">
</form>
HTML;
}

function validate_form() {
    $errors = [];
    if (strlen($_POST["my_name"]) < 3) {
        $errors[] = "名前は最低でも3文字以上入力してください。";
    }
    if (strlen($_POST["email"]) == 0) {
        $errors[] = "メールアドレスは必須項目です。";
    }
    return $errors;
}
