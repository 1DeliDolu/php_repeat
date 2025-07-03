<?php
/*
PHP'de Yorum Satırları (Comments)
---------------------------------
PHP, 'C' (/* ... * /), 'C++' (// ...) ve Unix shell tarzı (# ...) yorumları destekler.

// Tek satırlık C++ tarzı yorum
# Tek satırlık shell tarzı yorum
/*
Bu birden fazla satırlık yorumdur
ve burada devam eder
*/

// Örnek 1: Yorum Satırları

echo "This is a test\n"; // Bu bir satırlık C++ tarzı yorumdur
echo "This is yet another test\n";
echo "One Final Test\n"; # Bu bir satırlık shell tarzı yorumdur

/*
Tek satırlık yorumlar sadece satır sonuna kadar veya PHP kod bloğunun sonuna kadar geçerlidir. Yani, // ... ?> veya # ... ?> sonrası HTML kodu ekrana basılır.
*/
?>
<h1>This is an <?php # echo 'simple';?> example</h1>
<p>The header above will say 'This is an  example'.</p>
<?php
/*
C tarzı yorumlar (/ * ... * /) ilk * / işaretinde biter, iç içe kullanılamaz. Büyük blokları yorumlarken dikkatli olun.

// Hatalı iç içe yorum örneği:
// /* echo 'test'; // iç içe yorum */

// PHPDoc tarzı /** ... */ ile otomatik dokümantasyon üretilebilir.
/**
 * Bu bir PHPDoc yorum bloğudur.
 * Otomatik dokümantasyon için kullanılır.
 */
 
// Not: PHP 8 ve sonrası için # ile başlayan yorumlarda #[ ile başlamamaya dikkat edin, çünkü bu "attribute" olarak algılanır.
