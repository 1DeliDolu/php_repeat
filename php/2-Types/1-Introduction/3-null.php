<?php
/*
NULL Tipi (null type)
--------------------
PHP'de null tipi birim (unit) tiptir ve yalnızca bir değeri vardır: null.
Tanımsız (undefined) veya unset() yapılmış değişkenler null değerine sahip olur.

Sözdizimi:
Yalnızca bir null değeri vardır ve bu, büyük/küçük harf duyarsız null sabitidir.
*/

$var = NULL; // veya $var = null;

/*
Null'a dönüştürme (casting to null):
- (unset) $var ile null'a dönüştürme PHP 7.2.0'dan itibaren kullanımdan kaldırıldı, PHP 8.0.0'da tamamen kaldırıldı.
- (unset) ile değişken silinmez, sadece null döner.

Kontrol fonksiyonları:
- is_null($var): Değişken null ise true döner.
- unset($var): Değişkeni tamamen siler.

Not:
Boş dizi (array()) ile null, gevşek karşılaştırmada (==) eşittir, ancak sıkı karşılaştırmada (===) eşit değildir.
Örnek:
*/

$a = array();
var_dump($a == null);   // true
var_dump($a === null);  // false
var_dump(is_null($a));  // false

/*
Açıklama:
NULL, bir değerin yokluğunu belirtir. Bir değişkenin NULL olması, o değişkenin değeri olmadığını gösterir.
*/
