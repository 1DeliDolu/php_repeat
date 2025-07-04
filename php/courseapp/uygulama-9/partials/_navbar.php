<?php

    /**
     * 'q' GET parametresi ile sağlanan arama anahtar kelimesine göre $kurslar dizisini filtreler.
     *
     * Eğer 'q' parametresi boş değilse, bu kod anahtar kelimeyi $kurslar dizisindeki her bir kursun
     * 'baslik' (başlık) ve 'altBaslik' (alt başlık) alanlarında arar.
     * Anahtar kelimenin (büyük/küçük harf duyarsız) herhangi bir alanda bulunması durumunda ilgili kurs tutulur.
     *
     * @var array $kurslar Filtrelenecek kurslar dizisi.
     * @var string $keyword 'q' GET parametresinden gelen arama anahtar kelimesi.
     */
    if(!empty($_GET['q'])) {
        $keyword = $_GET['q'];

        $kurslar = array_filter($kurslar, function($kurs) use ($keyword) {
            return stristr($kurs['baslik'], $keyword) or (stristr($kurs['altBaslik'], $keyword));
        });
    }

?>

<nav class="navbar navbar-expand-lg bg-primary navbar-dark">
    <div class="container">
        <a href="/" class="navbar-brand">CourseApp</a>
       
        <ul class="navbar-nav me-auto">
            <li class="nav-item">
                <a href="/" class="nav-link active">Anasayfa</a>
            </li>
            <li class="nav-item">
                <a href="/" class="nav-link">Kurslar</a>
            </li>
        </ul>

        <form action="index.php" class="d-flex" method="get">
            <input type="text" name="q" class="form-control me-2" placeholder="Keyword">
            <button type="submit" class="btn btn-warning">Ara</button>
        </form>
    </div>
</nav>