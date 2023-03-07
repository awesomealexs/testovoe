<?php

function xdump($data)
{
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
}

function reverse(test $a): test
{
    $objectArray = [];
    $objectArray[] = $a;


    $nextObject = $a->next;

    while ($nextObject !== null) {
        $currentObject = $nextObject;
        $objectArray[] = $currentObject;
        $nextObject = $currentObject->next;
    }

    $objectArray = array_reverse($objectArray);

    foreach ($objectArray as $k => $value) {
        if (isset($objectArray[$k + 1])) {
            $value->next = $objectArray[$k + 1];
        } else {
            $value->next = null;
        }
    }

    return $objectArray[0];
}


class test
{
    public ?test  $next;

    private int $value;

    public function __construct($value)
    {
        $this->value = $value;
    }
}

$a = new test(1);
$b = new test(2);
$c = new test(3);
$a->next = $b;
$b->next = $c;
$c->next = null;


xdump($a);
$ob1 = reverse($a);
xdump($ob1);
