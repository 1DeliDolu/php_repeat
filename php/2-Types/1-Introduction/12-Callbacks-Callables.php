<?php
// Örnek #1 Callback fonksiyon örnekleri
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

// Örnek #2 Closure ile callback örneği
$double = function($a) { return $a * 2; };
$numbers = range(1, 5);
$new_numbers = array_map($double, $numbers);
print implode(' ', $new_numbers);
