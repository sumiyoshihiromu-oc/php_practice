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
<tr><td><input type="checkbox" name="delivery[]" value="$delivery" class="button">$delivery</td></tr>
BOX;
    }
}
