<?php
// Örnek: Tip Dönüşümü
$var = "5";
$var2 = $var + 10; // $var2 = 15, $var string iken int'e dönüştü
var_dump($var2);
$var = 3.14;
$var2 = $var + 2; // $var2 = 5.14, float + int = float
var_dump($var2);
$var = "abc";
try {
    $var2 = $var + 1; // TypeError (PHP 8+)
} catch (TypeError $e) {
    echo "TypeError: ".$e->getMessage().PHP_EOL;
}

// Örnek: Type Casting
$foo = 10;          // $foo int
$bar = (bool) $foo; // $bar bool
var_dump($bar);

// Örnek: Farklı Dönüşüm Mekanizmaları
$foo = 10;
$str = "$foo";
$fst = (string) $foo;
if ($fst === $str) {
    echo "aynılar", PHP_EOL;
}

// Örnek: String üzerinde dizi erişimi
$a = 'car';
$a[0] = 'b';
echo $a; // bar
