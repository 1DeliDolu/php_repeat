# PHP Değişkenler ve Temel Konular

## 1. Değişken Nedir?

- Değişkenler, verileri saklamak için kullanılır.

- Tanımlama: `$degiskenAdi = deger;`
```
- Örnek:

  ```php
  $maasAli = 21000;
  $vergiOrani1 = 0.25;
  echo $maasAli - ($maasAli * $vergiOrani1);
  ```

## 2. Değişken Tanımlama Kuralları
- Değişken isimleri harf veya _ ile başlamalıdır, rakam ile başlayamaz.
- Boşluk ve Türkçe karakter kullanılmaz.
- Büyük/küçük harf duyarlıdır.
- Örnek:
  ```php
  $ad = "Sadık";
  $soyad = "Turan";
  $Sayi1 = 60;
  ```

## 3. Veri Tipleri
- string, int, double, boolean, object, array, null
- Tip dönüşümleri yapılabilir.
- Örnek:
  ```php
  $urunAdi = "Iphone 15";
  $fiyat = 40000;
  $kdvOrani = 0.18;
  $satistaMi = false;
  $a = (int)"20a50"; // 20
  ```

## 4. String İşlemleri
- Birleştirme: `.` veya çift tırnak içinde değişken kullanımı
- Fonksiyonlar: strlen, str_word_count, strtolower, strtoupper, ucfirst, str_replace
- Örnek:
  ```php
  $ad = "çınar";
  $mesaj = "my name is $ad";
  echo strlen($mesaj);
  echo str_replace(["çınar"],["sadık"],$mesaj);
  ```

## 5. Sayısal İşlemler
- Temel işlemler: +, -, *, /
- Fonksiyonlar: abs, ceil, floor, round, sqrt, pow, max, min
- Tip kontrol: is_int, is_float, is_numeric
- Örnek:
  ```php
  $sayi1 = 5;
  $sayi2 = 3;
  echo $sayi1 + $sayi2;
  echo abs(-10);
  echo pow(5,2);
  ```

## 6. Diziler (Arrays)
- Numeric Arrays: Sıralı diziler
  ```php
  $renkler = array("Kırmızı","Mavi","Sarı");
  echo $renkler[0];
  ```
- Associative Arrays: Anahtar-değer dizileri
  ```php
  $plaka_bilgileri = array("41" => "kocaeli", "53" => "rize");
  echo $plaka_bilgileri["41"];
  ```
- Çok Boyutlu Diziler:
  ```php
  $sinif = array(
    "100" => array(
      "ad" => "Mehmet",
      "notlar" => array("matematik" => array(50,70,80))
    )
  );
  echo $sinif["100"]["notlar"]["matematik"][0];
  ```

## 7. Sabitler (Constants)
- Değeri değiştirilemez.
- Tanımlama: `const` veya `define()`
  ```php
  const baglanti = "mysql bağlantı cümlesi";
  echo baglanti;
  ```

## 8. Dizi Fonksiyonları
- Eleman ekleme: array_push, array_unshift
- Eleman silme: array_pop, array_shift
- Sıralama: sort, rsort, asort, arsort, ksort, krsort
- Dönüştürme: explode (string→array), implode (array→string)
- Diğer: array_flip, array_count_values, array_rand
- Örnek:
  ```php
  $notlar = array(60,70,40);
  array_push($notlar, 100);
  sort($notlar);
  $arr = explode(",", "kocaeli,41");
  $str = implode(",", $arr);
  ```
