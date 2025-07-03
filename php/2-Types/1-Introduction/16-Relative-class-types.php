<?php
// self, parent ve static tipleri örnekleri
class Base {
    public function testSelf(self $obj) {
        echo 'self: ' . get_class($obj) . PHP_EOL;
    }
    // Removed 'parent' type hint as Base has no parent
    public function testParent($obj) {
        echo 'parent: ' . get_class($obj) . PHP_EOL;
    }
    public static function factory(): static {
        return new static();
    }
}
class Child extends Base {}

$base = new Base();
$child = new Child();
$base->testSelf($base); // self: Base
//$base->testSelf($child); // Hata: $child Base değil
$child->testParent($base); // parent: Base
//$child->testParent($child); // Hata: $child Base'in ebeveyni değil
$instance = Child::factory();
echo get_class($instance), PHP_EOL; // Child
