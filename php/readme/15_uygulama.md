# Uygulama 15: Admin Paneli Navigasyon Güncellemesi

Navigasyon menüsüne aşağıdaki bağlantılar eklendi:

- **Admin Categories:** Kategori yönetim sayfasına hızlı erişim sağlar.
- **Admin Courses:** Kurs yönetim sayfasına hızlı erişim sağlar.

Bu sayede, admin kullanıcıları kategorileri ve kursları kolayca yönetebilir.

Eklenen kod:
```html
<li class="nav-item">
    <a href="admin-categories.php" class="nav-link">Admin Categories</a>
</li>
<li class="nav-item">
    <a href="admin-courses.php" class="nav-link">Admin Courses</a>
</li>
```

---

## getCategories() Fonksiyonu

Aşağıdaki fonksiyon, veritabanındaki tüm kategorileri çekmek için kullanılır:

```php
function getCategories() {
    include "ayar.php";

    $query = "SELECT * from kategoriler";
    $sonuc = mysqli_query($baglanti,$query);
    mysqli_close($baglanti);
    return $sonuc;
}
```

### Açıklama
- `include "ayar.php";` ile veritabanı bağlantısı sağlanır.
- `SELECT * from kategoriler` sorgusu ile tüm kategoriler çekilir.
- `mysqli_query` ile sorgu çalıştırılır ve sonuç döndürülür.
- Bağlantı kapatılır ve sonuç fonksiyonun çağrıldığı yere döndürülür.
- Bu fonksiyon, kategori listesini göstermek veya yönetmek için kullanılır.

---

## Kategori Listeleme Tablosu

Aşağıdaki kod, admin panelinde kategorileri tablo halinde listelemek için kullanılır:

```php
<table class="table table-bordered">
    <thead>
        <tr>
            <th style="width:50px;">Id</th>
            <th>Kategori Adı</th>
            <th style="width:130px;"></th>
        </tr>
    </thead>
    <tbody>
        <?php $sonuc = getCategories(); while($category = mysqli_fetch_assoc($sonuc)): ?>
            <tr>
                <td><?php echo $category["id"]?></td>
                <td><?php echo $category["kategori_adi"]?></td>
                <td>
                    <a href="category-edit.php?id=<?php echo $category["id"];?>" class="btn btn-primary btn-sm">Edit</a>
                    <a href="category-delete.php?id=<?php echo $category["id"];?>" class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>
```

### Açıklama
- `getCategories()` fonksiyonu ile tüm kategoriler veritabanından çekilir.
- `mysqli_fetch_assoc($sonuc)` ile her kategori satırı alınır.
- Tablo satırlarında kategori id ve adı gösterilir.
- Her satırda "Edit" ve "Delete" butonları ile kategori düzenleme ve silme işlemleri yapılabilir.
- Bu yapı, admin panelinde kategori yönetimini kolaylaştırır.

---

## Kategori Ekle Butonu

Aşağıdaki kod, admin panelinde yeni bir kategori eklemek için kullanılan "Kategori Ekle" butonunu oluşturur:

```html
<div class="border p-2 mb-2">
    <a href="category-create.php" class="btn btn-primary">Kategori Ekle</a>
</div>
```

### Açıklama
- "Kategori Ekle" butonuna tıklandığında, kullanıcıyı yeni bir kategori ekleme sayfasına (`category-create.php`) yönlendirir.
- Buton, üstünde kenarlık ve boşluk (padding, margin) olan bir div içinde yer alır.
- Bu yapı, admin panelinde kategori ekleme işlemini kolaylaştırır.

---

## createCategory() Fonksiyonu

Aşağıdaki fonksiyon, veritabanına yeni bir kategori eklemek için kullanılır:

```php
function createCategory(string $kategori) {
    include "ayar.php";

    $query = "INSERT INTO kategoriler(kategori_adi) VALUES (?)";
    $stmt = mysqli_prepare($baglanti,$query);

    mysqli_stmt_bind_param($stmt, 's', $kategori);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    return $stmt;
}
```

### Açıklama
- `include "ayar.php";` ile veritabanı bağlantısı sağlanır.
- Sorgu, hazırlanan sorgu (prepared statement) olarak yazılır ve SQL injection'a karşı güvenlidir.
- `mysqli_prepare` ile sorgu hazırlanır.
- `mysqli_stmt_bind_param` ile kategori adı parametre olarak bağlanır.
- `mysqli_stmt_execute` ile sorgu çalıştırılır ve yeni kategori eklenir.
- Fonksiyon, ekleme işleminin sonucunu döndürür.
- Bu yöntem, kullanıcıdan alınan verilerle güvenli şekilde kategori eklemek için kullanılır.

---

## category-create.php Dosyası Özeti

Bu dosya, admin panelinde yeni bir kategori eklemek için kullanılır:
- Kullanıcıdan kategori adı alınır.
- Boş bırakılırsa hata mesajı gösterilir.
- Doğru girilirse createCategory fonksiyonu ile veritabanına eklenir.
- Başarılı ekleme sonrası kullanıcı admin-categories.php sayfasına yönlendirilir ve başarı mesajı gösterilir.

Form kodu örneği:
```php
<form action="category-create.php" method="post">
    <div class="mb-3">
        <label for="category">Kategori Adı</label>
        <input type="text" name="category" class="form-control" value="<?php echo $category;?>">
        <div class="text-danger"><?php echo $categoryErr; ?></div>
    </div>
    <button type="submit" class="btn btn-primary">Kaydet</button>
</form>
```

---

## deleteCategory() Fonksiyonu

Aşağıdaki fonksiyon, veritabanından belirtilen ID'ye sahip kategoriyi silmek için kullanılır:

```php
function deleteCategory(int $id) {
    include 'ayar.php';

    $query = "DELETE FROM kategoriler WHERE id=$id";
    $sonuc = mysqli_query($baglanti,$query);
    mysqli_close($baglanti);
    return $sonuc;
}
```

### Açıklama
- `include 'ayar.php';` ile veritabanı bağlantısı sağlanır.
- `DELETE FROM kategoriler WHERE id=$id` sorgusu ile ilgili kategori silinir.
- `mysqli_query` ile sorgu çalıştırılır.
- Bağlantı kapatılır ve işlem sonucu döndürülür.
- Bu fonksiyon, admin panelinde kategori silme işlemlerinde kullanılır.

---

## admin-courses.php Dosyası Özeti

Bu dosya, admin panelinde kursları tablo halinde listelemek ve yönetmek için kullanılır:
- Tüm kurslar getCourses(false, false) ile çekilir.
- Her kursun id, resim, başlık, kategorileri, onay ve anasayfa durumu gösterilir.
- Kategoriler, getCategoriesByCourseId fonksiyonu ile listelenir.
- Her kurs satırında "Edit" ve "Delete" butonları ile düzenleme ve silme işlemleri yapılabilir.
- Üstte "Kurs Ekle" butonu ile yeni kurs ekleme sayfasına gidilebilir.

Tablo kodu örneği:
```php
<table class="table table-bordered">
    <thead>
        <tr>
            <th style="width:50px;">Id</th>
            <th style="width:120px;">Resim</th>
            <th>Başlık</th>
            <th style="width:200px;">Kategori</th>
            <th style="width:50px;">Onay</th>
            <th style="width:50px;">Anasayfa</th>
            <th style="width:130px;"></th>
        </tr>
    </thead>
    <tbody>
        <?php $sonuc = getCourses(false,false); while($course = mysqli_fetch_assoc($sonuc)): ?>
            <tr>
                <td><?php echo $course["id"]?></td>
                <td><img class="img-fluid" src="img/<?php echo $course["resim"] ?>" alt=""></td>
                <td><?php echo $course["baslik"]?></td>
                <td>
                    <?php
                        echo "<ul>";
                        $result = getCategoriesByCourseId($course["id"]);
                        if(mysqli_num_rows($result) > 0) {
                            while($category = mysqli_fetch_assoc($result)) {
                                echo "<li>".$category["kategori_adi"]."</li>";
                            }
                        } else {
                            echo "<li>Kategori seçilmedi</li>";
                        }
                        echo "</ul>";
                    ?>
                </td>
                <td>
                    <?php if ($course["onay"]): ?>
                        <i class="fas fa-check"></i>
                    <?php else: ?>
                        <i class="fas fa-times"></i>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if ($course["anasayfa"]): ?>
                        <i class="fas fa-check"></i>
                    <?php else: ?>
                        <i class="fas fa-times"></i>
                    <?php endif; ?>
                </td>
                <td>
                    <a href="course-edit.php?id=<?php echo $course["id"];?>" class="btn btn-primary btn-sm">Edit</a>
                    <a href="course-delete.php?id=<?php echo $course["id"];?>" class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>
```

### Açıklama
- Kurslar ve ilişkili kategoriler listelenir.
- Onay ve anasayfa durumu ikonlarla gösterilir.
- Her kurs için düzenleme ve silme işlemleri yapılabilir.
- "Kurs Ekle" butonu ile yeni kurs eklenebilir.

---

## course-create.php Dosyası Özeti

Bu dosya, admin panelinde yeni bir kurs eklemek için kullanılır:
- Kullanıcıdan başlık, alt başlık, açıklama ve resim alınır.
- Her alan için doğrulama yapılır, eksikse hata mesajı gösterilir.
- Resim dosyası yüklenir (uploadImage fonksiyonu ile).
- Tüm alanlar doğruysa createCourse fonksiyonu ile kurs veritabanına eklenir.
- Başarılı ekleme sonrası kullanıcı admin-courses.php sayfasına yönlendirilir ve başarı mesajı gösterilir.

Form kodu örneği:
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
        <textarea name="aciklama" class="form-control"><?php echo $aciklama;?></textarea>
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

## createCourse() Fonksiyonu

Aşağıdaki fonksiyon, veritabanına yeni bir kurs eklemek için kullanılır:

```php
function createCourse(string $baslik, string $altBaslik, string $aciklama, string $resim, int $yorumSayisi = 0, int $begeniSayisi = 0, int $onay = 0) {
    include "ayar.php";

    $query = "INSERT INTO kurslar(baslik,altBaslik,aciklama,resim,yorumSayisi,begeniSayisi,onay) VALUES (?,?,?,?,?,?,?)";
    $stmt = mysqli_prepare($baglanti, $query);

    mysqli_stmt_bind_param($stmt, 'ssssiii', $baslik, $altBaslik, $aciklama, $resim, $yorumSayisi, $begeniSayisi, $onay);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    return $stmt;
}
```

### Açıklama
- `include "ayar.php";` ile veritabanı bağlantısı sağlanır.
- Sorgu, hazırlanan sorgu (prepared statement) olarak yazılır ve SQL injection'a karşı güvenlidir.
- `mysqli_prepare` ile sorgu hazırlanır.
- `mysqli_stmt_bind_param` ile kurs bilgileri parametre olarak bağlanır.
- `mysqli_stmt_execute` ile sorgu çalıştırılır ve yeni kurs eklenir.
- Fonksiyon, ekleme işleminin sonucunu döndürür.
- Bu yöntem, kullanıcıdan alınan verilerle güvenli şekilde kurs eklemek için kullanılır.

---

## uploadImage() Fonksiyonu

Aşağıdaki fonksiyon, yüklenen resmi sunucudaki img klasörüne kaydetmek için kullanılır:

```php
function uploadImage(array $file) {
    if(isset($file)) {
        $dest_path = "./img/";
        $filename = $file["name"];
        $fileSourcePath = $file["tmp_name"];
        $fileDestPath = $dest_path.$filename;

        move_uploaded_file($fileSourcePath, $fileDestPath);
    }
}
```

### Açıklama
- `$file` parametresi, yüklenen dosyanın bilgilerini içerir (genellikle `$_FILES["imageFile"]`).
- Dosya, sunucuda `img` klasörüne taşınır.
- `move_uploaded_file` fonksiyonu ile dosya güvenli şekilde kaydedilir.
- Bu fonksiyon, kurs eklerken veya güncellerken resim yükleme işlemlerinde kullanılır.

---

## Kısa Özet ve İpucu (Türkçe)

- Tablo sütununun adı **kategori_id** (doğru yazım bu!).
- Doğru ekleme komutu:

  ```sql
  INSERT INTO kurs_kategori (kurs_id, kategori_id) VALUES (4, 3);
  ```

- SQL’de sütun adlarını harf harfine doğru yazmalısın. Bir harf hatası bile hata verir.

---

## Kategori Seçimi İçin PHP Kod Örneği

```php
<?php
    if(isset(
        $_GET["categoryid"]) && is_numeric($_GET["categoryid"])) {
        $secilenKategori = $_GET["categoryid"];
    }
?>
```

---

## getCategoriesByCourseId Fonksiyonu

```php
function getCategoriesByCourseId(int $courseId) {
    include "ayar.php";
    $query = "SELECT * FROM `kurs_kategori` kc inner join kategoriler c on kc.kategori_id = c.id WHERE kc.kurs_id=$courseId";
    $sonuc = mysqli_query($baglanti,$query);
    mysqli_close($baglanti);
    return $sonuc;
}
```

**Açıklama:**
- Bu fonksiyon, verilen kursun (courseId) ait olduğu tüm kategorileri veritabanından çeker.
- `kurs_kategori` tablosu ile `kategoriler` tablosu birleştirilir ve ilgili kursun kategorileri döndürülür.
- Sonuç, kategori yönetimi veya kurs detaylarında kategori listesini göstermek için kullanılır.
