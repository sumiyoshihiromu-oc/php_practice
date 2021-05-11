<?php

try {
    $db = new PDO('mysql:host=localhost; dbname=sample; charset=utf8', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    print "データベースへ接続できませんでした：" . $e->getMessage();
    print "<br>問題のファイル：" . $e->getFile();
    print "<br>問題のファイルの行数：" . $e->getLine();
    exit();
}

$fh = fopen("dish_list.csv", "wb");

$dishes = $db->query("SELECT dish_name, price, is_spicy FROM dishes");
while ($row = $dishes->fetch(PDO::FETCH_NUM)) {
    fputcsv($fh, $row);
}

fclose($fh);
