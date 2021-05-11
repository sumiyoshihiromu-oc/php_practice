<?php

$fh = fopen("dishes.csv", "rb");
if (! $fh) {
    die("Can't open dishes.csv: $php_errormsg");
}

print "<table  border='1' style='border-collapse: collapse'>\n";
while ((! feof($fh)) && ($line = fgetcsv($fh))) {
    print "<tr><td>" . implode("</td><td>", $line) . "</td></tr>\n";
}
print "</table>";
