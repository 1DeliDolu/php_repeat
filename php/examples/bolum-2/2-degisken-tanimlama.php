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

?>
