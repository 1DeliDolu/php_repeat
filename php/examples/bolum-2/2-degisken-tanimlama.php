<?php

    // Değişken isimleri harf veya alt çizgi (_) ile başlamalıdır.
    $ad = "Mustafa"; // Geçerli
    $soyad = "Özdemir"; // Geçerli

    // Değişken isimlerinde boşluk karakteri kullanılmaz.
    // $sayi 1 = 60; // Yanlış: Boşluk içeremez

    // Değişken isimleri rakam ile başlayamaz.
    // $1sayi = 50; // Yanlış: Rakam ile başlayamaz

    // Değişken isimlerinde Türkçe karakter kullanmayınız.
    // $şifre = "1234"; // Yanlış: Türkçe karakter içeriyor

    // Değişken isimlerinde büyük/küçük harf duyarlılığı vardır.
    $sayi1 = 50;
    $sayi2 = 100;
    $Sayi1 = 60; // $sayi1 ve $Sayi1 farklı değişkenlerdir

    echo $ad . ' ' . $soyad; // Sadık Turan
    echo "<br>";
    echo $sayi1 . ' ' . $sayi2; // 50 100

// --- PHP Değişken Kapsamı (Scope) ---
// Global ve Local Scope
$x = 5; // global scope

function testGlobal()
{
    global $x;
    // $x fonksiyon içinde doğrudan kullanılamaz
    echo "<p>Fonksiyon içinde x: $x</p>";
}
testGlobal();
echo "<p>Fonksiyon dışında x: $x</p>";

function testLocal()
{
    $y = 10; // local scope
    echo "<p>Fonksiyon içinde y: $y</p>";
}
testLocal();
echo "<p>Fonksiyon dışında y: $y</p>"; // Hata verir

// global anahtar kelimesi ile global değişkenlere fonksiyon içinde erişim
$a = 5;
$b = 10;
function topla()
{
    global $a, $b;
    $b = $a + $b;
}
topla();
echo $b; // 15

// $GLOBALS dizisi ile global değişkenlere erişim
$m = 5;
$n = 10;
function topla2()
{
    $GLOBALS['n'] = $GLOBALS['m'] + $GLOBALS['n'];
}
topla2();
echo $n; // 15

// static anahtar kelimesi ile fonksiyon çağrıldıkça değeri koruyan değişken
function sayac()
{
    static $sayi = 0;
    echo $sayi;
    $sayi++;
}
sayac(); // 0
sayac(); // 1
sayac(); // 2

?>
