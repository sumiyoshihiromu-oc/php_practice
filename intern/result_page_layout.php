<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>配送先結果</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<?php if (isset($_POST["delivery"])) { ?>
    <b style="font-size: 30px">配送先</b>
    <table border="1" style="border-collapse: collapse">
        <tr class="header"><th>名前</th><th>郵便番号</th><th>住所</th><th>名前（カナ）</th></tr>
        <?php
        foreach ($deliveries as $delivery) {
            print "<tr>$delivery</tr>";
        }
        ?>
    </table>
<?php } else { ?>
    <b class="caution">※配送先を選んでください</b>
<?php } ?>
<?php print_back(); ?>
</body>
</html>
