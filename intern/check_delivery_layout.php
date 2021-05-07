<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>配送先結果</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<!--何かしらの値が空のまま登録されないようにチェックします。-->
<?php if (empty($_POST["name"]) or (empty($_POST["zip_code"])) or (empty($_POST["address"]))) { ?>
    <b style="font-size: 30px">※エラー</b>
    <br>
    <b class="caution">※必須項目を入力してください</b>
<!--郵便番号の表記を正規表現でチェックします。-->
<?php } elseif (!preg_match("/^[0-9]{3}-[0-9]{4}$/", $_POST["zip_code"])) { ?>
    <b style="font-size: 30px">※エラー</b>
    <b class="caution">※郵便番号はXXX-XXXX形式で入力してください。</b>
<!--チェックに引っかからなかったら確認する画面を出力します。    -->
<?php } else { ?>
    <b style="font-size: 30px">確認画面</b>
        <br>
        配送先名：　<?= $name ?>
        <br>
        郵便番号：　<?= $zip_code ?>
        <br>
        住所：　　　<?= $address ?>
        <br>
        <br>
<!--register.phpに値を送る必要があるのでhiddenタイプで送っています。    -->
    <form method="post" action="register.php">
        <input type="submit" value="配送先を新規登録する" class="button">
        <input type="hidden" name="name" value="<?= $name ?>">
        <input type="hidden" name="zip_code" value="<?= $zip_code ?>">
        <input type="hidden" name="address" value="<?= $address ?>">
    </form>
<?php } ?>
<?php DeliveryLocation::print_back(); ?>
<?php DeliveryLocation::print_back_list(); ?>
</body>
</html>
