<?php
require "delivery_class.php";

$name = $_POST['name'];
$zip_code = $_POST['zip_code'];
$address = $_POST['address'];

include "check_delivery_layout.php";
