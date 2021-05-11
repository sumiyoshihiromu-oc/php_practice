<?php

$addresses = [];

$fh = fopen("addresses.txt", "rb");
if (! $fh) {
    die("Can't open addresses.txt: $php_errormsg");
}

while ((! feof($fh)) && ($line = fgets($fh))) {
    $line = trim($line);

    if (! isset($addresses[$line])) {
        $addresses[$line] = 0;
    }
    $addresses[$line] += 1;
}

if (! fclose($fh)) {
    die("Can't close addresses.txt: $php_errormsg");
}

var_dump($addresses);

arsort($addresses);

var_dump($addresses);

$fh = fopen("addresses_count.txt", "wb");
if (! $fh) {
    die("Can't open addresses_count.txt: $php_errormsg");
}

foreach ($addresses as $address => $count) {
    if (fwrite($fh, "$count, $address\n") === false) {
        die("Can't close addresses_count.txt: $php_errormsg");
    }
}

if (! fclose($fh)) {
    die("Can't close addresses_count.txt: $php_errormsg");
}
