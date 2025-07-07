<?php

    include "ayar.php";

    // $query = "DELETE FROM kurslar WHERE id=6";
    $query = "DELETE FROM kurslar WHERE  id=12";

    $sonuc = mysqli_query($baglanti, $query);
    $adet = mysqli_affected_rows($baglanti);

    if($sonuc)  {
        echo "veri silindi: ".$adet;
    } else {
        echo "veri silme hatası";
    }


    mysqli_close($baglanti);
?>