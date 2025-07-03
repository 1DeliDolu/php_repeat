<?php
// void dönüş tipi örneği
function yazdir(string $metin): void {
    echo $metin, PHP_EOL;
}
yazdir("Merhaba dünya");

// void fonksiyonun dönüşü her zaman null'dur
yazdir("Test");
var_dump(yazdir("Test2")); // null
