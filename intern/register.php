<?php

require "delivery_class.php";

try {
    $db = new PDO('mysql:host=localhost; dbname=intern; charset=utf8', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $db->prepare('insert into deliveries (zip_code, office_name, office_address) values (?, ?, ?)');
    $stmt->execute(array($_POST["zip_code"], $_POST["name"], $_POST["address"]));
    print "登録しました。";
    DeliveryLocation::print_back_list();
} catch (PDOException $e) {
    print "登録は失敗しました。:" . $e->getMessage();
    print "<br>";
    DeliveryLocation::print_back();
    DeliveryLocation::print_back_list();
}
