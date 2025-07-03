<?php
/*
PHP Tip Sistemi (Type System)
-----------------------------
PHP, nominal bir tip sistemi kullanır ve alt tip ilişkisi derleme zamanında kontrol edilir, ancak tip doğrulaması çalışma zamanında yapılır.

Temel (atomic) tipler:
- Scalar (ilkel) tipler: int, float, string, bool
- array, object, resource, never, void
- Sınıf ile ilgili tipler: self, parent, static
- Singleton tipler: false, true
- Unit tip: null
- Kullanıcı tanımlı tipler: class, interface, enum
- callable

Birleşik (composite) tipler:
- Kesişim (intersection) tipi: Birden fazla class-type'ı aynı anda sağlayan değerler. Örn: T&U&V
- Birleşim (union) tipi: Birden fazla tipten herhangi biri olabilir. Örn: T|U|V

Tip takma adları (type aliases):
- mixed: object|resource|array|string|float|int|bool|null
- iterable: Traversable|array

Örnekler:
*/

// Scalar tipler
echo is_int(5); // true
echo is_string("merhaba"); // true

// Kullanıcı tanımlı tip
class Elephant {}
function foo(Elephant $e) { /* ... */ }

// Union type örneği (PHP 8+)
function bar(int|string $x) { /* ... */ }

// Intersection type örneği (PHP 8.1+)
interface A {}
interface B {}
function baz(A&B $obj) { /* ... */ }

// mixed ve iterable tipleri
function defaultValue(mixed $val) {}
function iterate(iterable $it) { foreach($it as $v) { /* ... */ } }

/*
Not: PHP'de kullanıcı tanımlı type alias (typedef) yoktur.
*/
