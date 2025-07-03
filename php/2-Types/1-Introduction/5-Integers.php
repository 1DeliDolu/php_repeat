<?php
/*
Integer (int) Tipi
-----------------
Bir int, {..., -2, -1, 0, 1, 2, ...} kümesinden bir sayıdır.

Sayı Gösterimleri:
- Onluk (decimal): 1234
- Sekizlik (octal): 0123 veya 0o123 (PHP 8.1+)
- Onaltılık (hex): 0x1A
- İkilik (binary): 0b11111111
- Alt çizgi ile okunabilirlik: 1_234_567 (PHP 7.4+)

Örnekler:
*/
$a = 1234;      // ondalık
$a = 0123;      // sekizlik (83 ondalık)
$a = 0o123;     // sekizlik (PHP 8.1+)
$a = 0x1A;      // onaltılık (26 ondalık)
$a = 0b11111111; // ikilik (255 ondalık)
$a = 1_234_567; // okunabilir ondalık (PHP 7.4+)

/*
int boyutu platforma bağlıdır. 32-bit'te yaklaşık 2 milyar, 64-bit'te yaklaşık 9E18.
PHP_INT_SIZE, PHP_INT_MAX, PHP_INT_MIN sabitleriyle öğrenilebilir.

Taşma (overflow):
int sınırını aşan değerler float'a dönüşür.
*/
$large_number = 50000000000000000000;
var_dump($large_number); // float(5.0E+19)
var_dump(PHP_INT_MAX + 1); // float

/*
Bölme (integer division):
intdiv() fonksiyonu ile tam sayı bölme yapılır. / operatörü float döner.
*/
var_dump(25 / 7);         // float(3.5714285714286)
var_dump((int) (25 / 7)); // int(3)
var_dump(round(25 / 7));  // float(4)
var_dump(intdiv(25, 7)); // int(3)

/*
Dönüşümler:
- (int) veya (integer) ile açıkça dönüştürülebilir.
- intval() fonksiyonu da kullanılabilir.
- bool'dan: false -> 0, true -> 1
- float'tan: sıfıra yuvarlanır (truncation)
- string'ten: başı sayısal ise o değere, değilse 0'a
- null'dan: 0
*/
var_dump((int) "010");      // 10 (string, baştaki sıfır dikkate alınmaz)
var_dump(intval("010", 8)); // 8  (sekizlik olarak yorumlanır)
var_dump((int) "5txt");     // 5
var_dump((int) "before5");  // 0

/*
Uyarı:
- int'e dönüşümde beklenmedik sonuçlar olabilir, özellikle float ve büyük sayılarla.
- NaN, Inf, -Inf int'e dönüştürülünce 0 olur.
- PHP'de unsigned int yoktur.
- Minimum değeri hard-code yazmak yerine PHP_INT_MIN kullanın.
*/
