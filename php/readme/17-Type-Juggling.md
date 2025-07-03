# Tip Dönüşümü (Type Juggling)

PHP'de değişken tanımlarken açıkça tür belirtmek gerekmez. Değişkenin türü, ona atanan değere göre belirlenir. Bir değişkene string atanırsa türü string olur, sonra int atanırsa türü int olur.

PHP bazı durumlarda değerin türünü otomatik olarak dönüştürmeye çalışır. Bu bağlamlar şunlardır:

- Sayısal (Numeric)
- String
- Mantıksal (Logical)
- Tamsayı ve string (Integral and string)
- Karşılaştırma (Comparative)
- Fonksiyon

> Not: Bir değer farklı bir türde yorumlandığında, değerin kendisi değişmez.

Bir değişkenin belirli bir türde değerlendirilmesini zorlamak için type casting bölümüne bakın. Türünü değiştirmek için settype() fonksiyonunu kullanabilirsiniz.

## Sayısal Bağlam

Aritmetik operatör kullanıldığında oluşur. Operantlardan biri float ise, her ikisi de float olarak değerlendirilir. Aksi halde int olarak değerlendirilir. PHP 8.0.0'dan itibaren, operantlardan biri yorumlanamazsa TypeError fırlatılır.

## String Bağlamı

echo, print, string birleştirme veya interpolasyon kullanıldığında oluşur. Değer string olarak değerlendirilir. Yorumlanamazsa TypeError fırlatılır.

## Mantıksal Bağlam

Koşullu ifadeler, üçlü operatör veya mantıksal operatörlerde oluşur. Değer bool olarak değerlendirilir.

## Tamsayı ve String Bağlamı

Bit düzeyinde operatörlerde oluşur. Tüm operantlar string ise sonuç string olur, aksi halde int olur. PHP 8.0.0'dan itibaren, operantlardan biri yorumlanamazsa TypeError fırlatılır.

## Karşılaştırma Bağlamı

Karşılaştırma operatörlerinde oluşur. Bu bağlamdaki dönüşümler için karşılaştırma tablosuna bakınız.

## Fonksiyon Bağlamı

Bir değerin tipli parametreye, özelliğe veya dönüş tipine atanmasında oluşur. int->float ve bazı scalar dönüşümler otomatik yapılır.

---

### Örnek: Tip Dönüşümü
[Örneğe bakın](../2-Types/1-Introduction/17-Type-Juggling.php#L1)

### Örnek: Type Casting
[Örneğe bakın](../2-Types/1-Introduction/17-Type-Juggling.php#L15)

### Örnek: Farklı Dönüşüm Mekanizmaları
[Örneğe bakın](../2-Types/1-Introduction/17-Type-Juggling.php#L25)

### Örnek: String üzerinde dizi erişimi
[Örneğe bakın](../2-Types/1-Introduction/17-Type-Juggling.php#L36)

---

**Bir sorun mu var?**
Bu sayfayı nasıl geliştireceğinizi öğrenin • Pull Request gönderin • Hata Bildirin
