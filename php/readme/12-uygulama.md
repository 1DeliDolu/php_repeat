# PHP Uygulama 12: Cookie ile Kimlik Doğrulama ve Yönlendirme

Bu uygulamada, kullanıcı girişinde `setcookie` fonksiyonu ile bir "auth" parametresi oluşturulmakta ve başarılı giriş sonrası kullanıcı başka bir sayfaya yönlendirilmektedir.

## setcookie Kullanımı
`setcookie()` fonksiyonu ile tarayıcıya bir çerez (cookie) gönderilir. Örneğin:
```php
setcookie("auth", "true", time() + 3600); // 1 saat geçerli auth çerezi
```
- "auth" parametresi, kullanıcının doğrulandığını göstermek için kullanılır.

## header ile Yönlendirme
Kullanıcı doğrulandıktan sonra başka bir sayfaya yönlendirmek için `header('Location: hedef_sayfa.php')` kullanılır:
```php
header("Location: dashboard.php");
exit;
```
- Bu kod, HTTP başlığı ile tarayıcıyı belirtilen sayfaya yönlendirir.
- `exit;` komutu, yönlendirme sonrası kodun çalışmasını durdurur.

## isset() Fonksiyonu
`isset()` fonksiyonu, bir değişkenin tanımlı olup olmadığını ve null olup olmadığını kontrol eder. Cookie veya form verisi gibi değerlerin varlığını kontrol etmek için kullanılır.

Örnek kullanım:
```php
if(isset($_COOKIE["auth"])) {
    // Kullanıcı giriş yapmış
}
```
- Bu örnekte, "auth" çerezi tanımlıysa kullanıcı giriş yapmış kabul edilir.

## Navbar'da Cookie Kontrolü ile Kullanıcı Bilgisi Gösterme

Aşağıdaki kod parçası, kullanıcının giriş yapıp yapmadığını kontrol ederek navbar'da uygun bağlantıları gösterir:

```php
<?php if(isset($_COOKIE["auth"])): ?>
    <li class="nav-item">
        <a href="logout.php" class="nav-link">Logout</a>
    </li>
    <li class="nav-item">
        <a href="login.php" class="nav-link">Hoş geldiniz, <?php echo $_COOKIE["auth"]["name"] ?></a>
    </li>
<?php else: ?>   
    <li class="nav-item">
        <a href="login.php" class="nav-link">Login</a>
    </li>
    <li class="nav-item">
        <a href="register.php" class="nav-link">Register</a>
    </li>
<?php endif; ?>   
```

### Açıklama
- `isset($_COOKIE["auth"])` ile kullanıcı giriş yapmış mı kontrol edilir.
- Giriş yapılmışsa "Logout" ve "Hoş geldiniz, [kullanıcı adı]" bağlantıları gösterilir.
- Giriş yapılmamışsa "Login" ve "Register" bağlantıları gösterilir.
- `$_COOKIE["auth"]["name"]` ile çerezdeki kullanıcı adı ekrana yazdırılır (dizisel cookie için, genellikle JSON veya serialize ile saklanır; düz string ise doğrudan yazılır).

Bu yapı, kullanıcıya göre dinamik menü oluşturmak için kullanılır.

## Özet Akış
1. Kullanıcı giriş formunu doldurur.
2. Bilgiler doğruysa `setcookie("auth", "true", ...)` ile oturum başlatılır.
3. Ardından `header("Location: ...")` ile kullanıcı korumalı sayfaya yönlendirilir.
4. Diğer sayfalarda `isset($_COOKIE["auth"])` ile kullanıcının giriş yapıp yapmadığı kontrol edilir.

Bu yöntemle basit bir oturum yönetimi ve sayfa yönlendirme işlemi gerçekleştirilir.

## Çıkış (Logout) İşlemi
Aşağıdaki kod, kullanıcı çıkış yaptığında auth cookie'lerini siler ve login sayfasına yönlendirir:

```php
<?php
    setcookie("auth[username]", "", time() - (60 * 60 * 24));
    setcookie("auth[name]", "", time() - (60 * 60 * 24));
    header("Location: login.php");
?>
```

### Açıklama
- `setcookie("auth[username]", "", time() - (60 * 60 * 24));` ile username bilgisini içeren cookie silinir.
- `setcookie("auth[name]", "", time() - (60 * 60 * 24));` ile name bilgisini içeren cookie silinir.
- Cookie silmek için geçmiş bir zaman damgası verilir.
- Ardından `header("Location: login.php")` ile kullanıcı login sayfasına yönlendirilir.

Bu yöntemle kullanıcı güvenli şekilde sistemden çıkış yapmış olur.
