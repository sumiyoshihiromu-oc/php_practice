<?php
class Entree {
    public $name;
    public $ingredients = [];

    public function hasIngredient($ingredient) {
        return in_array($ingredient, $this->ingredients);
    }
    public static function getSizes(){
        return ["small", "medium", "large"];
    }
}

$soup = new Entree();
$soup->name = "Chicken Soup";
$soup->ingredients = ["chicken", "water"];

$sandwich = new Entree();
$sandwich->name = "Chicken Sandwich";
$sandwich->ingredients = ["chicken", "bread"];

foreach (["chicken", "lemon", "bread", "water"] as $ing) {
    if ($soup->hasIngredient($ing)) {
        print "Soup contains $ing";
        print "<br>";
    }
    if ($sandwich->hasIngredient($ing)) {
        print "Sandwich contains $ing";
        print "<br>";
    }
}

print implode(",", Entree::getSizes());
