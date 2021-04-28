<?php

try {
    $db = new PDO('mysql:host=localhost; dbname=sample; charset=utf8', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $order_dishes = $db->query('SELECT * FROM dishes ORDER BY price');
    while ($row = $order_dishes->fetch()) {
        print "$row[dish_name], $row[price]<br>";
    }
} catch (PDOException $e) {
    print "処理は失敗しました。:" . $e->getMessage();
}
