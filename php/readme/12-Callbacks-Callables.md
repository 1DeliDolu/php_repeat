# Callback / Çağrılabilirler (Callables)

Callback'ler callable türüyle tanımlanabilir.

Bazı fonksiyonlar (ör: call_user_func(), usort()) kullanıcı tanımlı callback fonksiyonlarını parametre olarak alabilir. Callback fonksiyonları sadece basit fonksiyonlar değil, aynı zamanda nesne metotları ve statik sınıf metotları da olabilir.

## Aktarma (Passing)

Bir PHP fonksiyonu, adı string olarak verilerek aktarılır. Herhangi bir yerleşik veya kullanıcı tanımlı fonksiyon kullanılabilir (array(), echo, empty(), eval(), exit(), isset(), list(), print, unset() hariç).

Bir nesne metodu, [nesne, metod adı] şeklinde bir diziyle aktarılır. Statik sınıf metotları ise [sınıf adı, metod adı] veya 'SınıfAdı::metotAdı' şeklinde aktarılabilir.

Anonim fonksiyonlar ve arrow fonksiyonlar da callback olarak aktarılabilir.

> Not: PHP 8.1.0 itibariyle, birinci sınıf callable sözdizimi ile de anonim fonksiyon oluşturulabilir.

Genel olarak, __invoke() metodunu tanımlayan herhangi bir nesne de callback olarak aktarılabilir.

```php
// Örnek #1 Callback fonksiyon örnekleri
// [Koda bak](../2-Types/1-Introduction/12-Callbacks-Callables.php#L1)
// Basit callback fonksiyonu
function my_callback_function() {
    echo 'hello world!', PHP_EOL;
}
// Callback metodu
class MyClass {
    static function myCallbackMethod() {
        echo 'Hello World!', PHP_EOL;
    }
}
// Tip 1: Basit callback
call_user_func('my_callback_function');
// Tip 2: Statik sınıf metodu
call_user_func(array('MyClass', 'myCallbackMethod'));
// Tip 3: Nesne metodu
$obj = new MyClass();
call_user_func(array($obj, 'myCallbackMethod'));
// Tip 4: Statik sınıf metodu (string)
call_user_func('MyClass::myCallbackMethod');
// Tip 5: Relative static class method call
class A {
    public static function who() { echo 'A', PHP_EOL; }
}
class B extends A {
    public static function who() { echo 'B', PHP_EOL; }
}
call_user_func(array('B', 'parent::who')); // A, PHP 8.2.0 ile kullanımı önerilmez
// Tip 6: __invoke kullanan nesneler
class C {
    public function __invoke($name) { echo 'Hello ', $name, PHP_EOL; }
}
$c = new C();
call_user_func($c, 'PHP!');
```

```php
// Örnek #2 Closure ile callback örneği
// [Koda bak](../2-Types/1-Introduction/12-Callbacks-Callables.php#L44)
$double = function($a) { return $a * 2; };
$numbers = range(1, 5);
$new_numbers = array_map($double, $numbers);
print implode(' ', $new_numbers);
```

Yukarıdaki örneğin çıktısı:

2 4 6 8 10

> Not: call_user_func() ve call_user_func_array() ile kaydedilen callback'ler, önceki bir callback'te yakalanmamış bir istisna fırlatılırsa çağrılmaz.

---

**Bir sorun mu var?**
Bu sayfayı nasıl geliştireceğinizi öğrenin • Pull Request gönderin • Hata Bildirin
