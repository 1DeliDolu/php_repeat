<?php

function kursEkle(&$kurslar, string $baslik,string $altBaslik,string $resim,string $yayinTarihi,int $yorumSayisi=0,int $begeniSayisi=0, bool $onay=true) {
    $yeni_kurs[count($kurslar) + 1] = array(
        "baslik" => $baslik,
        "altBaslik" => $altBaslik,
        "resim" => $resim,
        "yayinTarihi" => $yayinTarihi,
        "yorumSayisi" => $yorumSayisi,
        "begeniSayisi" => $begeniSayisi,
        "onay" => $onay
    );

    $kurslar = array_merge($kurslar, $yeni_kurs);
}

function urlDuzenle($baslik) {
    return str_replace([" ","ç","@","."],["-","c","","-"],strtolower($baslik));
}

function kisaAciklama($altBaslik) {
    if (strlen($altBaslik) > 50) {
        return substr($altBaslik,0,50)."..."; 
    } else {
        return $altBaslik;
    }
}

/**
 * Safely sanitizes a string for HTML output.
 *
 * This function trims whitespace, removes backslashes, and converts special characters
 * to HTML entities to help prevent XSS (Cross-Site Scripting) attacks.
 *
 * @param string $data The input string to be sanitized.
 * @return string The sanitized string safe for HTML output.
 */
function safe_html($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data ;
}
?>