<?php

$page = file_get_contents("exercise1.html");

$page = str_replace("{title}", "エクササイズ", $page);

$page = str_replace("{name}", "ひろむ", $page);

file_put_contents("page.html", $page);
