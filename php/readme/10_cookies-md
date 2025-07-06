# PHP'de Cookie (Çerez) Kullanımı

## Cookie (Çerez) Nedir?
Cookie, kullanıcının tarayıcısında saklanan küçük veri parçalarıdır. Web uygulamalarında kullanıcıya özel bilgileri (oturum, tercih, kimlik doğrulama vb.) saklamak için kullanılır.

## Cookie Oluşturma
PHP'de cookie oluşturmak için `setcookie()` fonksiyonu kullanılır:

```php
setcookie("anahtar", "deger", sure);
```
- `anahtar`: Cookie'nin adı
- `deger`: Saklanacak bilgi
- `sure`: Cookie'nin geçerlilik süresi (Unix zaman damgası olarak)

Örnek:
```php
setcookie("username", "sadikturan", time() + (60 * 60 * 24)); // 1 gün geçerli
```

## Cookie Okuma
Cookie'ler, sunucuya her istekle birlikte gönderilir ve `$_COOKIE` süper globali ile okunur:
```php
if(isset($_COOKIE["username"])) {
    echo $_COOKIE["username"];
}
```

## Cookie Güncelleme
Aynı isimle tekrar `setcookie()` çağrılırsa, cookie güncellenir:
```php
setcookie("username", "admin", time() + (60 * 60 * 24));
```

## Cookie Silme
Cookie silmek için süresi geçmiş bir zaman verilir:
```php
setcookie("username", "", time() - 3600);
```

## cookies.php Örneği Açıklaması
- `setcookie("username", "sadikturan", ...)` ile bir cookie oluşturuluyor.
- `setcookie("auth", "true", ...)` ile başka bir cookie oluşturuluyor.
- `isset($_COOKIE["username"])` ile cookie'nin varlığı kontrol ediliyor ve değeri ekrana yazdırılıyor.
- Cookie güncellemesi ve silinmesi örnekleniyor.

Cookie'ler, oturum yönetimi ve kullanıcıya özel veri saklama için yaygın olarak kullanılır. Güvenlik için hassas veriler cookie'de saklanmamalıdır.
