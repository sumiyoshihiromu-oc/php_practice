<?php

if ($_SERVER['REQUEST_METHOD']  == 'POST') {
    $file_name = trim($_POST["file_name"]);
    $full_file_name = $_SERVER["DOCUMENT_ROOT"] . "/first_php_practice/chapter9/" . $file_name;
    if (strlen($file_name) === 0) {
        print "ファイル名を入力してください";
    } else {
        if (file_exists($full_file_name)) {
            print file_get_contents($full_file_name);
        } else {
            print "入力されたファイルはありません。";
        }
    }
    var_dump($full_file_name);
} else {
    print "<b style='font-size: 20px'>ファイル名を入力してください</b>";
    print <<< FORM
<form method="post" action="$_SERVER[PHP_SELF]"><br>
ファイル名：<input type="text" name="file_name">
<input type="submit" value="送信する">
</form>
FORM;
}
