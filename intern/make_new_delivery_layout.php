<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>新規登録</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <b style="font-size: 30px">新規登録</b>
<!--入力された値をcheck_delivery.phpに渡します。-->
    <form method="post" action="check_delivery.php">
        配送先名：　<input type="text" name="name">
        <br>
        郵便番号：　<input type="text" name="zip_code">
        <br>
        住所：　　　<input type="text" name="address">
        <br>
        <br>
        <input type="submit" value="登録確認画面" class="button">
    </form>
    <?php DeliveryLocation::print_back(); ?>
    <?php DeliveryLocation::print_back_list(); ?>
</body>
</html>
