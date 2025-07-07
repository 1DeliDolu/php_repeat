# Uygulama 16: Kurs Ekleme Formu ve CKEditor 5 Entegrasyonu

Bu uygulamada, admin panelinde yeni bir kurs eklemek için bir form oluşturulmuş ve açıklama alanında CKEditor 5 kullanılmıştır.

## Amaç
- Admin panelinde yeni kurs eklemek.
- Form doğrulaması yapmak (başlık, alt başlık, açıklama, resim zorunlu).
- Açıklama alanında zengin metin düzenleyici (CKEditor 5) kullanmak.
- Resim yükleme işlemini gerçekleştirmek.
- Kurs başarıyla eklendiğinde kullanıcıyı admin-courses.php sayfasına yönlendirmek.

## Kullanılan Fonksiyonlar
- **createCourse()**: Yeni kursu veritabanına ekler.
- **uploadImage()**: Yüklenen resmi sunucudaki img klasörüne kaydeder.
- **safe_html()**: Formdan gelen verileri güvenli hale getirir.

## Form Akışı
1. Kullanıcı başlık, alt başlık, açıklama ve resim alanlarını doldurur.
2. Açıklama alanı CKEditor 5 ile zengin metin olarak düzenlenebilir.
3. Form gönderildiğinde, her alan için doğrulama yapılır. Eksik alan varsa hata mesajı gösterilir.
4. Resim seçilmişse sunucuya yüklenir.
5. Tüm alanlar doğruysa createCourse fonksiyonu ile kurs eklenir.
6. Başarılı ekleme sonrası kullanıcı admin-courses.php sayfasına yönlendirilir ve başarı mesajı gösterilir.

## CKEditor 5 Entegrasyonu
- partials/_editor.php dosyasında CKEditor 5 CDN ve başlatma kodu eklenmiştir.
- Açıklama textarea'sı id="aciklama" olarak ayarlanmıştır.
- CKEditor 5, bu textarea üzerinde otomatik olarak başlatılır.

### CKEditor 5 Başlatma Kodu Örneği
```html
<!-- CKEditor 5 CDN CSS -->
<link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/45.2.1/ckeditor5.css" />
<!-- CKEditor 5 CDN JS -->
<script src="https://cdn.ckeditor.com/ckeditor5/45.2.1/ckeditor5.umd.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const { ClassicEditor, Essentials, Bold, Italic, Font, Paragraph } = CKEDITOR;
        const aciklamaField = document.querySelector('#aciklama');
        if (aciklamaField) {
            ClassicEditor.create(aciklamaField, {
                plugins: [ Essentials, Bold, Italic, Font, Paragraph ],
                toolbar: [
                    'undo', 'redo', '|', 'bold', 'italic', '|',
                    'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
                ]
            }).catch(error => { console.error(error); });
        }
    });
</script>
```

## Örnek Form Kodu
```php
<form method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="baslik">Başlık</label>
        <input type="text" name="baslik" class="form-control" value="<?php echo $baslik;?>">
        <div class="text-danger"><?php echo $baslikErr; ?></div>
    </div>
    <div class="mb-3">
        <label for="altBaslik">Alt Başlık</label>
        <input name="altBaslik" class="form-control" value="<?php echo $altBaslik;?>">
        <div class="text-danger"><?php echo $altBaslikErr; ?></div>
    </div>
    <div class="mb-3">
        <label for="aciklama">Açıklama</label>
        <textarea name="aciklama" id="aciklama" class="form-control"><?php echo $aciklama;?></textarea>
        <div class="text-danger"><?php echo $aciklamaErr; ?></div>
    </div>
    <div class="input-group mb-3">
        <input type="file" name="imageFile" id="imageFile" class="form-control">
        <label for="imageFile" class="input-group-text">Yükle</label>
    </div>
    <div class="text-danger"><?php echo $resimErr; ?></div>
    <button type="submit" class="btn btn-primary">Kaydet</button>
</form>
```

---

## Kullanıcı Adı (Username) Doğrulama Kodu

Aşağıdaki kod, kullanıcıdan alınan username bilgisinin doğrulanmasını sağlar:

```php
if(empty($_POST["username"])) {
    $usernameErr = "username gerekli alan.";
} elseif(strlen($_POST["username"]) < 5 or strlen($_POST["username"]) > 20) {
    $usernameErr = "username 5-20 karakter aralığında olmalıdır.";
} elseif(!preg_match('/^[A-Za-z][A-ZaZ0-9]{5,31}$/', $_POST["username"])) {
    $usernameErr = "username sadece rakam, harf ve alt çizgi karakterlerinden olmalıdır.";
}
```

### Açıklama
- Kullanıcı adı boş bırakılırsa hata mesajı gösterilir.
- Kullanıcı adı 5-20 karakter aralığında olmalıdır, aksi halde hata mesajı verilir.
- Kullanıcı adı sadece harf ve rakamlarla başlamalı, devamında harf, rakam veya alt çizgi karakteri içerebilir.
- Kurallara uymayan girişlerde uygun hata mesajı kullanıcıya gösterilir.
- Bu doğrulama, formun güvenli ve doğru şekilde doldurulmasını sağlar.

---

## Kullanıcı Kaydı ve Veritabanına Ekleme Kodu

Aşağıdaki kod, doğrulama sonrası yeni kullanıcıyı veritabanına ekler:

```php
if($stmt = mysqli_prepare($baglanti, $sql)) {
    $param_username = $username;
    $param_email = $email;
    $param_password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sss", $param_username, $param_email, $param_password);

    if(mysqli_stmt_execute($stmt)) {
        header("Location: login.php");
    } else {
        echo mysqli_error($baglanti);
        echo "<br>";
        echo "hata oluştu";
    }
}
```

### Açıklama
- Kullanıcı adı, e-posta ve parola değişkenleri hazırlanır.
- Parola, güvenlik için `password_hash` fonksiyonu ile hashlenir.
- `mysqli_prepare` ile SQL sorgusu hazırlanır ve parametreler bağlanır.
- `mysqli_stmt_execute` ile sorgu çalıştırılır ve kullanıcı veritabanına eklenir.
- Kayıt başarılıysa kullanıcı login.php sayfasına yönlendirilir.
- Hata oluşursa, hata mesajı ekrana yazdırılır.
- Bu yöntem, SQL injection'a karşı güvenli ve modern bir kullanıcı kayıt işlemidir.

---

## Kullanıcı Giriş ve Yetki Kontrol Fonksiyonları

Aşağıdaki fonksiyonlar, oturum (session) üzerinden kullanıcının giriş yapıp yapmadığını ve admin olup olmadığını kontrol eder:

```php
function isLoggedIn() {
    return (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] == true);    
}

function isAdmin() {
    return (isLoggedIn() && isset($_SESSION["user_type"]) && $_SESSION["user_type"] == "admin");    
}
```

### Açıklama
- **isLoggedIn()**: Kullanıcının oturum açıp açmadığını kontrol eder. `$_SESSION["loggedIn"]` değişkeni true ise kullanıcı giriş yapmıştır.
- **isAdmin()**: Kullanıcı giriş yaptıysa ve `$_SESSION["user_type"]` değeri "admin" ise, kullanıcının admin yetkisi olduğunu döndürür.
- Bu fonksiyonlar, sayfa erişimlerinde veya admin paneli gibi özel alanlarda yetki kontrolü için kullanılır.

Bu uygulama ile admin panelinde modern ve kullanışlı bir kurs ekleme deneyimi sağlanmıştır.

