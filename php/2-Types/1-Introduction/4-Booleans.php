<?php
/*
Boolean (bool) Tipi
------------------
PHP'de bool tipi yalnızca iki değer alabilir: true veya false. Mantıksal (doğruluk) değeri ifade etmek için kullanılır.

Sözdizimi:
- true ve false anahtar kelimeleri (büyük/küçük harf duyarsız)
*/
$foo = True; // TRUE değeri atanır

/*
Genellikle, bir operatörün sonucu bool döner ve kontrol yapılarında kullanılır:
*/
$action = "show_version";
if ($action == "show_version") {
    echo "The version is 1.23";
}

$show_separators = true;
if ($show_separators) {
    echo "<hr>\n";
}

/*
Bool'a Dönüştürme (Casting to boolean):
- (bool) ile açıkça dönüştürülebilir.
- Mantıksal bağlamda otomatik olarak bool'a çevrilir.
- Aşağıdaki değerler false kabul edilir:
  - false
  - 0 (int)
  - 0.0, -0.0 (float)
  - "" (boş string), "0" (string)
  - Boş dizi (array())
  - null
  - Bazı iç nesneler (ör. boş SimpleXML)
- Diğer tüm değerler true kabul edilir (örn. -1, "false", dolu dizi, vs.)
*/

// Örnekler:
var_dump((bool) "");        // bool(false)
var_dump((bool) "0");       // bool(false)
var_dump((bool) 1);          // bool(true)
var_dump((bool) -2);         // bool(true)
var_dump((bool) "foo");     // bool(true)
var_dump((bool) 2.3e5);      // bool(true)
var_dump((bool) array(12));  // bool(true)
var_dump((bool) array());    // bool(false)
var_dump((bool) "false");   // bool(true)

/*
Notlar:
- -1 değeri de true kabul edilir.
- echo false; çıktısı boş olur, echo 0; çıktısı 0 olur.
- OR ve || operatörlerinin önceliği farklıdır, atama ile birlikte kullanırken dikkatli olun.
- PHP'de boş dizi false kabul edilir, JavaScript'te ise true kabul edilir.
*/
