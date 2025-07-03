<?php
// never dönüş tipi örneği
function sayHello(string $name): never {
    echo "Hello, $name";
    exit(); // Bu satır olmazsa PHP hata verir
}
sayHello("John"); // çıktı: Hello, John
