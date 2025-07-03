<?php
/*
PHP Açılış ve Kapanış Etiketleri
PHP kodu <?php ve ?> etiketleri arasında yazılır. Bu etiketler dışında kalan içerik PHP tarafından işlenmez.
<?php etiketinden sonra bir boşluk, tab veya satır başı karakteri gelmelidir. Aksi halde sözdizimi hatası oluşur.

Kısa echo etiketi <?= ... ?>, <?php echo ... ?> ile aynıdır.

Örnek 1: PHP Açılış ve Kapanış Etiketleri
<?php echo 'Eğer PHP kodunu XHTML veya XML belgelerinde sunmak istiyorsanız bu etiketleri kullanın'; ?>

Kısa echo etiketi ile:
<?= 'bu metni yazdır' ?>
Aynı şeyin uzun hali:
<?php echo 'bu metni yazdır' ?>

Kısa etiketler (<? ... ?>) sadece short_open_tag ayarı açıksa çalışır. Bu nedenle uyumluluk için standart etiketler önerilir.

Not: Dosya PHP kodu ile bitiyorsa, dosyanın sonunda PHP kapanış etiketi (?>) bırakmamak önerilir. Böylece istemeden boşluk veya satır eklenmesinin önüne geçilir.
*/

// Örnek 2: Sadece PHP Kodu Olan Dosya

echo "Hello world\n";
// ... daha fazla kod

echo "Son satır\n";
// Script burada PHP kapanış etiketi olmadan biter


?>
