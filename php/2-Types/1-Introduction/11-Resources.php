<?php
// Kaynak (resource) örneği: Dosya açma
$handle = fopen(__FILE__, 'r');
echo get_resource_type($handle), PHP_EOL; // Çıktı: stream
fclose($handle);
?>
