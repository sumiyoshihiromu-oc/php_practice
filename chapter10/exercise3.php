<?php

session_start();

if ($_SERVER['REQUEST_METHOD']  == 'POST') {
    $_SESSION["color"] = $_POST["colors"];
    print <<< PAGE
<!DOCTYPE html>
<html lang="ja">
    <head><title>{title}</title><meta charset="UTF-8"></head>
PAGE;
    if ($_POST["colors"] == "赤") {
        print "<body bgcolor='red'>";
        print "<h1>あなたの選んだ色は" . $_POST["colors"] . "</h1></body></html>";
    } elseif ($_POST["colors"] == "青") {
        print "<body bgcolor='blue'>";
        print "<h1>あなたの選んだ色は" . $_POST["colors"] . "</h1></body></html>";
    } elseif ($_POST["colors"] == "黄") {
        print "<body bgcolor='yellow'>";
        print "<h1>あなたの選んだ色は" . $_POST["colors"] . "</h1></body></html>";
    } elseif ($_POST["colors"] == "緑") {
        print "<body bgcolor='green'>";
        print "<h1>あなたの選んだ色は" . $_POST["colors"] . "</h1></body></html>";
    }
} else {
    print <<< FORM
<b style='font-size: 20px'>好きな色を選んでください</b>
<form method="post" action="$_SERVER[PHP_SELF]">
    <select name="colors">
        <option hidden>選択してください</option>
        <option value="赤">赤</option>
        <option value="青">青</option>
        <option value="黄">黄</option>
        <option value="緑">緑</option>
    </select>
    <input type="submit" value="送信する">
</form>
FORM;
    print var_dump($_SESSION);
}
