<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>配送先一覧</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <b style="font-size: 30px">配送先一覧</b>

    <form method="post" action="result_page.php">

        <table border="1" style="border-collapse: collapse">
            <tr class="header"><th></th><th>名前</th><th>郵便番号</th><th>住所</th><th>名前（カナ）</th></tr>
            <?php
            $i = 0;
            foreach ($array as $value) {
                if ($i > 19) {
                    break;
                }
                $value->print();
                $i++;
            }
            ?>
        </table>
        <input type="submit" value="送信する" style="margin-top: 10px" class="button">
    </form>
</body>
</html>
