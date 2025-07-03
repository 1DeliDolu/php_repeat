# Diziler

PHP'de bir dizi (array) aslında sıralı bir haritadır (ordered map). Harita, anahtarları (key) değerlerle (value) eşleştiren bir türdür. Bu tür, farklı amaçlar için optimize edilmiştir; dizi, liste (vektör), hash tablosu, sözlük, koleksiyon, yığın (stack), kuyruk (queue) ve daha fazlası olarak kullanılabilir. Diziler başka diziler de içerebilir, bu sayede ağaçlar ve çok boyutlu diziler oluşturulabilir.

## Söz Dizimi

### array() ile tanımlama

Bir dizi, array() dil yapısı veya kısa [] sözdizimi ile oluşturulabilir.

```php
// Örnek #1 Basit bir dizi
// [Koda bak](../2-Types/1-Introduction/8-Arrays.php#L1)
$array1 = array(
    "foo" => "bar",
    "bar" => "foo",
);
// Kısa dizi sözdizimi
$array2 = [
    "foo" => "bar",
    "bar" => "foo",
];
var_dump($array1, $array2);
```

Anahtar int veya string olabilir. Değer herhangi bir türde olabilir. Anahtar dönüştürme kuralları geçerlidir (aşağıya bakınız).

### Anahtar Dönüştürme ve Üzerine Yazma

```php
// Örnek #2 Tip Dönüştürme ve Üzerine Yazma
// [Koda bak](../2-Types/1-Introduction/8-Arrays.php#L13)
$array = array(
    1    => "a",
    "1"  => "b",
    1.5  => "c",
    true => "d",
);
var_dump($array);
```

### Karışık int ve string anahtarlar

```php
// Örnek #3 Karışık int ve string anahtarlar
// [Koda bak](../2-Types/1-Introduction/8-Arrays.php#L21)
$array = array(
    "foo" => "bar",
    "bar" => "foo",
    100   => -100,
    -100  => 100,
);
var_dump($array);
```

### Anahtarsız indeksli diziler

```php
// Örnek #4 Anahtarsız indeksli diziler
// [Koda bak](../2-Types/1-Introduction/8-Arrays.php#L30)
$array = array("foo", "bar", "hello", "world");
var_dump($array);
```

### Bazı elemanlarda anahtar yok

```php
// Örnek #5 Bazı elemanlarda anahtar yok
// [Koda bak](../2-Types/1-Introduction/8-Arrays.php#L35)
$array = array(
         "a",
         "b",
    6 => "c",
         "d",
);
var_dump($array);
```

### Karmaşık Tip Dönüştürme ve Üzerine Yazma

```php
// Örnek #6 Karmaşık Tip Dönüştürme ve Üzerine Yazma
// [Koda bak](../2-Types/1-Introduction/8-Arrays.php#L43)
$array = array(
    1    => 'a',
    '1'  => 'b',
    1.5  => 'c',
    -1 => 'd',
    '01'  => 'e',
    '1.5' => 'f',
    true => 'g',
    false => 'h',
    '' => 'i',
    null => 'j',
    'k',
    2 => 'l',
);
var_dump($array);
```

### Negatif indeks örneği

```php
// Örnek #7 Negatif indeks örneği
// [Koda bak](../2-Types/1-Introduction/8-Arrays.php#L59)
$array = [];
$array[-5] = 1;
$array[] = 2;
var_dump($array);
```

### Dizi elemanlarına erişim

```php
// Örnek #8 Dizi elemanlarına erişim
// [Koda bak](../2-Types/1-Introduction/8-Arrays.php#L65)
$array = array(
    "foo" => "bar",
    42    => 24,
    "multi" => array(
         "dimensional" => array(
             "array" => "foo"
         )
    )
);
var_dump($array["foo"]);
var_dump($array[42]);
var_dump($array["multi"]["dimensional"]["array"]);
```

### Dizi dereferanslama

```php
// Örnek #9 Dizi dereferanslama
// [Koda bak](../2-Types/1-Introduction/8-Arrays.php#L78)
function getArray() {
    return array(1, 2, 3);
}
$secondElement = getArray()[1];
var_dump($secondElement);
```

### Köşeli parantezlerle dizi kullanımı

```php
// Örnek #10 Köşeli parantezlerle dizi kullanımı
// [Koda bak](../2-Types/1-Introduction/8-Arrays.php#L85)
$arr = array(5 => 1, 12 => 2);
$arr[] = 56;
$arr["x"] = 42;
unset($arr[5]);
var_dump($arr);
unset($arr);
var_dump($arr);
```

### Dizi Dağıtımı (Destructuring)

```php
// Örnek #11 Dizi Dağıtımı
// [Koda bak](../2-Types/1-Introduction/8-Arrays.php#L93)
$source_array = ['foo', 'bar', 'baz'];
[$foo, $bar, $baz] = $source_array;
echo $foo, PHP_EOL;
echo $bar, PHP_EOL;
echo $baz, PHP_EOL;
```

### Foreach ile dizi dağıtımı

```php
// Örnek #12 Foreach ile dizi dağıtımı
// [Koda bak](../2-Types/1-Introduction/8-Arrays.php#L100)
$source_array = [
    [1, 'John'],
    [2, 'Jane'],
];
foreach ($source_array as [$id, $name]) {
    echo "{$id}: '{$name}'\n";
}
```

### Eleman atlama

```php
// Örnek #13 Eleman atlama
// [Koda bak](../2-Types/1-Introduction/8-Arrays.php#L108)
$source_array = ['foo', 'bar', 'baz'];
[, , $baz] = $source_array;
echo $baz;
```

### İlişkisel dizilerde dağıtım

```php
// Örnek #14 İlişkisel dizilerde dağıtım
// [Koda bak](../2-Types/1-Introduction/8-Arrays.php#L113)
$source_array = ['foo' => 1, 'bar' => 2, 'baz' => 3];
['baz' => $three] = $source_array;
echo $three, PHP_EOL;
$source_array = ['foo', 'bar', 'baz'];
[2 => $baz] = $source_array;
echo $baz, PHP_EOL;
```

### İki değişkeni takas etme

```php
// Örnek #15 İki değişkeni takas etme
// [Koda bak](../2-Types/1-Introduction/8-Arrays.php#L121)
$a = 1;
$b = 2;
[$b, $a] = [$a, $b];
echo $a, PHP_EOL;
echo $b, PHP_EOL;
```

### Ara elemanları silme

```php
// Örnek #16 Ara elemanları silme
// [Koda bak](../2-Types/1-Introduction/8-Arrays.php#L127)
$a = array(1 => 'one', 2 => 'two', 3 => 'three');
unset($a[2]);
var_dump($a);
$b = array_values($a);
var_dump($b);
```

### Anahtar tırnaklama

```php
// Örnek #17 Anahtar tırnaklama
// [Koda bak](../2-Types/1-Introduction/8-Arrays.php#L133)
error_reporting(E_ALL);
ini_set('display_errors', true);
ini_set('html_errors', false);
$array = array(1, 2);
$count = count($array);
for ($i = 0; $i < $count; $i++) {
    echo "\nChecking $i: \n";
    echo "Bad: " . $array['$i'] . "\n";
    echo "Good: " . $array[$i] . "\n";
    echo "Bad: {$array['$i']}\n";
    echo "Good: {$array[$i]}\n";
}
```

### Daha fazla örnek

```php
// Örnek #18 Daha fazla örnek
// [Koda bak](../2-Types/1-Introduction/8-Arrays.php#L146)
error_reporting(E_ALL);
$arr = array('fruit' => 'apple', 'veggie' => 'carrot');
echo $arr['fruit'], PHP_EOL;
echo $arr['veggie'], PHP_EOL;
try {
    echo $arr[fruit];
} catch (Error $e) {
    echo get_class($e), ': ', $e->getMessage(), PHP_EOL;
}
define('fruit', 'veggie');
echo $arr['fruit'], PHP_EOL;
echo $arr[fruit], PHP_EOL;
echo "Hello $arr[fruit]", PHP_EOL;
echo "Hello {$arr[fruit]}", PHP_EOL;
echo "Hello {$arr['fruit']}", PHP_EOL;
echo "Hello " . $arr['fruit'], PHP_EOL;
```

### Diziye dönüştürme

```php
// Örnek #19 Diziye dönüştürme
// [Koda bak](../2-Types/1-Introduction/8-Arrays.php#L167)
class A {
    private $B;
    protected $C;
    public $D;
    function __construct() { $this->{1} = null; }
}
var_export((array) new A());
```

### Nesneyi diziye dönüştürme

```php
// Örnek #20 Nesneyi diziye dönüştürme
// [Koda bak](../2-Types/1-Introduction/8-Arrays.php#L175)
class A { private $A; }
class B extends A { private $A; public $AA; }
var_dump((array) new B());
```

### Basit dizi unpacking

```php
// Örnek #21 Basit dizi unpacking
// [Koda bak](../2-Types/1-Introduction/8-Arrays.php#L180)
$arr1 = [1, 2, 3];
$arr2 = [...$arr1];
$arr3 = [0, ...$arr1];
$arr4 = [...$arr1, ...$arr2, 111];
$arr5 = [...$arr1, ...$arr1];
function getArr() { return ['a', 'b']; }
$arr6 = [...getArr(), 'c' => 'd'];
var_dump($arr1, $arr2, $arr3, $arr4, $arr5, $arr6);
```

### Çakışan anahtarla dizi unpacking

```php
// Örnek #22 Çakışan anahtarla dizi unpacking
// [Koda bak](../2-Types/1-Introduction/8-Arrays.php#L189)
$arr1 = ["a" => 1];
$arr2 = ["a" => 2];
$arr3 = ["a" => 0, ...$arr1, ...$arr2];
var_dump($arr3);
$arr4 = [1, 2, 3];
$arr5 = [4, 5, 6];
$arr6 = [...$arr4, ...$arr5];
var_dump($arr6);
```

### Dizi esnekliği

```php
// Örnek #23 Dizi esnekliği
// [Koda bak](../2-Types/1-Introduction/8-Arrays.php#L198)
$a = array( 'color' => 'red', 'taste' => 'sweet', 'shape' => 'round', 'name'  => 'apple', 4 );
$b = array('a', 'b', 'c');
var_dump($a, $b);
$a = array();
$a['color'] = 'red';
$a['taste'] = 'sweet';
$a['shape'] = 'round';
$a['name']  = 'apple';
$a[]        = 4;
$b = array();
$b[] = 'a';
$b[] = 'b';
b[] = 'c';
var_dump($a, $b);
```

### array() kullanımı

```php
// Örnek #24 array() kullanımı
// [Koda bak](../2-Types/1-Introduction/8-Arrays.php#L212)
$map = array( 'version' => 4, 'OS' => 'Linux', 'lang' => 'english', 'short_tags' => true );
var_dump($map);
$array = array( 7, 8, 0, 156, -10 );
var_dump($array);
$switching = array( 10, 5 => 6, 3 => 7, 'a' => 4, 11, '8' => 2, '02' => 77, 0 => 12 );
var_dump($switching);
$empty = array();
var_dump($empty);
```

### Koleksiyon

```php
// Örnek #25 Koleksiyon
// [Koda bak](../2-Types/1-Introduction/8-Arrays.php#L222)
$colors = array('red', 'blue', 'green', 'yellow');
foreach ($colors as $color) {
    echo "Do you like $color?\n";
}
```

### Döngüde eleman değiştirme

```php
// Örnek #26 Döngüde eleman değiştirme
// [Koda bak](../2-Types/1-Introduction/8-Arrays.php#L229)
$colors = array('red', 'blue', 'green', 'yellow');
foreach ($colors as &$color) {
    $color = mb_strtoupper($color);
}
unset($color);
print_r($colors);
```

### 1'den başlayan indeks

```php
// Örnek #27 1'den başlayan indeks
// [Koda bak](../2-Types/1-Introduction/8-Arrays.php#L236)
$firstquarter = array(1 => 'January', 'February', 'March');
print_r($firstquarter);
```

### Dizi doldurma

```php
// Örnek #28 Dizi doldurma
// [Koda bak](../2-Types/1-Introduction/8-Arrays.php#L240)
$handle = opendir('.');
while (false !== ($file = readdir($handle))) {
    $files[] = $file;
}
closedir($handle);
var_dump($files);
```

### Dizi sıralama

```php
// Örnek #29 Dizi sıralama
// [Koda bak](../2-Types/1-Introduction/8-Arrays.php#L247)
sort($files);
print_r($files);
```

### Özyinelemeli ve çok boyutlu diziler

```php
// Örnek #30 Özyinelemeli ve çok boyutlu diziler
// [Koda bak](../2-Types/1-Introduction/8-Arrays.php#L251)
$fruits = array (
    "fruits"  => array ( "a" => "orange", "b" => "banana", "c" => "apple" ),
    "numbers" => array ( 1, 2, 3, 4, 5, 6 ),
    "holes"   => array ( "first", 5 => "second", "third" )
);
var_dump($fruits);
echo $fruits["holes"][5];
echo $fruits["fruits"]["a"];
unset($fruits["holes"][0]);
$juices["apple"]["green"] = "good";
var_dump($juices);
```

### Dizi kopyalama

```php
// Örnek #31 Dizi kopyalama
// [Koda bak](../2-Types/1-Introduction/8-Arrays.php#L263)
$arr1 = array(2, 3);
$arr2 = $arr1;
$arr2[] = 4;
$arr3 = &$arr1;
$arr3[] = 4;
var_dump($arr1, $arr2, $arr3);
```

---

**Bir sorun mu var?**
Bu sayfayı nasıl geliştireceğinizi öğrenin • Pull Request gönderin • Hata Bildirin
