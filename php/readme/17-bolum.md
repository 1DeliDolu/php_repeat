# 17. Bölüm: PDO ile Veritabanı İşlemleri ve fetchAll Kullanımı

Bu bölümde, PHP'de PDO (Php Data Object) ile veritabanı işlemleri ve fetchAll fonksiyonunun kullanımı örneklerle açıklanmıştır.

---

## PDO ile Veritabanından Veri Çekme

```php
$sql = "SELECT * from products";
$results = $pdo->query($sql);
$urunler = $results->fetchAll();

foreach ($urunler as $urun) {
    echo $urun->title."<br>";
}
```
**Açıklama:**
- `fetchAll()`, sorgudan dönen tüm satırları dizi olarak çeker.
- Her satır nesne olarak alınabilir ve özelliklerine erişilebilir.

---

## PDO ile Hazırlanmış Sorgu (Prepared Statement) Kullanımı

```php
$price = 20000;
$sql = "SELECT * from products WHERE price>?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$price]);
$urunler = $stmt->fetchAll();

foreach ($urunler as $urun) {
    echo $urun->title."<br>";
}
```
**Açıklama:**
- Hazırlanmış sorgu ile SQL injection riski azaltılır.
- Parametreler execute ile gönderilir.

---

## PDO ile Veri Ekleme

```php
$title = "Samsung S24";
$price = 30000;
$description = "güzel telefon";
$sql = "INSERT INTO products(title,price,description) VALUES(:title,:price,:description)";
$stmt = $pdo->prepare($sql);
$stmt->execute(['title'=>$title, 'price'=> $price,'description'=>$description]);
echo "kayıt eklendi";
```
**Açıklama:**
- Parametreli ekleme ile güvenli veri eklenir.

---

## PDO ile Çoklu Ekleme (Multiple Insert)

```php
$title = "Samsung S25";
$price = 30000;
$description = "güzel telefon";
$sql = "INSERT INTO products(title,price,description) VALUES(:title,:price,:description)";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':title', $title);
$stmt->bindParam(':price', $price);
$stmt->bindParam(':description', $description);
$stmt->execute();

$title = "Samsung S26";
$price = 30000;
$description = "güzel telefon";
$stmt->execute();
```
**Açıklama:**
- bindParam ile aynı statement tekrar tekrar farklı verilerle çalıştırılabilir.

---

## PDO ile Kayıt Güncelleme

```php
$id = 1;
$title = "updated";
$sql = "UPDATE products SET title=:title WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id'=> $id, 'title'=>$title]);
echo "güncellendi: ".$stmt->rowCount();
```
**Açıklama:**
- rowCount ile kaç satırın güncellendiği öğrenilebilir.

---

## PDO ile Kayıt Silme

```php
$id = 1;
$sql = "DELETE FROM products WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id'=> $id]);
echo "silindi: ".$stmt->rowCount();
```
**Açıklama:**
- Belirtilen id'ye sahip kayıt silinir.
- rowCount ile kaç satırın silindiği öğrenilir.

---

## Erişim Belirleyiciler: private, public, protected

PHP'de sınıf özellikleri ve metotları için üç temel erişim belirleyici kullanılır:

### public
- Her yerden erişilebilir (sınıf dışından da).
- Varsayılan erişim düzeyidir.

```php
class Ornek {
    public $ad;
    public function yaz() {
        echo $this->ad;
    }
}
```

### private
- Sadece tanımlandığı sınıf içinde erişilebilir.
- Alt sınıflar (miras alanlar) ve dışarıdan erişilemez.

```php
class Ornek {
    private $sifre;
    private function gizliFonksiyon() {
        // ...
    }
}
```

### protected
- Sadece tanımlandığı sınıf ve o sınıftan türeyen alt sınıflar tarafından erişilebilir.
- Sınıf dışından erişilemez.

```php
class Ornek {
    protected $puan;
    protected function puanGoster() {
        echo $this->puan;
    }
}
```

**Özet:**
- `public`: Her yerden erişim.
- `private`: Sadece kendi sınıfı içinde erişim.
- `protected`: Kendi sınıfı ve alt sınıflar tarafından erişim.

Bu belirleyiciler, OOP'de kapsülleme (encapsulation) ve güvenli kod yazımı için kullanılır.

---

## Örnek: Db Sınıfı ile Erişim Belirleyicileri Kullanımı

Aşağıda, veritabanı bağlantısı için kullanılan bir Db sınıfı örneği yer almaktadır:

```php
class Db {
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $dbName = "mydb";

    protected function connect() {
        try {
            $dsn = "mysql:host=".$this->host.";dbname=".$this->dbName;
            $pdo = new PDO($dsn, $this->user, $this->password);

            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

            return $pdo;
        }
        catch(PDOException $e) {
            echo "bağlantı hatası: ".$e->getMessage();
        }
    }
}
```

**Açıklama:**
- `$host`, `$user`, `$password`, `$dbName` değişkenleri **private** tanımlanmıştır. Sadece Db sınıfı içinde erişilebilir.
- `connect()` fonksiyonu **protected** tanımlanmıştır. Sadece Db sınıfı ve ondan türeyen alt sınıflar tarafından çağrılabilir.
- `connect()` fonksiyonu PDO ile veritabanı bağlantısı kurar ve bağlantı nesnesini döndürür.
- PDO hata yönetimi ve varsayılan fetch modu ayarlanmıştır.
- Bu yapı, kapsülleme (encapsulation) ve güvenli bağlantı için iyi bir örnektir.

---

## Product Sınıfı: CRUD Fonksiyonları

Aşağıda, Product sınıfında ürünler için temel veritabanı işlemlerini (CRUD) gerçekleştiren fonksiyonlar yer almaktadır:

```php
class Product extends Db {
    public function getProducts() {
        $sql = "SELECT * from products";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getProductById(int $productId) {
        $sql = "SELECT * from products WHERE id=:id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(['id' => $productId]);
        return $stmt->fetch();
    }

    public function createProduct($title, $description, $price) {
        $sql = "INSERT INTO products(title,description,price) VALUES (:title,:description,:price)";
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([
            'title' => $title,
            'description' => $description,
            'price' => $price,
        ]);
    }

    public function editProduct($id, $title, $description, $price) {
        $sql = "UPDATE products SET title=:title, description=:description, price=:price WHERE id=:id";
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([
            'id' => $id,
            'title' => $title,
            'description' => $description,
            'price' => $price,
        ]);
    }

    public function deleteProduct($id) {
        $sql = "DELETE FROM products WHERE id=:id";
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([
            'id' => $id
        ]);
    }
}
```

**Açıklama:**
- `getProducts()`: Tüm ürünleri veritabanından çeker ve dizi olarak döndürür.
- `getProductById($productId)`: Belirli bir id'ye sahip ürünü getirir.
- `createProduct($title, $description, $price)`: Yeni ürün ekler.
- `editProduct($id, $title, $description, $price)`: Belirli id'li ürünü günceller.
- `deleteProduct($id)`: Belirli id'li ürünü siler.
- Tüm fonksiyonlar PDO ile güvenli şekilde çalışır ve Db sınıfındaki connect() fonksiyonunu kullanır.

Bu yapı, OOP ile veritabanı işlemlerinin nasıl kapsüllenebileceğini ve yönetilebileceğini gösterir.

---

## editProduct Fonksiyonu ve SQL'de : Parametre Kullanımı

Aşağıda, bir ürünün güncellenmesini sağlayan editProduct fonksiyonu örneği ve açıklaması yer almaktadır:

```php
public function editProduct($id, $title, $description, $price) {
    $sql = "UPDATE products SET title=:title, description=:description, price=:price WHERE id=:id";
    $stmt = $this->connect()->prepare($sql);
    return $stmt->execute([
        'id' => $id,
        'title' => $title,
        'description' => $description,
        'price' => $price,
    ]);
}
```

**Açıklama:**
- SQL sorgusunda :title, :description, :price, :id gibi iki nokta (:) ile başlayan ifadeler **parametre yer tutucuları**dır.
- Bu parametreler, prepare ve execute ile güvenli şekilde gerçek değerlerle eşleştirilir.
- Bu yöntem, SQL injection saldırılarına karşı koruma sağlar.
- Fonksiyon, verilen id'li ürünün başlık, açıklama ve fiyatını günceller.
- execute fonksiyonuna gönderilen dizi, parametre adları ile değerlerin eşleşmesini sağlar.

Örneğin, :title yerine $title değişkeninin değeri, :id yerine $id değişkeninin değeri kullanılır.

Bu yapı, modern ve güvenli veritabanı işlemleri için önerilir.

---

## Ürün Ekleme Formu ve PHP ile Veritabanına Kayıt

Aşağıda, bir ürün ekleme formu ve formdan gelen verilerin Product sınıfı ile veritabanına eklenmesi örneği yer almaktadır:

```php
<?php
    if(isset($_POST["submit"])) {
        $title = $_POST["title"];
        $description = $_POST["description"];
        $price = $_POST["price"];

        $product = new Product($title, $description); // (Kurucuya parametre gerekirse)

        if($product->createProduct($title, $description, $price)) {
            header('location: index.php'); // Başarılı eklemede ana sayfaya yönlendir
        }
     }
?>

<form method="post">
    <label for="title">Title</label>
    <input type="text" name="title" id="title">
    <label for="description">Description</label>
    <textarea name="description" id="description"></textarea>
    <label for="price">Price</label>
    <input type="text" name="price" id="price">
    <button type="submit" name="submit">Kaydet</button>
</form>
```

**Açıklama:**
- Form gönderildiğinde (submit), POST ile gelen title, description ve price değişkenleri alınır.
- Product sınıfından bir nesne oluşturulur.
- createProduct fonksiyonu çağrılarak veritabanına yeni ürün eklenir.
- Ekleme başarılı olursa kullanıcı ana sayfaya yönlendirilir.
- Formda kullanıcıdan başlık, açıklama ve fiyat bilgileri alınır.

Bu yapı, OOP ile formdan gelen verilerin güvenli şekilde veritabanına eklenmesini sağlar.

---

Bu bölümde, PDO ile temel veritabanı işlemleri ve fetchAll fonksiyonu örneklerle anlatılmıştır.
