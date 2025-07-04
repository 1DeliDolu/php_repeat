<?php 
// Sayfa başlığı değişkeni tanımlanıyor
$title="anasayfa"
?>

<?php 
// Ortak değişkenlerin bulunduğu dosya dahil ediliyor
require 'partials/_variables.php'
?>

<?php 
// Sayfanın üst kısmı (header) dahil ediliyor
include 'partials/_header.php' 
?>

<main>
    <h1>En çok satan ürünler</h1>
    <?php 
    // Ürünlerin listelendiği dosya dahil ediliyor
    include 'partials/_urunler.php' 
    ?>
</main>

<?php 
// Sayfanın alt kısmı (footer) dahil ediliyor
include 'partials/_footer.php' 
?>