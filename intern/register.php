<?php
//delivery_class.phpをよみこみます。
require "delivery_class.php";

try {
//check_delivery.phpから渡された値をデータベースへ保存します。
    $db = new PDO('mysql:host=localhost; dbname=intern; charset=utf8', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $db->prepare('insert into deliveries (zip_code, office_name, office_address) values (?, ?, ?)');
    $stmt->execute(array($_POST["zip_code"], $_POST["name"], $_POST["address"]));
    print "登録しました。";
    DeliveryLocation::print_back_list();
} catch (PDOException $e) {
//保存できなかった場合、不具合の内容と、ファイル名と行数を表示します。
    print "エラーメッセージ:" . $e->getMessage();
    print "<br>";
    print "エラーが発生したファイル：" . $e->getFile();
    print "<br>";
    print "エラーが発生した行：" . $e->getLine();
    DeliveryLocation::print_back();
    DeliveryLocation::print_back_list();
}
