<?php

session_start();

if (isset($_SESSION["count"])) {
    $_SESSION["count"] += 1;
} else {
    $_SESSION["count"] = 1;
}

print "あなたがこのページを訪れるのは" . $_SESSION["count"] . "回目です！";
