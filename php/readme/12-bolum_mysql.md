# 12. Bölüm: MySQL ve PHP ile Veritabanı İşlemleri

Bu bölümde, PHP ile MySQL veritabanı bağlantısı ve temel veritabanı işlemleri anlatılmaktadır.

## Temel Konular
- MySQL veritabanı nedir ve ne için kullanılır?
- PHP ile MySQL veritabanına nasıl bağlanılır?
- Veritabanı bağlantısı için `mysqli_connect` fonksiyonu kullanımı
- Veritabanında tablo oluşturma, veri ekleme, veri güncelleme ve veri silme işlemleri
- SQL sorgularının PHP üzerinden çalıştırılması (`SELECT`, `INSERT`, `UPDATE`, `DELETE`)
- Sorgu sonuçlarının döngü ile ekrana yazdırılması
- Hata yönetimi ve bağlantı kontrolü

## Örnek Fonksiyonlar ve Kullanımlar
- `mysqli_connect()`: Veritabanına bağlanmak için kullanılır.
- `mysqli_query()`: SQL sorgularını çalıştırmak için kullanılır.
- `mysqli_fetch_assoc()`: Sorgu sonucunu dizi olarak almak için kullanılır.
- `mysqli_close()`: Veritabanı bağlantısını kapatmak için kullanılır.

Bu bölümdeki örnekler ile PHP ve MySQL kullanarak dinamik web uygulamalarında veritabanı işlemlerinin nasıl yapılacağı öğrenilir.

---

## Bağlantı Kurma ve Kapatma Örneği

Aşağıda, PHP ile MySQL veritabanına nasıl bağlanılacağı ve bağlantının nasıl kapatılacağı gösterilmektedir:

```php
$host = getenv('DB_HOST') ?: 'localhost';
$username = getenv('DB_USERNAME') ?: 'root';
$password = getenv('DB_PASSWORD') ?: '';
$database = getenv('DB_DATABASE') ?: 'coursedb';

$baglanti = mysqli_connect($host, $username, $password, $database);

if(mysqli_connect_errno() > 0) {
    die("hata: ".mysqli_connect_errno());
}

echo "mysql bağlantısı oluşturuldu.";

// sql sorgusularını yazacağız.

mysqli_close($baglanti);

echo "mysql bağlantısı kapatıldı.";
```

### Açıklama
- `$host`, `$username`, `$password`, `$database`: Bağlantı için gerekli bilgilerdir. Ortam değişkeni yoksa varsayılan değerler kullanılır.
- `mysqli_connect(...)`: Veritabanına bağlanır.
- `mysqli_connect_errno()`: Bağlantı hatası olup olmadığını kontrol eder.
- `mysqli_close($baglanti)`: Bağlantıyı kapatır.
- Kodun başında bağlantı kurulur, sonunda ise bağlantı kapatılır.

---

## Birden Fazla SQL Sorgusunu Çalıştırmak

PHP'de birden fazla SQL sorgusunu tek seferde çalıştırmak için sorguları birleştirip (`.=`, `;` ile ayırarak) `mysqli_multi_query` fonksiyonu kullanılabilir.

### Örnek:
```php
$query = "INSERT INTO kurslar(baslik,altBaslik,resim,yayinTarihi,yorumSayisi,begeniSayisi,onay) VALUES('Angular Kursu','ileri seviye angular dersleri','1.jpg','10/10/2023',10,10,1);";

// İkinci ve üçüncü sorguları ekleyebilirsiniz:
$query .= "INSERT INTO kurslar(baslik,altBaslik,resim,yayinTarihi,yorumSayisi,begeniSayisi,onay) VALUES('React Kursu','ileri seviye react dersleri','2.jpg','11/10/2023',5,15,1);";
$query .= "INSERT INTO kurslar(baslik,altBaslik,resim,yayinTarihi,yorumSayisi,begeniSayisi,onay) VALUES('Vue Kursu','ileri seviye vue dersleri','3.jpg','12/10/2023',8,12,1);";

$sonuc = mysqli_multi_query($baglanti, $query);
```

### Açıklama
- Her sorgu `;` ile bitirilmelidir.
- `.=` ile sorgular birleştirilir ve tek bir string haline getirilir.
- `mysqli_multi_query` ile birden fazla sorgu tek seferde veritabanına gönderilir.
- Bu yöntem, toplu veri ekleme veya güncelleme işlemlerinde performans ve kolaylık sağlar.

Bu teknik, birden fazla kayıt eklemek veya güncellemek istediğinizde kodunuzu daha verimli ve okunabilir hale getirir.

---

## Son Eklenen Kayıt ID'sini Almak: mysqli_insert_id

Bir INSERT sorgusundan sonra, veritabanına eklenen son kaydın otomatik artan (auto increment) ID değerini almak için `mysqli_insert_id` fonksiyonu kullanılır.

### Örnek:
```php
$query = "INSERT INTO kurslar(baslik,altBaslik,resim,yayinTarihi,yorumSayisi,begeniSayisi,onay) VALUES('Angular Kursu','ileri seviye angular dersleri','1.jpg','10/10/2023',10,10,1);";
$sonuc = mysqli_query($baglanti, $query);
$inserted_id = mysqli_insert_id($baglanti);

if($sonuc) {
    echo "Kayıt eklendi: son ID " . $inserted_id . "<br>";
} else {
    echo "Kayıt eklenemedi<br>";
}
```

### Açıklama
- `mysqli_insert_id($baglanti)`, son eklenen kaydın ID'sini döndürür.
- Bu değer, genellikle yeni eklenen kaydı başka bir işlemde kullanmak için gereklidir.
- Sadece otomatik artan (auto increment) birincil anahtarı olan tablolarda anlamlıdır.

Bu fonksiyon, özellikle ilişkili tablolarla çalışırken veya yeni eklenen kaydın ID'sine ihtiyaç duyduğunuzda çok kullanışlıdır.

---

## Sonuç Satırlarını Dizi Olarak Almak: mysqli_fetch_row

Bir SELECT sorgusundan dönen sonuçları, her satırı sıralı (indeksli) bir dizi olarak almak için `mysqli_fetch_row` fonksiyonu kullanılır.

### Örnek:
```php
$query = "SELECT * FROM kurslar";
$sonuc = mysqli_query($baglanti, $query);

while($row = mysqli_fetch_row($sonuc)) {
    echo $row[0]." ".$row[1]." ".$row[2];
    echo "<br>";
}
```

### Açıklama
- `mysqli_fetch_row($sonuc)`, her satırı sıralı (0, 1, 2, ...) anahtarlarla bir dizi olarak döndürür.
- Sütunlara indeks numarası ile erişilir: `$row[0]`, `$row[1]`, ...
- Özellikle sütun isimleriyle ilgilenmiyorsanız veya tablo yapısı sabitse kullanışlıdır.
- Alternatif olarak, `mysqli_fetch_assoc` ile anahtar olarak sütun adları kullanılabilir.

Bu fonksiyon, hızlı ve basit veri okuma işlemlerinde tercih edilir.

---

## Kayıtları Filtreleyerek Sorgulama ve Sonuçları Listeleme

Belirli bir kritere göre kayıtları filtrelemek ve sonuçları ekrana yazdırmak için SELECT sorgusunda WHERE ifadesi ve `mysqli_fetch_assoc` fonksiyonu kullanılabilir.

### Örnek:
```php
include "ayar.php";

// $query = "SELECT * from kurslar WHERE id=1";
// $query = "SELECT * from kurslar WHERE id > 1";
// $query = "SELECT * from kurslar WHERE onay=0";
// $query = "SELECT * from kurslar WHERE id>4 and id<7";
// $query = "SELECT * from kurslar WHERE baslik='Php Kursu'";
$query = "SELECT * from kurslar WHERE baslik like '%kurs%' and onay=1";

$sonuc = mysqli_query($baglanti, $query);

if(mysqli_num_rows($sonuc) > 0) {
    while($satir = mysqli_fetch_assoc($sonuc)) {
        echo $satir["id"]." ".$satir["baslik"];
        echo "<br>";
    }
}
else {
    echo "kayıt yok.";
}

mysqli_close($baglanti);
```

### Açıklama
- WHERE ifadesi ile sorguda filtreleme yapılır.
- `mysqli_num_rows($sonuc)` ile sonuçta kayıt olup olmadığı kontrol edilir.
- `mysqli_fetch_assoc($sonuc)` ile her satır anahtar-değer (sütun adı) olarak alınır.
- Sonuçlar ekrana yazdırılır, kayıt yoksa "kayıt yok." mesajı gösterilir.

Bu yöntem, veritabanından belirli kriterlere göre veri çekmek ve listelemek için kullanılır.

---

## Kayıt Güncelleme (UPDATE) İşlemi

Veritabanındaki mevcut kayıtları güncellemek için UPDATE sorgusu ve `mysqli_query` fonksiyonu kullanılır.

### Örnek:
```php
include "ayar.php";

// $query = "UPDATE kurslar SET baslik='Php Dersleri', altBaslik='ileri seviye php dersleri' WHERE id=1";
// $query = "UPDATE kurslar SET onay=1";
$query = "UPDATE kurslar SET resim='1.jpg' WHERE onay=1";

$sonuc = mysqli_query($baglanti, $query);

if($sonuc) {
    echo "veri güncellendi";
} else {
    echo "güncelleme hatası";
}

mysqli_close($baglanti);
```

### Açıklama
- UPDATE sorgusu ile belirli kayıtlar güncellenir.
- WHERE ifadesi ile hangi kayıtların güncelleneceği belirlenir.
- `mysqli_query` ile sorgu çalıştırılır.
- Sonuca göre işlem başarılıysa "veri güncellendi", hata varsa "güncelleme hatası" mesajı gösterilir.

Bu yöntem, veritabanındaki mevcut verileri değiştirmek için kullanılır.

---

## Kayıt Silme (DELETE) İşlemi

Veritabanındaki kayıtları silmek için DELETE sorgusu, `mysqli_query` ve silinen kayıt sayısını öğrenmek için `mysqli_affected_rows` fonksiyonu kullanılır.

### Örnek:
```php
include "ayar.php";

// $query = "DELETE FROM kurslar WHERE id=6";
$query = "DELETE FROM kurslar WHERE id>6 and id<10";

$sonuc = mysqli_query($baglanti, $query);
$adet = mysqli_affected_rows($baglanti);

if($sonuc)  {
    echo "veri silindi: " . $adet;
} else {
    echo "veri silme hatası";
}

mysqli_close($baglanti);
```

### Açıklama
- DELETE sorgusu ile belirli kayıtlar silinir.
- `mysqli_query` ile sorgu çalıştırılır.
- `mysqli_affected_rows($baglanti)` ile kaç kaydın silindiği öğrenilir.
- Sonuca göre işlem başarılıysa silinen kayıt sayısı, hata varsa "veri silme hatası" mesajı gösterilir.

Bu yöntem, veritabanından kayıt silmek ve işlem sonucunu kontrol etmek için kullanılır.

---

## Hazırlanmış Sorgular (Prepared Statements) ile Güvenli Veri Ekleme

Kullanıcıdan alınan verilerle çalışırken SQL injection saldırılarına karşı güvenli olmak için `mysqli_prepare`, `mysqli_stmt_bind_param` ve `mysqli_stmt_execute` fonksiyonları ile hazırlanan sorgular (prepared statements) kullanılmalıdır.

### Örnek:
```php
include "ayar.php";

$baslik = "Angular Kursu";
$altBaslik = "ileri seviye angular dersleri";
$resim = "1.jpg";
$tarih = "10/10/2023";
$yorumSayisi = 10;
$begeniSayisi = 10;
$onay = 1;

$query = "INSERT INTO kurslar(baslik,altBaslik,resim,yayinTarihi,yorumSayisi,begeniSayisi,onay) VALUES(?,?,?,?,?,?,?)";

$stmt = mysqli_prepare($baglanti, $query);

mysqli_stmt_bind_param($stmt, 'ssssiii', $baslik, $altBaslik, $resim, $tarih, $yorumSayisi, $begeniSayisi, $onay);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

echo "veri eklendi";

mysqli_close($baglanti);
```

### Açıklama
- `mysqli_prepare($baglanti, $query)`: Sorguyu hazırlar.
- `mysqli_stmt_bind_param($stmt, 'ssssiii', ...)`: Sorgudaki ? işaretlerine karşılık gelecek değişkenleri ve veri tiplerini belirtir.
- `mysqli_stmt_execute($stmt)`: Sorguyu çalıştırır.
- Bu yöntem, SQL injection'a karşı güvenli bir veri ekleme sağlar.

Hazırlanmış sorgular, özellikle kullanıcıdan alınan verilerle çalışırken güvenlik ve performans açısından önerilir.