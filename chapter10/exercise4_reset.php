<?php

session_start();

unset($_SESSION["soy_sauce"], $_SESSION["salt"], $_SESSION["pig_bones"], $_SESSION["miso"], $_SESSION["ie"], $_SESSION["jirou"]);

print "注文完了しました。";

print <<< FIRST
<form method="form" action="exercise4.php">
    <input type="submit" value="注文ページへ戻る" style="margin-top: 10px">
</form>
FIRST;

var_dump($_SESSION);
