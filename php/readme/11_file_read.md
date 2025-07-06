# Bölüm 11: PHP Dosya Okuma Yöntemleri ve Fonksiyonları

Bu dokümantasyon, bolum-11'de PHP'de dosya okuma için kullanılan temel yöntem ve fonksiyonları kapsar.

## Fonksiyonlar ve Yöntemler

### 1. `fopen()`
- **Açıklama:** Bir dosya veya URL açar.
- **Kullanım:** `$handle = fopen('dosyaadi.txt', 'r');`
- **Parametreler:**
    - Dosya adı (string)
    - Mod (string, örn: 'r' okuma için)

### 2. `fgets()`
- **Açıklama:** Açık bir dosya işaretçisinden bir satır okur.
- **Kullanım:** `$line = fgets($handle);`

### 3. `fread()`
- **Açıklama:** Bir dosyadan belirtilen bayt sayısına kadar okur.
- **Kullanım:** `$content = fread($handle, filesize('dosyaadi.txt'));`

### 4. `feof()`
- **Açıklama:** Dosyanın sonuna ulaşılıp ulaşılmadığını kontrol eder.
- **Kullanım:** `while(!feof($handle)) { ... }`

### 5. `fclose()`
- **Açıklama:** Açık bir dosya işaretçisini kapatır.
- **Kullanım:** `fclose($handle);`

### 6. `file_get_contents()`
- **Açıklama:** Tüm dosyayı bir string olarak okur.
- **Kullanım:** `$content = file_get_contents('dosyaadi.txt');`

### 7. `file()`
- **Açıklama:** Tüm dosyayı bir diziye okur, her satır bir dizi elemanı olur.
- **Kullanım:** `$lines = file('dosyaadi.txt');`

## Örnek

```php
$handle = fopen('ornek.txt', 'r');
while(!feof($handle)) {
        $line = fgets($handle);
        echo $line;
}
fclose($handle);
```

Veya daha basit olarak:

```php
$content = file_get_contents('ornek.txt');
echo $content;
```
