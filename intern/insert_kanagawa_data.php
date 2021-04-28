<?php

try {
    $db = new PDO('mysql:host=localhost; dbname=intern; charset=utf8', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $lines = file("kanagawa_data.csv");
    foreach ($lines as $line) {
        $data = explode(",", $line);
        $db->exec("INSERT INTO deliveries (zip_code, prefectures, kana_prefectures, municipality, kana_municipality, town_area, kana_town_area, office_name, kana_office_name, office_address, kana_office_address)
                           VALUES ($data[0], $data[1], $data[2], $data[3], $data[4], $data[5], $data[6], $data[7], $data[8], $data[9])");
    }
    print "成功しました";
} catch (PDOException $e) {
    print "データを追加できませんでした。:" . $e->getMessage();
}
