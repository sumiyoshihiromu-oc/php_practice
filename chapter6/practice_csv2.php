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

$lines = file("aichi_data.csv");

foreach ($lines as $line) {
    $data = explode(",", $line);

    $deliveryLocation = new DeliveryLocation($data[0], $data[1], $data[2], $data[3], $data[4], $data[5], $data[6], $data[7], $data[8], $data[11]);

    $array[] = $deliveryLocation;
}


foreach ($array as $value) {
    $value->print();
}

