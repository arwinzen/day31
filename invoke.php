<?php

/* Invoke -> 15 students , each student -> 1 bag, each bag -> 3 colors, green, blue, black
   echo each name of the student which has a black bag (assume Hafiy, Amir, Fikri);        */

class Company {
    protected $name;

    public $members = [];

    public function __construct($name, $members = [])
    {
        $this->name = $name;
        $this->members = $members;
    }

    public function getName(){
        return $this->name;
    }
}

class Employee {
    public $member;
    public $bag;
    public static int $counter = 0;

    public function __construct($member, $bag)
    {
        $this->member = $member;
        $this->bag = $bag;
        self::$counter++;
    }

    public function getMember(){
        return $this->member;
    }

    public static function getEmployeeCount(){
        return self::$counter;
    }

}

class Bag {
    public $color;

    public function __construct($color)
    {
        $this->color = $color;
    }

    public function getColor(){
        return $this->color;
    }
}

$c1 = new Company('Invoke', [
    new Employee('Hafiy', new Bag('green')),
    new Employee('Amir', new Bag('blue')),
    new Employee('Fikri', new Bag('black')),
    new Employee('Asyraf', new Bag('green')),
    new Employee('Zhafri', new Bag('black'))
]);

echo '<pre>';
var_dump($c1);
echo '</pre>';

//$invoke = $c1->getName();
echo $c1->getName(). " " . 'has ' . Employee::getEmployeeCount() . ' employees'. '<br>';

$employees = $c1->members;
var_dump($employees);

foreach ($employees as $i => $employee){
//    var_dump($employee->bag->color);
    if ($employee->bag->color === 'black'){
        echo $employee->member . " has a " . $employee->bag->color . " bag.". '<br>';
    }
}