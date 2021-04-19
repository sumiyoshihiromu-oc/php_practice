<?php

class Ingredient {
    public function __construct($name, $cost) {
        $this->name = $name;
        $this->cost = $cost;
    }

    public function getName() {
        return $this->name;
    }

    public function getCost() {
        return $this->cost;
    }

    public function changeCost($cost) {
        $this->cost = $cost;
    }
}
