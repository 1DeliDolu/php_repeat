<?php
/*
String (Dize) Tipi
-----------------
Bir string, karakterlerden oluşan bir dizidir. PHP'de karakterler byte ile eşdeğerdir, yani yerel olarak Unicode desteği yoktur.

Gösterim Yöntemleri:
- Tek tırnak ('...')
- Çift tırnak ("...")
- Heredoc (<<<EOT ... EOT;)
- Nowdoc (<<<'EOT' ... EOT;)

// Tek tırnak örneği:
echo 'Bu bir string\n'; // \n özel anlam taşımaz
echo 'Tek tırnak içinde $degisken yazılır';
echo 'Tek tırnak içinde \' ve \\ kaçış karakterleri kullanılır';

// Çift tırnak örneği:
$ad = "Ahmet";
echo "Merhaba $ad\n"; // Değişkenler genişletilir, kaçış karakterleri çalışır

echo "Satır başı\nYeni satır";
echo "Tab\tkarakteri";
echo "Unicode: \u{41}"; // A

echo "Çift tırnak içinde \" ve \\ kaçış karakterleri kullanılır";

// Heredoc örneği:
echo <<<EOT
Çok satırlı
string örneği
EOT;

// Nowdoc örneği:
echo <<<'EOT'
Değişkenler $ad genişletilmez
EOT;

/*
Karakter erişimi ve değiştirme:
*/
$str = 'Test';
echo $str[0]; // 'T'
$str[1] = 'A'; // 'Tast'

/*
String birleştirme: . (nokta) operatörü ile yapılır.
*/
$a = "Merhaba";
$b = "Dünya";
echo $a . " " . $b;

/*
Dönüşümler:
- (string) veya strval() ile açıkça dönüştürülebilir.
- true -> "1", false -> ""
- int/float -> metin karşılığı
- null -> ""
- array -> "Array"
- object -> __toString() varsa, yoksa "Object"
- resource -> "Resource id #..."

Notlar:
- Çift tırnak ve heredoc ile değişken interpolasyonu yapılabilir.
- Karakterlere erişim [] ile yapılır, çok baytlı karakterler için mbstring fonksiyonları kullanılmalıdır.
- String fonksiyonları için bkz: https://www.php.net/manual/en/ref.strings.php
*/
