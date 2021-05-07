<?php

if ($_SERVER['REQUEST_METHOD']  == 'POST') {
    $db = new PDO('mysql:host=localhost; dbname=sample; charset=utf8', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (empty($_POST["client_name"]) or (empty($_POST["phone_number"])) or (empty($_POST["dish_names"]))) {
        print "必須項目を入力してください。";
        print <<< BACK
<form method="form" action="$_SERVER[HTTP_REFERER]">
    <input type="submit" value="前のページへ戻る" style="margin-top: 10px" class="button">
</form>
BACK;
    } else {
        $stmt = $db->prepare('insert into clients (client_name, phone_number, favorite_dish_id) values (?, ?, ?)');
        $stmt->execute(array($_POST["client_name"], $_POST["phone_number"], $_POST["dish_names"]));
        print "登録しました。";
        print <<< LIST
<form method="form" action="$_SERVER[PHP_SELF]">
    <input type="submit" value="登録画面へ戻る" style="margin-top: 10px" class="button">
</form>
LIST;
    }
} else {
    try {
        $db = new PDO('mysql:host=localhost; dbname=sample; charset=utf8', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $db->query('select dish_name, dish_id from dishes');
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        include "exercise4_layout.php";
    } catch (PDOException $e) {
        print "処理は失敗しました。:" . $e->getMessage();
    }
}
