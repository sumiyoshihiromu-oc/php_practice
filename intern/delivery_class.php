<?php
class DeliveryLocation
{
    public $zip_code;
    public $prefectures;
    public $kana_prefectures;
    public $municipality;
    public $kana_municipality;
    public $town_area;
    public $office_name;
    public $kana_office_name;
    public $office_address;
    public $information;

    public function __construct($zip_code, $prefectures, $kana_prefectures, $municipality, $kana_municipality, $town_area, $office_name,
                                $kana_office_name, $office_address, $information) {
        $this->zip_code = $zip_code;
        $this->prefectures = $prefectures;
        $this->kana_prefectures = $kana_prefectures;
        $this->municipality = $municipality;
        $this->kana_municipality = $kana_municipality;
        $this->town_area = $town_area;
        $this->office_name = $office_name;
        $this->kana_office_name = $kana_office_name;
        $this->office_address = $office_address;
        $this->information = $information;
    }

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
            print "処理は失敗しました。:" . $e->getMessage();
            print "<br>";
        }
    }

    public static function print_back() {
        print <<< BACK
<form method="form" action="$_SERVER[HTTP_REFERER]">
    <input type="submit" value="前のページへ戻る" style="margin-top: 10px" class="button">
</form>
BACK;
    }

    public static function print_back_list() {
        print <<< LIST
<form method="form" action="first_page.php">
    <input type="submit" value="一覧ページへ戻る" style="margin-top: 10px" class="button">
</form>
LIST;


    }
}
