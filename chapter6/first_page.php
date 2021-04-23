<?php
require "delivery_class.php";

$lines = file("aichi_data.csv");

foreach ($lines as $line) {
    $data = explode(",", $line);

    $deliveryLocation = new DeliveryLocation($data[0], $data[1], $data[2], $data[3], $data[4], $data[5], $data[6], $data[7], $data[8], $data[11]);

    $array[] = $deliveryLocation;
}

include "first_page_layout.php";
