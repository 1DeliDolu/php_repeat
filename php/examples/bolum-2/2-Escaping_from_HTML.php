<?php
$expression = true; // veya false olarak değiştirilebilir
$highlight = true; // veya false olarak değiştirilebilir
/*
PHP'de HTML'den Kaçış (Escaping from HTML)
-----------------------------------------
PHP dosyalarında, açılış ve kapanış etiketleri dışında kalan her şey PHP yorumlayıcısı tarafından yok sayılır ve doğrudan tarayıcıya gönderilir. Bu sayede PHP kodu HTML içine gömülebilir ve şablonlar oluşturulabilir.

Örnek 1: HTML içinde PHP kullanımı
*/
?>
<p>Bu satır PHP tarafından yok sayılır ve tarayıcıda görüntülenir.</p>
<?php echo 'Bu satır ise PHP tarafından işlenir.'; ?>
<p>Bu satır da PHP tarafından yok sayılır ve tarayıcıda görüntülenir.</p>
<?php
/*
PHP yorumlayıcısı ?> kapanış etiketini gördüğünde, bir sonraki <?php açılış etiketine kadar olan her şeyi çıktı olarak gönderir.

Koşullu yapılarla gelişmiş kaçış:
*/
?>
<?php if ($expression == true): ?>
    Bu ifade doğruysa bu satır gösterilir.
<?php else: ?>
    Aksi halde bu satır gösterilir.
<?php endif; ?>
<?php
/*
Bu yöntemde, koşul sağlanmazsa ilgili blok atlanır. Büyük metin bloklarını ekrana basmak için PHP modundan çıkmak, echo ile yazmaktan daha verimlidir.

Not: XML veya XHTML içinde PHP gömülüyorsa, standart <?php ?> etiketleri kullanılmalıdır.

Ekstra örnek: HTML etiketinin ortasında PHP
*/
?>
<html>

<body>
    <p<?php if ($highlight): ?> class="highlight" <?php endif; ?>>Bu bir paragraf.</p>
</body>

</html>
<?php
/*
Eğer $highlight true ise: <p class="highlight">Bu bir paragraf.</p>
Değilse: <p>Bu bir paragraf.</p>

Dikkat: ?> etiketi, // yorum satırı içinde bile PHP'den çıkış yapar. /* \ * / ile yorumlamak daha güvenlidir.

Döngü ile örnek:
*/
?>
<?php for ($i = 0; $i < 5; ++$i): ?>
    Merhaba!
<?php endfor; ?>
<?php
/*
Çıktı:
Merhaba!
Merhaba!
Merhaba!
Merhaba!
Merhaba!
*/
