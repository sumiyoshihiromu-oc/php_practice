<b style='font-size: 20px'>メニューを選んでください</b>
<form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
    <select name="dish_names">
        <option hidden>選択してください</option>
        <?php foreach ($result as $value) { ?>
            <option value="<?= $value['dish_name']; ?>">
                <?= $value["dish_name"]; ?>
            </option>
        <?php } ?>
    </select>
    <input type="submit" value="詳細を見る">
</form>
