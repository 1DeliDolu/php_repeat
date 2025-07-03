<?php
// Example #1 A simple array
$array1 = array(
    "foo" => "bar",
    "bar" => "foo",
);
// Using the short array syntax
$array2 = [
    "foo" => "bar",
    "bar" => "foo",
];
var_dump($array1, $array2);

// Example #2 Type Casting and Overwriting example
$array = array(
    1    => "a",
    "1"  => "b",
    1.5  => "c",
    true => "d",
);
var_dump($array);

// Example #3 Mixed int and string keys
$array = array(
    "foo" => "bar",
    "bar" => "foo",
    100   => -100,
    -100  => 100,
);
var_dump($array);

// Example #4 Indexed arrays without key
$array = array("foo", "bar", "hello", "world");
var_dump($array);

// Example #5 Keys not on all elements
$array = array(
         "a",
         "b",
    6 => "c",
         "d",
);
var_dump($array);

// Example #6 Complex Type Casting and Overwriting example
$array = array(
    1    => 'a',
    '1'  => 'b',
    1.5  => 'c',
    -1 => 'd',
    '01'  => 'e',
    '1.5' => 'f',
    true => 'g',
    false => 'h',
    '' => 'i',
    null => 'j',
    'k',
    2 => 'l',
);
var_dump($array);

// Example #7 Negative index example
$array = [];
$array[-5] = 1;
$array[] = 2;
var_dump($array);

// Example #8 Accessing array elements
$array = array(
    "foo" => "bar",
    42    => 24,
    "multi" => array(
         "dimensional" => array(
             "array" => "foo"
         )
    )
);
var_dump($array["foo"]);
var_dump($array[42]);
var_dump($array["multi"]["dimensional"]["array"]);

// Example #9 Array dereferencing
function getArray() {
    return array(1, 2, 3);
}
$secondElement = getArray()[1];
var_dump($secondElement);

// Example #10 Using Square Brackets with Arrays
$arr = array(5 => 1, 12 => 2);
$arr[] = 56;
$arr["x"] = 42;
unset($arr[5]);
var_dump($arr);
unset($arr);
if (isset($arr)) {
    var_dump($arr);
} else {
    echo "\$arr is not set", PHP_EOL;
}

// Example #11 Array Destructuring
$source_array = ['foo', 'bar', 'baz'];
[$foo, $bar, $baz] = $source_array;
echo $foo, PHP_EOL;
echo $bar, PHP_EOL;
echo $baz, PHP_EOL;

// Example #12 Array Destructuring in Foreach
$source_array = [
    [1, 'John'],
    [2, 'Jane'],
];
foreach ($source_array as [$id, $name]) {
    echo "{$id}: '{$name}'\n";
}

// Example #13 Ignoring Elements
$source_array = ['foo', 'bar', 'baz'];
[, , $baz] = $source_array;
echo $baz;

// Example #14 Destructuring Associative Arrays
$source_array = ['foo' => 1, 'bar' => 2, 'baz' => 3];
['baz' => $three] = $source_array;
echo $three, PHP_EOL;
$source_array = ['foo', 'bar', 'baz'];
[2 => $baz] = $source_array;
echo $baz, PHP_EOL;

// Example #15 Swapping Two Variable
$a = 1;
$b = 2;
[$b, $a] = [$a, $b];
echo $a, PHP_EOL;
echo $b, PHP_EOL;

// Example #16 Unsetting Intermediate Elements
$a = array(1 => 'one', 2 => 'two', 3 => 'three');
unset($a[2]);
var_dump($a);
$b = array_values($a);
var_dump($b);

// Example #17 Key Quoting
error_reporting(E_ALL);
ini_set('display_errors', true);
ini_set('html_errors', false);
$array = array(1, 2);
$count = count($array);
for ($i = 0; $i < $count; $i++) {
    echo "\nChecking $i: \n";
    echo "Bad: " . $array['$i'] . "\n";
    echo "Good: " . $array[$i] . "\n";
    echo "Bad: {$array['$i']}\n";
    echo "Good: {$array[$i]}\n";
}

// Example #18 More Examples
error_reporting(E_ALL);
$arr = array('fruit' => 'apple', 'veggie' => 'carrot');
echo $arr['fruit'], PHP_EOL;
echo $arr['veggie'], PHP_EOL;
try {
    echo $arr[fruit];
} catch (Error $e) {
    echo get_class($e), ': ', $e->getMessage(), PHP_EOL;
}
define('fruit', 'veggie');
echo $arr['fruit'], PHP_EOL;
echo $arr[fruit], PHP_EOL;
echo "Hello $arr[fruit]", PHP_EOL;
echo "Hello {$arr[fruit]}", PHP_EOL;
echo "Hello {$arr['fruit']}", PHP_EOL;
echo "Hello " . $arr['fruit'], PHP_EOL;

// Example #19 Converting to an Array
class A {
    private $B;
    protected $C;
    public $D;
    function __construct() { $this->{1} = null; }
}
var_export((array) new A());

// Example #20 Casting an Object to an Array
class AA { private $A; }
class B extends AA { private $A; public $AA; }
var_dump((array) new B());

// Example #21 Simple array unpacking
$arr1 = [1, 2, 3];
$arr2 = [...$arr1];
$arr3 = [0, ...$arr1];
$arr4 = [...$arr1, ...$arr2, 111];
$arr5 = [...$arr1, ...$arr1];
function getArr() { return ['a', 'b']; }
$arr6 = [...getArr(), 'c' => 'd'];
var_dump($arr1, $arr2, $arr3, $arr4, $arr5, $arr6);

// Example #22 Array unpacking with duplicate key
$arr1 = ["a" => 1];
$arr2 = ["a" => 2];
$arr3 = ["a" => 0, ...$arr1, ...$arr2];
var_dump($arr3);
$arr4 = [1, 2, 3];
$arr5 = [4, 5, 6];
$arr6 = [...$arr4, ...$arr5];
var_dump($arr6);

// Example #23 Array Versatility
$a = array( 'color' => 'red', 'taste' => 'sweet', 'shape' => 'round', 'name'  => 'apple', 4 );
$b = array('a', 'b', 'c');
var_dump($a, $b);
$a = array();
$a['color'] = 'red';
$a['taste'] = 'sweet';
$a['shape'] = 'round';
$a['name']  = 'apple';
$a[]        = 4;
$b = array();
$b[] = 'a';
$b[] = 'b';
$b[] = 'c';
var_dump($a, $b);

// Example #24 Using array()
$map = array( 'version' => 4, 'OS' => 'Linux', 'lang' => 'english', 'short_tags' => true );
var_dump($map);
$array = array( 7, 8, 0, 156, -10 );
var_dump($array);
$switching = array( 10, 5 => 6, 3 => 7, 'a' => 4, 11, '8' => 2, '02' => 77, 0 => 12 );
var_dump($switching);
$empty = array();
var_dump($empty);

// Example #25 Collection
$colors = array('red', 'blue', 'green', 'yellow');
foreach ($colors as $color) {
    echo "Do you like $color?\n";
}

// Example #26 Changing element in the loop
$colors = array('red', 'blue', 'green', 'yellow');
foreach ($colors as &$color) {
    $color = mb_strtoupper($color);
}
unset($color);
print_r($colors);

// Example #27 One-based index
$firstquarter = array(1 => 'January', 'February', 'March');
print_r($firstquarter);

// Example #28 Filling an array
$handle = opendir('.');
while (false !== ($file = readdir($handle))) {
    $files[] = $file;
}
closedir($handle);
var_dump($files);

// Example #29 Sorting an array
sort($files);
print_r($files);

// Example #30 Recursive and multi-dimensional arrays
$fruits = array (
    "fruits"  => array ( "a" => "orange", "b" => "banana", "c" => "apple" ),
    "numbers" => array ( 1, 2, 3, 4, 5, 6 ),
    "holes"   => array ( "first", 5 => "second", "third" )
);
var_dump($fruits);
echo $fruits["holes"][5];
echo $fruits["fruits"]["a"];
unset($fruits["holes"][0]);
$juices["apple"]["green"] = "good";
var_dump($juices);

// Example #31 Array Copying
$arr1 = array(2, 3);
$arr2 = $arr1;
$arr2[] = 4;
$arr3 = &$arr1;
$arr3[] = 4;
var_dump($arr1, $arr2, $arr3);
