<?php
// mixed türü örneği
function print_mixed(mixed $value): void {
    var_dump($value);
}
print_mixed(42);
print_mixed("merhaba");
print_mixed([1, 2, 3]);
print_mixed(null);
