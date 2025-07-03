# Enum (Sayımsal Tipler)

(PHP 8 >= 8.1.0)

## Temel Enum Kullanımı

Enum'lar, bir tür için kapalı bir değer kümesi tanımlamanın yoludur. Sınıflar ve sabitler üzerinde kısıtlayıcı bir katman sağlar.

```php
// Örnek #1 Temel Enum Kullanımı
// [Koda bak](../2-Types/1-Introduction/10-Enumerations.php#L1)
enum Suit {
    case Hearts;
    case Diamonds;
    case Clubs;
    case Spades;
}

function do_stuff(Suit $s) {
    // ...
}

do_stuff(Suit::Spades);
```

Daha fazla bilgi için Enum başlığına bakınız.

## Dönüştürme (Casting)

Bir enum nesneye dönüştürülürse değişmez. Bir enum diziye dönüştürülürse, saf enumlar için sadece name anahtarı, backed enumlar için name ve value anahtarları olan bir dizi oluşur. Diğer türlere dönüştürme hata verir.

---

**Bir sorun mu var?**
Bu sayfayı nasıl geliştireceğinizi öğrenin • Pull Request gönderin • Hata Bildirin
