<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $defaults = $_POST;
} else {
    $defaults = ["delivery" => "yes",
                 "size" => "medium",
                 "main_dish" => ["taro", "tripe"],
                 "sweet" => "cake"];
}
