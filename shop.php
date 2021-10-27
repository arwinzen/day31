<?php
// Q7
/* Kevin goes to the shop, kevin can choose 3 items from the shop.
   Fikri goes to the shop, Fikri choose 3 more items in the shop.
   Write a class that can handle this scenario using constructor. */

class Shop {
    // shop has name, catalogue and patrons as it's properties
    // catalogue and patrons are arrays
    public $name;
    public $catalogue = [];
    public $patrons = [];

    public function __construct(string $name, $catalogue = [], $patrons = [])
    {
        $this->name = $name;
        $this->catalogue = $catalogue;
        $this->patrons = $patrons;
    }
}

class Catalogue {
    public $items = [];

    public function __construct($items = [])
    {
        $this->items = $items;
    }

    // restock takes an umlimited number of parameters
    // which is then pushed to the catalogue ($this->items) array
    // restock returns the new list of items once it completes
    public function restock(...$supplies)
    {
        foreach($supplies as $supply)
        {
            array_push($this->items, $supply);
        }
        return $this->items;
    }
}

class Person {
    public $name;
    public $purchased = [];

    // Person class has $name and $purchased as it's properties
    // $purchased is initialised as an empty array
    public function __construct($name, $purchased = [])
    {
        $this->name = $name;
        $this->purchased = $purchased;
    }

    // the shops function takes an array as it's parameter
    // the shop's catalogue should be passed as an argument
    // shops() returns the list of purchased items for the person once it completes
    public function shops($items)
    {
        foreach($items as $k => $item){
            // insert 3 random items from the catalogue into the $this->purchased array
            if ($k < 3)
            {
                array_push($this->purchased, $items[rand(0, sizeof($items) - 1)]);
            }
        }
        return $this->purchased;
    }
}

// create an instance of shop with a catalogue of 8 items, and patrons 'Kevin' and 'Arjun'
$shop1 = new Shop('Speedmart', new Catalogue([
    'Iced Americano',
    'Vanilla Latte',
    'Hot Cappuccino',
    'Milo',
    'Salted Caramel Latte',
    'Yogurt'
]), [
    new Person('Kevin'),
    new Person('Arjun')
]);

$kevin = $shop1->patrons[0];
$arjun = $shop1->patrons[1];

// call the shops function for both patrons
$kevin->shops($shop1->catalogue->items);
$arjun->shops($shop1->catalogue->items);

// print out the purchased items for each patron
foreach ($shop1->patrons as $patron){
    echo "$patron->name bought ";
    foreach($patron->purchased as $k => $purchase){
        if ($k !== sizeof($patron->purchased) -1)
        {
            echo $purchase . ', ';
        }
        else
        {
            echo $purchase . '.';
        }
    }
    echo '<br>';
}

// Q8
/* Follow on from scenario #7, Arjun wants 3 more items from the shop,
   the shopkeeper send errand boy to gather more items from their HQ.
   Write class files that can represent this scenario.                  */

echo " $arjun->name wanted to buy some fruits, so the errand boy at $shop1->name went to restock.". '<br>';

// call the restock function
$shop1->catalogue->restock('Apples', 'Bananas', 'Oranges', 'Mangoes', 'Figs',
                           'Raspberries', 'Coconuts', 'Lychees', 'Blueberries');

// arjun buys more stuff
echo "$arjun->name then bought more items after the restock ".'<br>';
$arjun->shops($shop1->catalogue->items);

// print out total items for Arjun
echo "In total, Arjun purchased : ";
foreach($shop1->patrons[1]->purchased as $k => $purchase){
    if ($k !== sizeof($shop1->patrons[1]->purchased) - 1){
        echo $purchase . ', ';
    }
    else
    {
        echo $purchase . '.';
    }
}