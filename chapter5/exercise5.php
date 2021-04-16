<?php
function make_color($red, $green, $blue) {
    $array = [dechex($red), dechex($green), dechex($blue)];
    foreach ($array as $i => $val) {
        $array[$i] = "0$val";
    }
    return "#" . implode("", $array);
}

;
