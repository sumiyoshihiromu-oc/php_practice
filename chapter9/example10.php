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

$fh = fopen("dishes.csv", "rb");
$stmt = $db->prepare("INSERT INTO dishes (dish_name, price, is_spicy) VALUES (?, ?, ?)");

while ((! feof($fh)) && ($info = fgetcsv($fh))) {
    $stmt->execute($info);
    print "$info[0] を追加しました。<br>";
}

fclose($fh);
