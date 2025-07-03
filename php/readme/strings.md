---

# PHP String’leri (Dizeleri) Modern ve Temiz Açıklama

---

## 1. Temel Bilgi:

Bir **string**, bir karakterler dizisidir. PHP’de karakterler aslında byte olduğu için, PHP’nin string’leri “Unicode tam destekli” değildir (ama UTF-8 ile çalışılabilir).

---

## 2. String Tanımlama Yöntemleri

### a) Tek Tırnak (`'...'`)

* En basit yöntem.
* Kaçış karakteri olarak sadece `\'` ve `\\` kullanabilirsin.
* **Özel karakterler ve değişkenler genişlemez**.

```php
echo 'Bu bir string\'dir. \\n yeni satır değildir.'; // Tek tırnak, değişkenler ve \n özel anlam taşımaz!
```

---

### b) Çift Tırnak (`"..."`)

* **Değişkenler ve bazı özel karakterler** otomatik olarak genişler.
* Örneğin: `\n`, `\t`, değişken isimleri `$ad`.

```php
$name = "Ali";
echo "Merhaba, $name\nYeni satır!"; // Merhaba, Ali (yeni satır)
```

---

### c) Heredoc (`<<<IDENTIFIER ... IDENTIFIER;`)

* Çift tırnak gibi çalışır, çok satırlı string’ler için idealdir.
* Değişkenler genişler.
* Modern PHP’de kapatıcı etiketi boşluk/tab ile hizalanabilir.

```php
$name = "Veli";
echo <<<EOT
Merhaba $name!
Bu çok satırlı bir heredoc örneğidir.
EOT;
```

---

### d) Nowdoc (`<<<'IDENTIFIER' ... IDENTIFIER;`)

* **Tek tırnak** gibi çalışır.
* Değişkenler ve kaçış karakterleri genişlemez.
* Çok satırlı büyük kod veya veri bloklarını saklamak için kullanılır.

```php
echo <<<'EOT'
Bu bir nowdoc örneğidir.
Değişkenler $ad burada genişlemez.
EOT;
```

---

## 3. String İçinde Değişkenler (Interpolasyon)

* **Çift tırnak** veya **heredoc** kullanıyorsan değişkenleri doğrudan yazabilirsin:

```php
$meyve = "elma";
echo "Ben $meyve suyu içtim."; // Ben elma suyu içtim.
```

* Karmaşık değişkenler için süslü parantez kullanılır:

```php
$person = ['ad' => 'Mehmet'];
echo "Adı: {$person['ad']}";
// Dikkat: Anahtar tırnaksız olmalı: {$array[key]}
```

---

## 4. String Karakterlerine Erişim ve Değiştirme

```php
$str = "Deneme";
echo $str[0]; // D
$str[0] = "A";
echo $str; // Aneme
```

> PHP 7.1+ ile negatif indeksler de desteklenir: `$str[-1]` son karakter.

---

## 5. String Birleştirme (Concatenation)

```php
$a = "Merhaba";
$b = "Dünya";
echo $a . " " . $b; // Merhaba Dünya
```

> **.** operatörü ile yapılır, + ile değil!

---

## 6. Yararlı Fonksiyonlar

* `strlen($str)` → Uzunluk
* `strtoupper($str)` → BÜYÜK harf
* `strtolower($str)` → küçük harf
* `substr($str, 0, 3)` → Alt string
* `str_replace("a", "e", $str)` → Karakter değişimi

---

## 7. Dizi, Obje, Kaynak Türlerinin String’e Dönüşümü

* `echo $arr;`  → "Array"
* `echo $obj;` → Sihirli metod \_\_toString varsa döndürür, yoksa hata.
* `echo $resource;` → "Resource id #x"
* `echo null;` → boş string

---

## 8. Unicode ve Encoding

* **PHP’nin string’leri aslında byte dizisi!**
* UTF-8 ile çalışacaksan, `mb_*` (multi-byte) fonksiyonlarını kullanmalısın.
* Örneğin: `mb_strlen($str, 'UTF-8')`
* PHP’nin standart fonksiyonları çoğu zaman tek byte karakterler için güvenlidir.

---

## 9. Modern Uyarılar

* PHP 8.2+: `"${var}"` kullanımı **deprecated**, `"{$var}"` kullan!
* `[]` ile karakter erişimi var, `{}` eski sürümlerde vardı, artık kaldırıldı.

---

## 10. Sık Yapılan Hatalar ve Çözümleri

| Hata                                  | Açıklama / Çözüm                                                  |
| ------------------------------------- | ----------------------------------------------------------------- |
| **Değişken genişlemez**               | Tek tırnak ya da nowdoc kullandın mı? Çift tırnak/heredoc kullan. |
| **Çok satırlı string hatası**         | Heredoc/nowdoc kapatıcı etiketini doğru hizala.                   |
| **+ ile string birleştirme çalışmaz** | `.` kullan! (`$a . $b`)                                           |
| **Array’ı ekrana yazdıramadım**       | `print_r($arr)` ya da `var_dump($arr)` kullan.                    |
| **UTF-8’de harfler bozuldu**          | `mb_*` fonksiyonları kullan, dosyanı UTF-8 olarak kaydet.         |

---

## Yazılım Terimleri Açıklama (Kısa):

* **String interpolation:** String içinde değişkenlerin otomatik olarak genişlemesi.
* **Heredoc/Nowdoc:** Çok satırlı string yazmak için alternatifler.
* **Escape character:** Kaçış karakteri. Örn: `\n`, `\t`, `\'`, `\\`
* **Byte**: 8 bitlik veri, tek karakteri temsil edebilir.
* **Encoding (Kodlama):** Karakterlerin byte dizisi olarak nasıl saklandığı.
* **Unicode:** Dünya dillerini destekleyen karakter seti.
* **UTF-8:** Unicode karakterlerini kodlayan popüler format.

---

## Modern ve Temiz Bir Örnek

```php
<?php
$ad = "Murat";
$sehir = "İstanbul";
echo "Adım $ad, şehir: $sehir\n";

echo 'Bu tek tırnaklı bir string, $ad değişkeni genişlemez.\n';

$metin = <<<YAZI
Merhaba $ad,
Hoş geldin!
YAZI;

echo $metin;

// Şunu unutma: . ile birleştir
echo "Uzunluk: " . strlen($ad);
?>
```

---