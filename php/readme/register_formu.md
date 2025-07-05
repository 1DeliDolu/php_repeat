# Kayıt Formu Açıklaması

Bu form, kullanıcıların sisteme kayıt olmasını sağlar. Formda aşağıdaki alanlar ve kontroller bulunur:

## Alanlar

- **Kullanıcı Adı (username):** Zorunlu alandır. Boş bırakılırsa hata mesajı gösterilir.
- **Eposta (email):** Zorunlu alandır. Boş bırakılırsa hata mesajı gösterilir.
- **Parola (password):** Zorunlu alandır. Boş bırakılırsa hata mesajı gösterilir.
- **Parola Tekrar (repassword):** Parola ile aynı olmalıdır. Eşleşmezse hata mesajı gösterilir.
- **Şehir (city):** Açılır menüden seçilir. Seçilmezse hata mesajı gösterilir.
- **Hobiler (hobbies):** Bir veya daha fazla hobi seçilmelidir. Hiçbiri seçilmezse hata mesajı gösterilir.

## Formun İşleyişi

- Form gönderildiğinde (`POST`), her alan için doğrulama yapılır.
- Hatalı veya eksik alanlar için ilgili hata mesajı formda gösterilir.
- Doğru girilen alanlar formda tekrar doldurulmuş olarak kalır.
- Hobi seçimleri çoklu seçim (checkbox) ile yapılır ve önceki seçimler korunur.
- Şehir seçimi açılır menü ile yapılır ve önceki seçim korunur.

## Kullanılan Değişkenler

- `$username`, `$email`, `$password`, `$repassword`, `$city`, `$hobbies`: Formdan gelen veriler.
- `$usernameErr`, `$emailErr`, `$passwordErr`, `$repasswordErr`, `$cityErr`, `$hobbiesErr`: Hata mesajları.
- `$sehirler`, `$hobiler`: Şehir ve hobi seçeneklerini tutan diziler (libs/variables.php dosyasından gelir).

## Güvenlik

- Tüm girişler `safe_html()` fonksiyonu ile XSS'e karşı filtrelenir.

## Örnek Kullanım

Formu doldurup gönderdiğinizde, eksik veya hatalı alanlar için uyarı alırsınız. Tüm alanlar doğruysa, bilgiler işlenir.

---

**Not:**
Bu formun çalışabilmesi için `libs/variables.php` ve `libs/functions.php` dosyalarının bulunması gereklidir.
