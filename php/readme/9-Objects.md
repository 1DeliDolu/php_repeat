# Nesneler (Objects)

## Nesne Oluşturma

Yeni bir nesne oluşturmak için new anahtar kelimesiyle bir sınıfı başlatın:

```php
// Örnek #1 Nesne Oluşturma
// [Koda bak](../2-Types/1-Introduction/9-Objects.php#L1)
class foo {
    function do_foo() {
        echo "Doing foo.";
    }
}
$bar = new foo;
$bar->do_foo();
```

Daha fazla bilgi için Sınıflar ve Nesneler bölümüne bakınız.

## Nesneye Dönüştürme

Bir nesne nesneye dönüştürülürse değişmez. Diğer türler nesneye dönüştürülürse, dahili stdClass sınıfından yeni bir nesne oluşturulur. Değer null ise, yeni nesne boş olur. Bir dizi nesneye dönüştürülürse, anahtarlar özellik adı, değerler ise özellik değeri olur. (PHP 7.2.0 öncesi sayısal anahtarlar doğrudan erişilemezdi.)

```php
// Örnek #2 Nesneye Dönüştürme
// [Koda bak](../2-Types/1-Introduction/9-Objects.php#L12)
$obj = (object) array('1' => 'foo');
var_dump(isset($obj->{'1'})); // çıktısı: bool(true)
// PHP 8.1 ile kullanımı önerilmez
var_dump(key($obj)); // çıktısı: string(1) "1"
```

Diğer türler için, scalar adında bir özellik oluşturulur ve değeri atanır.

```php
// Örnek #3 (object) ile dönüştürme
// [Koda bak](../2-Types/1-Introduction/9-Objects.php#L18)
$obj = (object) 'ciao';
echo $obj->scalar;  // çıktısı: ciao
```

---

**Bir sorun mu var?**
Bu sayfayı nasıl geliştireceğinizi öğrenin • Pull Request gönderin • Hata Bildirin
