<!DOCTYPE html>
<?php
function return_img_tag($url, $alt = null, $height = null, $width = null) {
    return "<img src='${url}' alt='${alt}' height='${height}' width='${width}'/>";
}

print return_img_tag("img/gopher.png", "gopher", "300px", "300px");
