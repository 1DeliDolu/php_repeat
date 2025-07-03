<?php
/*
Floating Point Numbers (float, double, real)
--------------------------------------------
PHP'de ondalıklı sayılar float, double veya real olarak adlandırılır.

Gösterim:
- $a = 1.234;
- $b = 1.2e3;   // 1200
- $c = 7E-10;   // 0.0000000007
- $d = 1_234.567; // (PHP 7.4+)

float boyutu platforma bağlıdır, genellikle 64 bit IEEE 754 standardı kullanılır (~1.8e308, yaklaşık 14 basamak hassasiyet).

Dikkat: Floating point precision
- Ondalıklı sayılar sınırlı hassasiyete sahiptir.
- 0.1 veya 0.7 gibi bazı ondalıklı sayılar ikilik tabanda tam olarak gösterilemez.
- Sonuçlar beklenmedik olabilir: floor((0.1+0.7)*10) genellikle 7 döner, çünkü içsel gösterim 7.99999... olur.
- Son basamağa güvenmeyin, doğrudan eşitlik karşılaştırması yapmayın.
- Yüksek hassasiyet gerekirse BCMath veya GMP fonksiyonlarını kullanın.
*/

$a = 1.23456789;
$b = 1.23456780;
$epsilon = 0.00001;
if (abs($a - $b) < $epsilon) {
    echo "true";
}

/*
NaN (Not a Number):
- Bazı işlemler sonucunda NAN sabiti dönebilir.
- NAN, kendisiyle bile eşit değildir. is_nan() ile kontrol edilir.
*/

// Dönüşümler:
// String'ten: başı sayısal ise float'a, değilse 0'a
// Diğer tipler önce int'e, sonra float'a çevrilir

var_dump((float) "1.23"); // float(1.23)
var_dump((float) "abc");  // float(0)

/*
Karşılaştırma için örnek:
*/
$x = 8 - 6.4;  // 1.6
$y = 1.6;
var_dump($x == $y); // false
var_dump(round($x, 2) == round($y, 2)); // true

/*
Notlar:
- Parasal işlemlerde mümkünse tam sayı (kuruş/cents) kullanın.
- float değerleri string içinde kullanırken locale ayarlarına dikkat edin (ör. 0.23 Almanca'da 0,23 olabilir).
*/
