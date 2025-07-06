# Uygulama 13: PHP Session Kullanımı

Bu dökümantasyon, uygulama-13 projesinde kullanılan fonksiyonlar ve metotlar hakkında bilgi vermektedir. Uygulama, PHP'de oturum (session) yönetimini örneklemektedir.

## Genel Açıklama
Bu uygulamada, kullanıcı oturumları başlatılır, oturum değişkenleri atanır, okunur ve silinir. Ayrıca oturumun tamamen sonlandırılması işlemleri de örneklenmiştir.

## Fonksiyonlar ve Metotlar

### 1. `session_start()`
- **Açıklama:** PHP oturumunu başlatır veya mevcut oturumu devam ettirir.
- **Kullanım:** Tüm oturum işlemlerinden önce çağrılmalıdır.

### 2. `$_SESSION` Süper Globali
- **Açıklama:** Oturum değişkenlerini saklamak ve erişmek için kullanılır.
- **Kullanım:**
  - Değişken atama: `$_SESSION['anahtar'] = 'değer';`
  - Değişken okuma: `$deger = $_SESSION['anahtar'];`
  - Değişken silme: `unset($_SESSION['anahtar']);`

### 3. `session_unset()`
- **Açıklama:** Tüm oturum değişkenlerini siler, ancak oturumu sonlandırmaz.
- **Kullanım:** `session_unset();`

### 4. `session_destroy()`
- **Açıklama:** Mevcut oturumu tamamen sonlandırır ve tüm oturum verilerini siler.
- **Kullanım:** `session_destroy();`

## Giriş İşlemi Örnek Kod

Aşağıda, kullanıcı giriş işlemi sırasında session ve cookie kullanımını gösteren bir örnek kod parçası yer almaktadır:

```php
session_start();

if(isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if($username == db_user["username"] && $password == db_user["password"]) {
        setcookie("auth[username]", db_user["username"], time() + (60 * 60 * 24));
        setcookie("auth[name]", db_user["name"], time() + (60 * 60 * 24));
        $_SESSION["message"] = $username." ile hesaba giriş yapıldı";
        header("Location: index.php");
    } else {
        echo "<div class='alert alert-danger mb-0 text-center'>Yanlış username ya da parola</div>";
    }
}
```

## Örnek Kod Parçaları

```php
// Oturumu başlat
session_start();

// Oturum değişkeni oluştur
$_SESSION['kullanici'] = 'Ali';

// Oturum değişkenini oku
echo $_SESSION['kullanici'];

// Oturum değişkenini sil
unset($_SESSION['kullanici']);

// Tüm oturum değişkenlerini sil
session_unset();

// Oturumu tamamen sonlandır
session_destroy();
```

## Notlar
- Oturum başlatılmadan (`session_start()`) oturum değişkenlerine erişilemez.
- Oturum sonlandırıldıktan sonra, yeni bir oturum başlatılana kadar oturum değişkenleri kullanılamaz.

