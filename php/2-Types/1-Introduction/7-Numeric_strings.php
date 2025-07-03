<?php
// For detailed explanations, see:
// D:/xampp/htdocs/php/readme/7-Numeric_strings.md

// Example #1 Scientific Notation Comparisons
var_dump("0D1" == "000"); // false, "0D1" is not scientific notation
var_dump("0E1" == "000"); // true, "0E1" is 0 * (10 ^ 1), or 0
var_dump("2E1" == "020"); // true, "2E1" is 2 * (10 ^ 1), or 20

// Numeric Strings in Arithmetic
$foo = 1 + "10.5";                // $foo is float (11.5)
$foo = 1 + "-1.3e3";              // $foo is float (-1299)
try {
    $foo = 1 + "bob-1.3e3";           // TypeError as of PHP 8.0.0, $foo is integer (1) previously
} catch (TypeError $e) {
    echo "TypeError: ".$e->getMessage().PHP_EOL;
}
try {
    $foo = 1 + "bob3";                // TypeError as of PHP 8.0.0, $foo is integer (1) previously
} catch (TypeError $e) {
    echo "TypeError: ".$e->getMessage().PHP_EOL;
}
try {
    $foo = 1 + "10 Small Pigs";       // $foo is integer (11) and an E_WARNING is raised in PHP 8.0.0, E_NOTICE previously
} catch (Throwable $e) {
    echo get_class($e).": ".$e->getMessage().PHP_EOL;
}
try {
    $foo = 4 + "10.2 Little Piggies"; // $foo is float (14.2) and an E_WARNING is raised in PHP 8.0.0, E_NOTICE previously
} catch (Throwable $e) {
    echo get_class($e).": ".$e->getMessage().PHP_EOL;
}
try {
    $foo = "10.0 pigs " + 1;          // $foo is float (11) and an E_WARNING is raised in PHP 8.0.0, E_NOTICE previously
} catch (Throwable $e) {
    echo get_class($e).": ".$e->getMessage().PHP_EOL;
}
try {
    $foo = "10.0 pigs " + 1.0;        // $foo is float (11) and an E_WARNING is raised in PHP 8.0.0, E_NOTICE previously
} catch (Throwable $e) {
    echo get_class($e).": ".$e->getMessage().PHP_EOL;
}

// Example: No Whitespaces
try {
    $foo = 4 + "10.2LittlePiggies";
} catch (Throwable $e) {
    echo get_class($e).": ".$e->getMessage().PHP_EOL;
}
