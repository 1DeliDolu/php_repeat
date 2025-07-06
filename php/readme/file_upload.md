# PHP'de Dosya Yükleme Açıklaması

Bu bölümde, bir dosyanın PHP ile nasıl yüklendiği ve yükleme sırasında hangi kontrollerin yapıldığı anlatılmaktadır.

## Dosya Yükleme Adımları

1. **Formdan Dosya Seçimi:**
   - Kullanıcı, HTML formunda `<input type="file" name="dosya">` ile bir dosya seçer.
   - Formun `enctype` özelliği `multipart/form-data` olmalıdır.

2. **Dosya Bilgilerinin Alınması:**
   - PHP'de yüklenen dosya bilgileri `$_FILES` süper globali ile alınır.
   - Örneğin: `$_FILES['dosya']['name']`, `$_FILES['dosya']['tmp_name']`, `$_FILES['dosya']['size']`, `$_FILES['dosya']['type']`

3. **Kontroller:**
   - **Dosya Seçilmiş mi?**
     - `isset($_FILES['dosya'])` veya `$_FILES['dosya']['error'] == 0` ile kontrol edilir.
   - **Dosya Boyutu:**
     - Maksimum dosya boyutu kontrol edilir. Örneğin: `$_FILES['dosya']['size'] < 2 * 1024 * 1024` (2 MB sınırı)
   - **Dosya Türü:**
     - Yalnızca belirli uzantılara veya MIME türlerine izin verilir. Örneğin: `in_array($uzanti, $izinli_uzantilar)`
   - **Hata Kontrolü:**
     - `$_FILES['dosya']['error']` değeri kontrol edilir. 0 ise hata yoktur.
   - **Aynı İsimde Dosya Var mı?**
     - Hedef klasörde aynı isimde dosya olup olmadığı kontrol edilir.

4. **Dosyanın Taşınması:**
   - Dosya, geçici dizinden kalıcı dizine `move_uploaded_file()` fonksiyonu ile taşınır.
   - Örnek: `move_uploaded_file($_FILES['dosya']['tmp_name'], 'uploads/' . $yeni_dosya_adi);`

5. **Başarılı Yükleme ve Mesajlar:**
   - Yükleme başarılıysa kullanıcıya bilgi verilir.
   - Hata varsa uygun hata mesajı gösterilir.

## Sık Kullanılan Fonksiyon ve Değişkenler

- **implode()**: Bir dizi elemanlarını birleştirerek tek bir string haline getirir. Genellikle kabul edilen dosya uzantılarını virgül ile ayırmak için kullanılır.
  - Örnek: `implode(",", $izinli_uzantilar)` çıktısı: `jpg,png`
- **$_FILES['dosya']['tmp_name']**: Yüklenen dosyanın geçici olarak saklandığı sunucu üzerindeki dosya yolunu belirtir. Dosya kalıcı olarak taşınmadan önce bu yoldadır.
- **$_FILES['dosya']['size']**: Yüklenen dosyanın bayt cinsinden boyutunu verir. Dosya boyutu kontrolü için kullanılır.
- **isset()**: Bir değişkenin tanımlı olup olmadığını ve null olup olmadığını kontrol eder. Dosya yükleme işlemlerinde formdan dosya seçilip seçilmediğini kontrol etmek için kullanılır.
- **$_FILES['dosya']['name']**: Yüklenen dosyanın orijinal adını verir. Dosya uzantısı kontrolü veya yeni dosya adı oluşturmak için kullanılır.
- **$_FILES['dosya']['type']**: Yüklenen dosyanın MIME türünü belirtir. Dosya türü kontrolü için kullanılabilir.
- **in_array()**: Bir değerin bir dizi içinde olup olmadığını kontrol eder. Dosya uzantısının izin verilenler arasında olup olmadığını kontrol etmek için kullanılır.
  - Örnek: `in_array($uzanti, $izinli_uzantilar)`
- **count()**: Bir dizideki eleman sayısını döndürür. Yüklenen dosya sayısını veya uzantı listesinin uzunluğunu kontrol etmek için kullanılabilir.
  - Örnek: `count($izinli_uzantilar)`
- **move_uploaded_file()**: Yüklenen dosyayı geçici dizinden kalıcı bir dizine taşır. Dosya yükleme işleminin en önemli adımıdır.
  - Örnek: `move_uploaded_file($_FILES['dosya']['tmp_name'], 'uploads/' . $yeni_dosya_adi);`

## Güvenlik Notları
- Yalnızca izin verilen dosya türlerine ve boyutuna izin verin.
- Dosya adını kullanıcıdan doğrudan almayın, rastgele veya güvenli bir ad üretin.
- Yüklenen dosyaları herkese açık bir dizinde saklıyorsanız, çalıştırılabilir dosya yüklenmesini engelleyin.

---

**Not:** Kodun doğru çalışabilmesi için formun enctype özelliği `multipart/form-data` olmalıdır ve dosya yükleme işlemleri sırasında yukarıdaki kontroller mutlaka yapılmalıdır.
