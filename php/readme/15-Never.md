# Never Türü

never, yalnızca dönüş tipi olarak kullanılabilen ve fonksiyonun asla sonlanmadığını (dönüş yapmadığını) belirten bir türdür. Yani fonksiyon ya exit() çağırır, ya istisna fırlatır, ya da sonsuz döngüde kalır. Birleşik tür (union type) olarak kullanılamaz. PHP 8.1.0 ve sonrasında kullanılabilir.

Tip teorisinde never, en alt türdür (bottom type). Yani diğer tüm türlerin alt türüdür ve kalıtımda herhangi bir dönüş tipinin yerine geçebilir.

---

**Bir sorun mu var?**
Bu sayfayı nasıl geliştireceğinizi öğrenin • Pull Request gönderin • Hata Bildirin

## Örnek: never dönüş tipi kullanımı
[Örneğe bakın](../2-Types/1-Introduction/15-Never.php#L1)
