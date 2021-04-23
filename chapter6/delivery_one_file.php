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
        $delivery = "<td>$this->office_name</td><td>$this->zip_code</td><td>$this->office_address</td><td>$this->kana_office_name</td>";
        print <<< BOX
<tr><td><input type="checkbox" name="delivery[]" value="$delivery">$delivery</td></tr>
BOX;
    }

}

if ($_SERVER['REQUEST_METHOD']  == 'POST') {

//    var_dump($deliveries);

    if (isset($_POST["delivery"])) {
        $deliveries = $_POST["delivery"];
        print "<b>配送先</b>";

        print <<< RESULT
<table border="1" style="border-collapse: collapse">
<tr><th>名前</th><th>郵便番号</th><th>住所</th><th>名前（カナ）</th></tr>
RESULT;

        foreach ($deliveries as $delivery) {
            print "<tr>$delivery</tr>";
        }

        print "</table>";


    } else {
        print "<b>※配送先を選んでください</b>";
    }

    print <<< BACK
<form method="form" action="$_SERVER[HTTP_REFERER]">
<input type="submit" value="前のページへ戻る" style="margin-top: 10px">
</form>
BACK;


} else {
    $lines = file("aichi_data.csv");

    foreach ($lines as $line) {
        $data = explode(",", $line);

        $deliveryLocation = new DeliveryLocation($data[0], $data[1], $data[2], $data[3], $data[4], $data[5], $data[6], $data[7], $data[8], $data[11]);

        $array[] = $deliveryLocation;
    }

    print "<b>配送先一覧</b>";

    print <<< TABLE
<form method="post" action="$_SERVER[PHP_SELF]">
<table border="1" style="border-collapse: collapse">
<tr><th></th><th>名前</th><th>郵便番号</th><th>住所</th><th>名前（カナ）</th></tr>
TABLE;

    $i = 0;
    foreach ($array as $value) {
        if ($i > 19) {
            break;
        }
        $value->print();
        $i++;
    }

    print <<< FORM
</table>
<input type="submit" value="送信する" style="margin-top: 10px">
</form>
FORM;
}


