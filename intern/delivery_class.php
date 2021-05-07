<?php
class DeliveryLocation
{
//first_page.phpでデータベースに登録されている配送先の一覧を表示させるメソッドです。
    public static function print() {
        try {
            $db = new PDO('mysql:host=localhost; dbname=intern; charset=utf8', 'root', '');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $db->query('select zip_code, office_name, office_address from deliveries');
            while ($row = $stmt->fetch()) {
                $delivery = "<td>$row[office_name]</td><td>$row[zip_code]</td><td>$row[office_address]</td>";
                print <<< BOX
<tr><td><input type="checkbox" name="delivery[]" value="$delivery" class="button">$delivery</td></tr>
BOX;
            }
        } catch (PDOException $e) {
            print "エラーメッセージ:" . $e->getMessage();
            print "<br>";
            print "エラーが発生したファイル：" . $e->getFile();
            print "<br>";
            print "エラーが発生した行：" . $e->getLine();

        }
    }

//前のページへ戻るボタンを出力するメソッドです。
    public static function print_back() {
        print <<< BACK
<form method="form" action="$_SERVER[HTTP_REFERER]">
    <input type="submit" value="前のページへ戻る" style="margin-top: 10px" class="button">
</form>
BACK;
    }

//配送先一覧を表示しているページ（first_page.php）へ遷移させるボタンを出力するメソッドです。
    public static function print_back_list() {
        print <<< LIST
<form method="form" action="first_page.php">
    <input type="submit" value="一覧ページへ戻る" style="margin-top: 10px" class="button">
</form>
LIST;


    }
}
