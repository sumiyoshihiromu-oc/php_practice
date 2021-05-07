<b style='font-size: 20px'>新規登録</b>
<form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
    お客様のお名前：<input type="text" name="client_name"><br><br>
    お客様のお電話番号：<input type="text" name="phone_number"><br><br>
    お客様の好きなメニュー：
    <select name="dish_names">
        <option hidden>選択してください</option>
        <?php foreach ($result as $value) { ?>
            <option value="<?= $value['dish_id']; ?>">
                <?= $value["dish_name"]; ?>
            </option>
        <?php } ?>
    </select><br><br>
    <input type="submit" value="新規登録する">
</form>
