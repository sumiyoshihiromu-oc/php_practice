<?php
if (isset($_POST["delivery"])) {
    $deliveries = $_POST["delivery"];
}

function print_back() {
    print <<< BACK
<form method="form" action="$_SERVER[HTTP_REFERER]">
<input type="submit" value="前のページへ戻る" style="margin-top: 10px" class="button">
</form>
BACK;
}

include "result_page_layout.php";


