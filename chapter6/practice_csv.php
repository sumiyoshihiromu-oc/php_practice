<?php

class DeliveryLocation
{
    public $file_name;

    public function __construct($file_name) {
        $this->file_name = $file_name;
    }

    function print() {
        $lines = file($this->file_name);

        foreach ($lines as $line) {
            $data = explode(",", $line);

            print "郵便番号：" . $data[0];
            print "、都道府県：" . $data[1];
            print "、都道府県カナ：" . $data[2];
            print "、市区町村：" . $data[3];
            print "、市区町村カナ" . $data[4];
            print "、町域：" . $data[5];
            print "、事業所名：" . $data[6];
            print "、事業所名カナ：" . $data[7];
            print "、事業所住所：" . $data[8];
            print "、情報：info" . $data[11];
            print "<br>";
            print "<br>";
        }
    }
}

$aichi = new DeliveryLocation("aichi_data.csv");
$aichi->print();




