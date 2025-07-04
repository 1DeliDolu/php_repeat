<?php 
// Sayfa başlığı değişkeni tanımlanıyor
$title = "Ürünler";
// Ortak değişkenlerin bulunduğu dosya dahil ediliyor
require 'partials/_variables.php';
// Sayfanın üst kısmı (header) dahil ediliyor
include 'partials/_header.php';
?>

<main>
    <h1>Ürün listesi</h1>
    <?php 
    // Ürünlerin listelendiği dosya dahil ediliyor
    include 'partials/_urunler.php';
    ?>
    <nav>
        <a href="">1</a>
        <a href="">2</a>
        <a href="">3</a>
    </nav>
</main>

<?php 
// Sayfanın alt kısmı (footer) dahil ediliyor
include 'partials/_footer.php';
?></nav>