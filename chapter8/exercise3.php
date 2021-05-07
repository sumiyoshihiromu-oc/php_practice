<?php

if ($_SERVER['REQUEST_METHOD']  == 'POST') {
    $dish_name = $_POST["dish_names"];
    $db = new PDO('mysql:host=localhost; dbname=sample; charset=utf8', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $db->prepare('select * from dishes where dish_name like ?');
    $stmt->execute(array($_POST["dish_names"]));
    while ($row = $stmt->fetch()) {
        print "ID：$row[dish_id]";
        print "<br>料理名：$row[dish_name]";
        print "<br>値段：$$row[price]";
        if ($row['is_spicy'] == 0) {
            print "<br>辛さ：辛くありません";
        } else {
            print "<br>辛さ：辛いです";
        }
    }
} else {
    try {
        $db = new PDO('mysql:host=localhost; dbname=sample; charset=utf8', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $db->query('select dish_name from dishes');
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        include "exercise3_layout.php";
    } catch (PDOException $e) {
        print "処理は失敗しました。:" . $e->getMessage();
    }
}


