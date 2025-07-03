# Kaynaklar (Resources)

Bir kaynak (resource), harici bir kaynağa referans tutan özel bir değişkendir. Kaynaklar, özel fonksiyonlar tarafından oluşturulur ve kullanılır. Tüm bu fonksiyonlar ve ilgili kaynak türleri için ekler bölümüne bakınız.

Ayrıca get_resource_type() fonksiyonuna da bakınız.

## Kaynağa Dönüştürme

Kaynak değişkenleri, açılmış dosyalar, veritabanı bağlantıları, resim alanları gibi özel tanıtıcılar içerdiğinden, başka bir türü kaynağa dönüştürmek anlamsızdır.

## Kaynakları Serbest Bırakma

Zend Engine'in referans sayma sistemi sayesinde, bir kaynağa artık referans kalmadığında bu otomatik olarak algılanır ve çöp toplayıcı tarafından serbest bırakılır. Bu nedenle, genellikle belleği manuel olarak boşaltmaya gerek yoktur.

> Not: Kalıcı veritabanı bağlantıları bu kurala istisnadır. Çöp toplayıcı tarafından yok edilmezler. Daha fazla bilgi için kalıcı bağlantılar bölümüne bakınız.

---

**Bir sorun mu var?**
Bu sayfayı nasıl geliştireceğinizi öğrenin • Pull Request gönderin • Hata Bildirin

### Örnek: Kaynak Türü Kullanımı
[Örneğe bakın](../2-Types/1-Introduction/11-Resources.php#L1)
