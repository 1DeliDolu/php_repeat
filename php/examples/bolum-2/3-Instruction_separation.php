<?php
/*
PHP'de Komut Ayrımı (Instruction Separation)
--------------------------------------------
PHP'de her komutun (statement) sonunda noktalı virgül (;) kullanılmalıdır. Ancak, bir PHP kod bloğunun kapanış etiketi (?>) satır sonunda noktalı virgül olmasa da komutun bittiğini belirtir.

Örnek 1: Kapanış etiketi satır sonunu kapsar
*/
?>
<?php echo "Some text"; ?>
No newline
<?= "But newline now" ?>
<?php
/*
Çıktı:
Some textNo newline
But newline now

Örnek 2: PHP yorumlayıcısına girip çıkmak
*/
?>
<?php
echo "This is a test\n";
?>
<?php echo "This is a test\n" ?>
<?php echo "We omitted the last closing tag\n";
/*
Not:
Bir dosyanın sonunda PHP kapanış etiketi (?>) kullanmak zorunlu değildir. Özellikle include/require ile dosya eklerken veya header göndermek istiyorsanız, dosya sonunda kapanış etiketi bırakmamak gereksiz boşluk oluşmasını engeller.

Dikkat:
<?php echo 'Ending tag excluded';
// ile
<?php echo 'Ending tag excluded';
<p>But html is still visible</p>
// farklıdır. İkinci örnek hata verir. Eğer PHP kodundan sonra HTML yazmayacaksanız, kapanış etiketini kullanmayın.

Bir satırda birden fazla komut yazılabilir:
*/
?>
<?php
echo "a";
echo "b";
echo "c";
// Çıktı: abc
?>