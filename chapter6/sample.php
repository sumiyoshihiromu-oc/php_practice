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

    public function print() {
        print "郵便番号：" . $this->zip_code . "、都道府県：" . $this->prefectures . "、都道府県カナ：" . $this->kana_prefectures . "、市区町村：" . $this->municipality . "、市区町村カナ" . $this->kana_municipality . "、町域：" . $this->town_area . "、事業所名：" . $this->office_name . "、事業所名カナ：" . $this->kana_office_name . "、事業所住所：". $this->office_address . "、情報：" . $this->information;
        print "<br>";
        print "<br>";
    }
}

$agriculture = new DeliveryLocation("498-8502", "愛知県", "アイチケン", "弥富市", "ヤトミシ", "前ケ須町", "愛知県厚生農業協同組合連合会　海南病院", "アイチケンコウセイノウギヨウキヨウドウクミアイレンゴウカイ　カイナンビヨウイン", "前ケ須町南本田３９６", "info1");

$police_station = new DeliveryLocation("465-8558", "愛知県", "アイチケン", "名古屋市名東区", "ナゴヤシメイトウク", "猪高台", "愛知県　名東警察署", "アイチケン　メイトウケイサツシヨ", "猪高台２丁目１００９", "info2");

$high_school = new DeliveryLocation("465-8507", "愛知県", "アイチケン", "名古屋市名東区", "ナゴヤシメイトウク", "社台", "愛知県立　千種高等学校", "アイチケンリツ　チグサコウトウガツコウ", "社台２丁目２０６", "info3");

$university = new DeliveryLocation("465-8515", "愛知県", "アイチケン", "名古屋市名東区", "ナゴヤシメイトウク", "平和が丘", "愛知東邦大学", "アイチトウホウダイガク", "平和が丘３丁目１１番地", "info4");

$array = [$agriculture, $police_station, $high_school, $university];
foreach ($array as $value) {
    $value->print();
}
