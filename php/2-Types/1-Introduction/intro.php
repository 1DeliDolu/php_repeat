<?php
// PHP'de Temel Türler

// Her bir ifade PHP'de aşağıdaki yerleşik türlerden birine sahiptir:
// null, bool, int, float, string, array, object, callable, resource

// PHP dinamik olarak tür belirler, yani değişkenin türünü belirtmeye gerek yoktur.
// Ancak, tip bildirimleriyle bazı durumlarda statik olarak tür belirtilebilir.

// Türler, üzerinde yapılabilecek işlemleri sınırlar. 
// Uygun olmayan bir işlemde PHP, değeri uygun türe dönüştürmeye çalışır (type juggling).

// Bir ifadenin değerini ve türünü kontrol etmek için var_dump() fonksiyonu kullanılır.
// Türünü almak için get_debug_type(), belirli bir türde olup olmadığını kontrol etmek için is_type fonksiyonları kullanılır.

$a_bool = true;   // bir bool
$a_str  = "foo";  // bir string
$a_str2 = 'foo';  // bir string
$an_int = 12;     // bir int

echo get_debug_type($a_bool), "\n"; // bool
echo get_debug_type($a_str), "\n";  // string

// Eğer bu bir tamsayıysa, dört ekle
if (is_int($an_int)) {
    $an_int += 4;
}
var_dump($an_int); // int(16)

// Eğer $a_bool bir string ise, yazdır
if (is_string($a_bool)) {
    echo "String: $a_bool";
}

// Not: PHP 8.0.0'dan önce get_debug_type() yoksa, gettype() kullanılabilir.
?>