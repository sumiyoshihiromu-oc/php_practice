<?php

date_default_timezone_set('Asia/Tokyo');

$page = file_get_contents("page_template.html");

$page = str_replace("{page_title}", "ようこそ", $page);

if (date('H') >= 12) {
    $page = str_replace("{color}", "yellow", $page);
} else {
    $page = str_replace("{color}", "green", $page);
}

$page = str_replace("{name}", "ひろむテスト", $page);

print $page;
