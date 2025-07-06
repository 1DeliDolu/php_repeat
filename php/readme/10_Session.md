# PHP'de Session (Oturum) Kullanımı

## Session Nedir?
Session (oturum), kullanıcıya özel verilerin sunucu tarafında saklanmasını sağlayan bir mekanizmadır. Kullanıcı tarayıcıyı kapatana veya oturumu sonlandırana kadar veriler sunucuda tutulur.

## Temel Session Fonksiyonları
- `session_start()`: Oturumu başlatır veya mevcut oturumu devam ettirir. Her session işlemi öncesi çağrılmalıdır.
- `$_SESSION`: Session verilerini saklamak ve erişmek için kullanılan süper global dizidir.
- `unset($_SESSION["anahtar"])`: Belirli bir session değişkenini siler.
- `session_unset()`: Tüm session değişkenlerini siler, ancak oturumu sonlandırmaz.
- `$_SESSION = [];`: Tüm session verilerini boşaltır.

## set-sessions.php Açıklaması
```php
session_start();
$_SESSION["username"] = "mustafa_oezdemir";
$_SESSION["password"] = "q";
```
- Oturum başlatılır ve iki anahtar-değer çifti session'a eklenir.

## get-sessions.php Açıklaması
```php
session_start();
// unset($_SESSION["username"]);
// session_unset();
$_SESSION  = [];

if(isset($_SESSION["username"])) {
    echo $_SESSION["username"];
} else {
    echo "username yok";
}
echo $_SESSION["password"];
print_r($_SESSION);
```
- Oturum başlatılır.
- (Yorum satırında) Belirli bir session veya tüm session'lar silinebilir.
- `$_SESSION = [];` ile tüm session verileri temizlenir.
- `isset()` ile bir session değişkeninin varlığı kontrol edilir.
- Session verileri ekrana yazdırılır.

## Notlar
- Session'lar, kullanıcıya özel ve güvenli veri saklamak için kullanılır.
- Session işlemlerinde mutlaka `session_start()` kullanılmalıdır.
- Session verileri sunucu tarafında saklandığı için cookie'lere göre daha güvenlidir.
