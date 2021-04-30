<?php
require "delivery_class.php";

if (isset($_POST["delivery"])) {
    $deliveries = $_POST["delivery"];
}

include "result_page_layout.php";


