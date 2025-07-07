# Uygulama 14: Temel Fonksiyonlar ve Açıklamaları

Bu doküman, uygulama-14'te kullanılan en önemli fonksiyonları ve mantığı özetler.

## 1. Kullanıcı Kaydı
- **Fonksiyon:** Kullanıcı kaydını yönetir, girişleri doğrular, e-posta tekrarını kontrol eder ve kullanıcıyı `users.json` dosyasına kaydeder.
- **Temel Adımlar:**
  - Gerekli alanları (kullanıcı adı, e-posta, şifre, şehir, hobiler) doğrula.
  - E-postanın `users.json` içinde daha önce kayıtlı olup olmadığını kontrol et.
  - Kayıtlı değilse, yeni kullanıcıyı JSON nesnesi olarak ekle.

## 2. Kullanıcı Girişi
- **Fonksiyon:** Kullanıcıyı, bilgilerini `users.json` ile karşılaştırarak doğrular.
- **Temel Adımlar:**
  - Tüm kullanıcıları `users.json` dosyasından oku.
  - Girilen kullanıcı adı ve şifreyi eşleştir.
  - Doğruysa oturumu başlat ve mesaj sayfasına yönlendir.

## 3. JSON Dosya İşlemleri
- **Fonksiyon:** Kullanıcı verilerini kalıcı olarak JSON formatında okur ve yazar.
- **Temel Adımlar:**
  - Kullanıcıları okumak için `json_decode(file_get_contents('users.json'), true)` kullanılır.
  - Kullanıcıları kaydetmek için `file_put_contents('users.json', json_encode($users, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE))` kullanılır.

## 4. Mesaj Gönderme
- **Fonksiyon:** Giriş yapmış kullanıcıların mesaj göndermesini sağlar, mesajları kullanıcı adı ve zaman damgası ile bir metin dosyasına ekler.
- **Temel Adımlar:**
  - Mesaj gönderildiğinde, `dosya2.txt` dosyasına `kullanıcı adı | mesaj | tarih-saat` formatında satır ekle.
  - Tüm mesajları `dosya2.txt` dosyasından göster.

## 5. Oturum Yönetimi
- **Fonksiyon:** PHP oturumları ile giriş yapan kullanıcıyı takip eder ve mesaj gönderme erişimini yönetir.
- **Temel Adımlar:**
  - Girişten sonra kullanıcı adını `$_SESSION['username']` içinde sakla.
  - Mesaj gönderme izni için oturumun varlığını kontrol et.

---
Bu fonksiyonlar birlikte, PHP ve dosya tabanlı depolama ile kayıt, giriş ve mesajlaşma özelliklerine sahip basit bir kullanıcı sistemi sunar.
