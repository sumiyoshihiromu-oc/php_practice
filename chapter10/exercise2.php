<?php

session_start();

if (isset($_SESSION["count"])) {
    $_SESSION["count"] += 1;
} else {
    $_SESSION["count"] = 1;
}

if ($_SESSION["count"]  == 20) {
    unset($_SESSION["count"]);
    print "訪問回数が20回になりましたので、訪問回数をリセットします！";
} elseif ($_SESSION["count"]  % 5 == 0) {
    print "おめでとうございます！" . $_SESSION["count"] . "回目の訪問です！";
} else {
    print $_SESSION["count"] . "回目の訪問です！";
}
