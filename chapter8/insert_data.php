<?php

try {
    $db = new PDO('mysql:host=localhost; dbname=sample; charset=utf8', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $affectedRows = $db->exec("INSERT INTO dishes (dish_id, dish_name, price, is_spicy) VALUES (1, 'Walnut Bun', 1.00, 0),
                                                                                                        (2, 'Cashew Nuts and White Mushrooms', 4.95, 0),
                                                                                                        (3, 'Dried Mulberries', 3.00, 0),
                                                                                                        (4, 'Eggplant with Chili Sauce', 6.50, 1),
                                                                                                        (5, 'Red Bean Bun', 1.00, 0),
                                                                                                        (6, 'General Tso''s Chicken', 5.50, 1)");
    print "成功しました";
} catch (PDOException $e) {
    print "データを追加できませんでした。:" . $e->getMessage();
}
