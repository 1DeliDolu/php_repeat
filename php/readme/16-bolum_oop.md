# 16. Bölüm: PHP'de Nesne Yönelimli Programlama (OOP) Temelleri

Bu bölümde, PHP'de OOP'nin temel kavramları ve önemli fonksiyonları özetlenmiştir.

---

## Sınıf Tanımı ve Kurucu Fonksiyon

```php
class User {
    public $username;
    public $email;
    
    function __construct($username, $email) {
        $this->username = $username;
        $this->email = $email;
    }
}
```
**Açıklama:**
- `__construct` fonksiyonu, sınıftan nesne oluşturulurken otomatik olarak çalışır.
- Sınıf özellikleri (`$username`, `$email`) tanımlanır ve kurucuda atanır.

---

## Getter ve Setter Fonksiyonları

```php
class Product {
    private $price;
    
    public function setPrice($price) {
        $this->price = $price;
    }
    public function getPrice() {
        return $this->price;
    }
}
```
**Açıklama:**
- Özellikler `private` tanımlanarak doğrudan erişim engellenir.
- `setPrice` ve `getPrice` ile kontrollü erişim sağlanır.

---

## Miras (Inheritance)

```php
class Animal {
    public function speak() {
        echo "Ses çıkarıyor";
    }
}

class Dog extends Animal {
    public function speak() {
        echo "Hav hav!";
    }
}
```
**Açıklama:**
- `Dog` sınıfı, `Animal` sınıfından miras alır.
- `speak` fonksiyonu Dog sınıfında ezilmiştir (override).

---

## Statik Fonksiyonlar ve Özellikler

```php
class Math {
    public static $pi = 3.14;
    public static function square($x) {
        return $x * $x;
    }
}
```
**Açıklama:**
- Statik özellik ve fonksiyonlara sınıf adı ile erişilir: `Math::$pi`, `Math::square(5)`

---

## Nesne Oluşturma ve Kullanım Örneği

```php
$user = new User("ali", "ali@example.com");
echo $user->username; // ali

$product = new Product();
$product->setPrice(100);
echo $product->getPrice(); // 100

$dog = new Dog();
$dog->speak(); // Hav hav!
```

---

## Ogrenci Sınıfı ve Nesne Kullanımı Örneği

Aşağıda, bir Ogrenci sınıfı tanımlanmakta ve bu sınıftan iki nesne oluşturulmaktadır. Nesneler diziye eklenip foreach ile gezilmektedir:

```php
class Ogrenci {
    public $ogrno;
    public $ad;
    public $sube;
}

$ogrenci1 = new Ogrenci();
$ogrenci1->ogrno = 100;
$ogrenci1->ad = "Çınar";
$ogrenci1->sube = "10A";

$ogrenci2 = new Ogrenci();
$ogrenci2->ogrno = 200;
$ogrenci2->ad = "Ahmet";
$ogrenci2->sube = "11A";

echo $ogrenci1->ogrno." ".$ogrenci1->ad." ".$ogrenci1->sube."<br>";
echo $ogrenci2->ogrno." ".$ogrenci2->ad." ".$ogrenci2->sube."<br>";

$ogrenciler = [$ogrenci1, $ogrenci2];

foreach($ogrenciler as $ogrenci) {
    echo gettype($ogrenci);
    echo "<br>";
    echo $ogrenci->ogrno." ".$ogrenci->ad." ".$ogrenci->sube."<br>";
    var_dump($ogrenci instanceof Ogrenci);
}
```

**Açıklama:**
- `Ogrenci` sınıfı ile öğrenci nesneleri oluşturulur ve özellikleri atanır.
- Nesneler bir diziye eklenip foreach ile gezilebilir.
- `gettype($ogrenci)` ile nesnenin tipi alınır.
- `instanceof` ile nesnenin belirli bir sınıfa ait olup olmadığı kontrol edilir.
- Bu örnek, temel nesne oluşturma, diziyle nesne yönetimi ve OOP'nin pratik kullanımını gösterir.

---

## Product Sınıfı ve Kurucu Fonksiyonda Negatif Fiyat Kontrolü

Aşağıda, Product sınıfında kurucu fonksiyon ile nesne oluşturulurken negatif fiyat kontrolü yapılmaktadır:

```php
class Product {
    public $name;
    public $price;

    function __construct($name, $price) {
        $this->name = $name; // Ürün adı atanır
        if($price < 0) {     // Fiyat negatifse
            $this->price = 0; // Fiyatı 0 olarak ayarla
        } else {
            $this->price = $price; // Fiyatı gelen değer olarak ayarla
        }
    }
}
```

**Açıklama:**
- `__construct($name, $price)`: Nesne oluşturulurken çalışır, iki parametre alır.
- `$this->name = $name;`: Ürün adı nesneye atanır.
- `if($price < 0)`: Fiyat negatifse...
- `$this->price = 0;`: ...fiyatı 0 olarak ayarla.
- `else { $this->price = $price; }`: Değilse, gelen fiyatı ata.
- Bu sayede, ürün nesnesi oluşturulurken negatif fiyat girilirse otomatik olarak 0 yapılır.

---

## Çok Seviyeli Miras (Inheritance) ve Protected Fonksiyon Kullanımı

Aşağıda, birden fazla seviyede kalıtım (miras) ve protected fonksiyonun kullanımı örneklenmiştir:

```php
class Kisi {
    public $ad;
    public $soyad;

    public function konus() {
        echo "{$this->ad} {$this->soyad} konuşuyor";
        echo "<br>";
    }
}

class Ogrenci extends Kisi {
    public $ogrNo;
    public function dersCalis() {
        echo "{$this->ad} {$this->soyad} ders çalışıyor.";
        echo "<br>";
    }
}

class Ogretmen extends Kisi {
    protected function dersAnlatir() {
        echo "{$this->ad} {$this->soyad} ders anlatıyor.";
        echo "<br>";
    }
}

class Mudur extends Ogretmen {
    public function idareEder() {
        $this->dersAnlatir();
        echo "{$this->ad} {$this->soyad} okulu idare ediyor.";
        echo "<br>";
    }
}

$kisi = new Kisi();
$kisi->ad = "Ali";
$kisi->soyad = "Turan";
$kisi->konus();

$ogrenci = new Ogrenci();
$ogrenci->ad = "Ahmet";
$ogrenci->soyad = "Turan";
$ogrenci->konus();
$ogrenci->dersCalis();

$ogretmen = new Ogretmen();
$ogretmen->ad = "Emel";
$ogretmen->soyad = "Turan";
$ogretmen->konus();

$mudur = new Mudur();
$mudur->ad = "Çınar";
$mudur->soyad = "Turan";
$mudur->idareEder();
```

**Açıklama:**
- `Kisi` temel sınıftır, ad ve soyad özellikleri ile konus() fonksiyonunu içerir.
- `Ogrenci` ve `Ogretmen` sınıfları, Kisi'den miras alır. Ogrenci'ye dersCalis(), Ogretmen'e protected dersAnlatir() eklenmiştir.
- `Mudur` sınıfı, Ogretmen'den miras alır ve public idareEder() fonksiyonu ile protected dersAnlatir() fonksiyonunu çağırabilir.
- Protected fonksiyonlar, sadece kendi sınıfı ve alt sınıflar tarafından erişilebilir.
- Her nesne, kendi ve üst sınıflarının fonksiyonlarını kullanabilir.
- Bu örnek, çok seviyeli miras ve erişim belirleyicilerinin (public/protected) OOP'de nasıl çalıştığını gösterir.

---

Bu bölümde, PHP'de OOP'nin temel yapı taşları ve önemli fonksiyonları özetlenmiştir. Daha gelişmiş OOP konuları için kalıtım, arayüzler ve soyut sınıflar incelenebilir.
