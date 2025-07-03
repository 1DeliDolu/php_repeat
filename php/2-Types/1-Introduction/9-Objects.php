<?php
// Örnek #1 Nesne Oluşturma
class foo {
    function do_foo() {
        echo "Doing foo.";
    }
}
$bar = new foo;
$bar->do_foo();

// Örnek #2 Nesneye Dönüştürme
$obj = (object) array('1' => 'foo');
var_dump(isset($obj->{'1'})); // çıktısı: bool(true)
// PHP 8.1 ile kullanımı önerilmez
var_dump(key($obj)); // çıktısı: string(1) "1"

// Örnek #3 (object) ile dönüştürme
$obj = (object) 'ciao';
echo $obj->scalar;  // çıktısı: ciao
