# Kurulum

## Laravel ile Tanışın

Laravel, ifade gücü yüksek ve zarif bir sözdizimi olan bir web uygulama çerçevesidir. Bir web çerçevesi, uygulamanızı oluşturmak için bir yapı ve başlangıç noktası sağlar, böylece detaylarla biz uğraşırken siz harika bir şeyler yaratmaya odaklanabilirsiniz.

Laravel, kapsamlı bağımlılık enjeksiyonu, etkileyici bir veritabanı soyutlama katmanı, kuyruklar ve zamanlanmış işler, birim ve entegrasyon testleri ve daha fazlası gibi güçlü özellikler sunarken harika bir geliştirici deneyimi sağlamaya çalışır.

PHP web çerçevelerine yeni olsanız da yıllarca deneyiminiz olsa da, Laravel sizinle birlikte büyüyebilen bir çerçevedir. Bir web geliştirici olarak ilk adımlarınızı atmanızda size yardımcı olacağız veya uzmanlığınızı bir sonraki seviyeye taşırken size destek vereceğiz. Ne inşa edeceğinizi görmek için sabırsızlanıyoruz.

## Neden Laravel?

Bir web uygulaması oluştururken çeşitli araçlar ve çerçeveler mevcuttur. Ancak, modern, tam yığın web uygulamaları oluşturmak için Laravel'in en iyi seçim olduğuna inanıyoruz.

### Aşamalı Bir Çerçeve

Laravel'i "aşamalı" bir çerçeve olarak adlandırmayı seviyoruz. Bununla Laravel'in sizinle birlikte büyüdüğünü kastediyoruz. Web geliştirmede ilk adımlarınızı atıyorsanız, Laravel'in geniş dokümantasyon kitaplığı, kılavuzları ve video eğitimleri bunalmadan işin inceliklerini öğrenmenize yardımcı olacaktır.

Kıdemli bir geliştiriciyseniz, Laravel size bağımlılık enjeksiyonu, birim testi, kuyruklar, gerçek zamanlı olaylar ve daha fazlası için güçlü araçlar sunar. Laravel, profesyonel web uygulamaları oluşturmak için ince ayarlanmıştır ve kurumsal iş yüklerini ele almaya hazırdır.

### Ölçeklenebilir Bir Çerçeve

Laravel inanılmaz derecede ölçeklenebilir. PHP'nin ölçekleme dostu doğası ve Laravel'in Redis gibi hızlı, dağıtılmış önbellek sistemleri için yerleşik desteği sayesinde, Laravel ile yatay ölçekleme çocuk oyuncağıdır. Aslında, Laravel uygulamaları ayda yüz milyonlarca isteği işlemek için kolayca ölçeklendirilmiştir.

Aşırı ölçekleme mi gerekiyor? Laravel Cloud gibi platformlar, Laravel uygulamanızı neredeyse sınırsız ölçekte çalıştırmanıza olanak tanır.

### Topluluk Çerçevesi

Laravel, mevcut en sağlam ve geliştirici dostu çerçeveyi sunmak için PHP ekosistemindeki en iyi paketleri birleştirir. Buna ek olarak, dünyanın dört bir yanından binlerce yetenekli geliştirici çerçeveye katkıda bulunmuştur. Kim bilir, belki siz de bir Laravel katkıcısı olursunuz.

## Laravel Uygulaması Oluşturma

### PHP ve Laravel Installer Kurulumu

İlk Laravel uygulamanızı oluşturmadan önce, yerel makinenizde PHP, Composer ve Laravel installer'ın kurulu olduğundan emin olun. Ayrıca, uygulamanızın frontend varlıklarını derleyebilmek için Node ve NPM veya Bun kurmalısınız.

Yerel makinenizde PHP ve Composer kurulu değilse, aşağıdaki komutlar macOS, Windows veya Linux'ta PHP, Composer ve Laravel installer'ı kuracaktır:

```bash
/bin/bash -c "$(curl -fsSL https://php.new/install/mac/8.4)"
```

Yukarıdaki komutlardan birini çalıştırdıktan sonra, terminal oturumunuzu yeniden başlatmalısınız. PHP, Composer ve Laravel installer'ı php.new aracılığıyla kurduktan sonra güncellemek için terminalinizde komutu yeniden çalıştırabilirsiniz.

PHP ve Composer zaten kuruluysa, Laravel installer'ı Composer aracılığıyla kurabilirsiniz:

```bash
composer global require laravel/installer
```

Tam özellikli, grafik PHP kurulum ve yönetim deneyimi için Laravel Herd'e göz atın.

### Uygulama Oluşturma

PHP, Composer ve Laravel installer'ı kurduktan sonra, yeni bir Laravel uygulaması oluşturmaya hazırsınız. Laravel installer tercih ettiğiniz test çerçevesi, veritabanı ve başlangıç kitini seçmenizi isteyecektir:

```bash
laravel new example-app
```

Uygulama oluşturulduktan sonra, dev Composer script'ini kullanarak Laravel'in yerel geliştirme sunucusunu, kuyruk worker'ını ve Vite geliştirme sunucusunu başlatabilirsiniz:

```bash
cd example-app
npm install && npm run build
composer run dev
```

Geliştirme sunucusunu başlattıktan sonra, uygulamanız web tarayıcınızda http://localhost:8000 adresinden erişilebilir olacaktır. Sonra, Laravel ekosisteminde sonraki adımlarınızı atmaya hazırsınız. Tabii ki, bir veritabanı da yapılandırmak isteyebilirsiniz.

Laravel uygulamanızı geliştirirken avantajlı bir başlangıç yapmak istiyorsanız, başlangıç kitlerinden birini kullanmayı düşünün. Laravel'in başlangıç kitleri, yeni Laravel uygulamanız için backend ve frontend kimlik doğrulama iskeletini sağlar.

### İlk Yapılandırma

Laravel çerçevesi için tüm yapılandırma dosyaları config dizininde saklanır. Her seçenek belgelenmiştir, bu nedenle dosyalara göz atabilir ve mevcut seçenekleri tanıyabilirsiniz.

Laravel kutudan çıktığı haliyle neredeyse hiç ek yapılandırma gerektirmez. Geliştirmeye başlamakta özgürsünüz! Ancak, config/app.php dosyasını ve belgelerini gözden geçirmek isteyebilirsiniz. Uygulamanıza göre değiştirmek isteyebileceğiniz url ve locale gibi çeşitli seçenekler içerir.

### Ortam Tabanlı Yapılandırma

Laravel'in yapılandırma seçeneklerinin çoğu, uygulamanızın yerel makinenizde mi yoksa üretim web sunucusunda mı çalıştığına bağlı olarak değişebileceğinden, birçok önemli yapılandırma değeri uygulamanızın kökünde bulunan .env dosyası kullanılarak tanımlanır.

.env dosyanız uygulamanızın kaynak kontrolüne commit edilmemelidir, çünkü uygulamanızı kullanan her geliştirici/sunucu farklı bir ortam yapılandırması gerektirebilir. Ayrıca, bir saldırganın kaynak kontrol deposunuza erişim sağlaması durumunda bu bir güvenlik riski oluşturur, çünkü hassas kimlik bilgileri açığa çıkar.

.env dosyası ve ortam tabanlı yapılandırma hakkında daha fazla bilgi için tam yapılandırma belgelerine göz atın.

### Veritabanları ve Migrations

Artık Laravel uygulamanızı oluşturduğunuza göre, muhtemelen bazı verileri bir veritabanında saklamak istiyorsunuz. Varsayılan olarak, uygulamanızın .env yapılandırma dosyası Laravel'in bir SQLite veritabanıyla etkileşimde bulunacağını belirtir.

Uygulama oluşturma sırasında, Laravel sizin için bir database/database.sqlite dosyası oluşturdu ve uygulamanın veritabanı tablolarını oluşturmak için gerekli migration'ları çalıştırdı.

MySQL veya PostgreSQL gibi başka bir veritabanı sürücüsü kullanmayı tercih ediyorsanız, uygun veritabanını kullanmak için .env yapılandırma dosyanızı güncelleyebilirsiniz. Örneğin, MySQL kullanmak istiyorsanız, .env yapılandırma dosyanızın DB_* değişkenlerini şu şekilde güncelleyin:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

SQLite dışında bir veritabanı kullanmayı seçerseniz, veritabanını oluşturmanız ve uygulamanızın veritabanı migration'larını çalıştırmanız gerekecektir:

```bash
php artisan migrate
```

macOS veya Windows'ta geliştirme yapıyorsanız ve MySQL, PostgreSQL veya Redis'i yerel olarak kurmanız gerekiyorsa, Herd Pro veya DBngin kullanmayı düşünün.

### Dizin Yapılandırması

Laravel, web sunucunuz için yapılandırılmış "web dizini"nin kökünden her zaman sunulmalıdır. Laravel uygulamasını "web dizini"nin bir alt dizininden sunmaya çalışmamalısınız. Bunu yapmaya çalışmak, uygulamanızda bulunan hassas dosyaları açığa çıkarabilir.

## Herd Kullanarak Kurulum

Laravel Herd, macOS ve Windows için çok hızlı, yerel Laravel ve PHP geliştirme ortamıdır. Herd, PHP ve Nginx dahil olmak üzere Laravel geliştirmesine başlamak için ihtiyacınız olan her şeyi içerir.

Herd'i kurduktan sonra, Laravel ile geliştirmeye başlamaya hazırsınız. Herd, php, composer, laravel, expose, node, npm ve nvm için komut satırı araçları içerir.

Herd Pro, yerel MySQL, Postgres ve Redis veritabanları oluşturma ve yönetme yeteneği ile yerel mail görüntüleme ve log izleme gibi ek güçlü özelliklerle Herd'i güçlendirir.

### macOS'ta Herd

macOS'ta geliştirme yapıyorsanız, Herd installer'ını Herd web sitesinden indirebilirsiniz. Installer otomatik olarak PHP'nin en son sürümünü indirir ve Mac'inizi arka planda her zaman Nginx çalıştıracak şekilde yapılandırır.

macOS için Herd, "parked" dizinleri desteklemek için dnsmasq kullanır. Parked dizindeki herhangi bir Laravel uygulaması otomatik olarak Herd tarafından sunulacaktır. Varsayılan olarak, Herd ~/Herd'de bir parked dizin oluşturur ve bu dizindeki herhangi bir Laravel uygulamasına .test domain'inde dizin adını kullanarak erişebilirsiniz.

Herd'i kurduktan sonra, yeni bir Laravel uygulaması oluşturmanın en hızlı yolu Herd ile birlikte gelen Laravel CLI'yi kullanmaktır:

```bash
cd ~/Herd
laravel new my-app
cd my-app
herd open
```

Tabii ki, sistem tepsinizdeki Herd menüsünden açılabilen Herd'in UI'si aracılığıyla parked dizinlerinizi ve diğer PHP ayarlarınızı her zaman yönetebilirsiniz.

Herd dokümantasyonuna göz atarak Herd hakkında daha fazla bilgi edinebilirsiniz.

### Windows'ta Herd

Herd web sitesinden Herd için Windows installer'ını indirebilirsiniz. Kurulum tamamlandıktan sonra, onboarding sürecini tamamlamak ve Herd UI'sine ilk kez erişmek için Herd'i başlatabilirsiniz.

Herd UI'sine Herd'in sistem tepsisi simgesine sol tıklayarak erişilebilir. Sağ tık, günlük olarak ihtiyaç duyduğunuz tüm araçlara erişim sağlayan hızlı menüyü açar.

Kurulum sırasında, Herd ev dizininizde %USERPROFILE%\Herd konumunda bir "parked" dizin oluşturur. Parked dizindeki herhangi bir Laravel uygulaması otomatik olarak Herd tarafından sunulacaktır ve bu dizindeki herhangi bir Laravel uygulamasına .test domain'inde dizin adını kullanarak erişebilirsiniz.

Herd'i kurduktan sonra, yeni bir Laravel uygulaması oluşturmanın en hızlı yolu Herd ile birlikte gelen Laravel CLI'yi kullanmaktır. Başlamak için Powershell'i açın ve aşağıdaki komutları çalıştırın:

```bash
cd ~\Herd
laravel new my-app
cd my-app
herd open
```

Windows için Herd dokümantasyonuna göz atarak Herd hakkında daha fazla bilgi edinebilirsiniz.

## IDE Desteği

Laravel uygulamaları geliştirirken istediğiniz herhangi bir kod editörünü kullanmakta özgürsünüz; ancak PhpStorm, Laravel Pint dahil olmak üzere Laravel ve ekosistemi için kapsamlı destek sunar.

Ayrıca, topluluk tarafından sürdürülen Laravel Idea PhpStorm eklentisi, kod üretimi, Eloquent sözdizimi tamamlama, doğrulama kuralı tamamlama ve daha fazlası dahil olmak üzere çeşitli yararlı IDE geliştirmeleri sunar.

Visual Studio Code (VS Code) ile geliştirme yapıyorsanız, resmi Laravel VS Code Extension artık mevcut. Bu uzantı, Laravel'e özel araçları doğrudan VS Code ortamınıza getirerek üretkenliği artırır.

## Sonraki Adımlar

Artık Laravel uygulamanızı oluşturduğunuza göre, bundan sonra ne öğreneceğinizi merak ediyor olabilirsiniz. İlk olarak, aşağıdaki belgeleri okuyarak Laravel'in nasıl çalıştığını öğrenmenizi şiddetle tavsiye ederiz:

- Request Lifecycle
- Configuration
- Directory Structure
- Frontend
- Service Container
- Facades

Laravel'i nasıl kullanmak istediğiniz, yolculuğunuzdaki sonraki adımları da belirleyecektir. Laravel'i kullanmanın çeşitli yolları vardır ve aşağıda çerçeve için iki birincil kullanım durumunu keşfedeceğiz.

### Tam Yığın Çerçeve Olarak Laravel

Laravel tam yığın çerçeve olarak hizmet verebilir. "Tam yığın" çerçeve ile uygulamanıza istekleri yönlendirmek için Laravel kullanacağınızı ve frontend'inizi Blade şablonları veya Inertia gibi tek sayfa uygulama hibrit teknolojisi aracılığıyla render edeceğinizi kastediyoruz. Bu, Laravel çerçevesini kullanmanın en yaygın yolu ve bizim görüşümüze göre Laravel'i kullanmanın en üretken yoludur.

Laravel'i bu şekilde kullanmayı planlıyorsanız, frontend geliştirme, routing, views veya Eloquent ORM belgelerimize göz atmak isteyebilirsiniz. Ayrıca, Livewire ve Inertia gibi topluluk paketleri hakkında bilgi edinmekle ilgilenebilirsiniz. Bu paketler, tek sayfa JavaScript uygulamalarının sağladığı UI avantajlarının çoğundan yararlanırken Laravel'i tam yığın çerçeve olarak kullanmanıza olanak tanır.

Laravel'i tam yığın çerçeve olarak kullanıyorsanız, uygulamanızın CSS ve JavaScript'ini Vite kullanarak derlemeyi öğrenmenizi de şiddetle tavsiye ederiz.

Uygulamanızı oluşturmaya avantajlı bir başlangıç yapmak istiyorsanız, resmi uygulama başlangıç kitlerinden birine göz atın.

### API Backend Olarak Laravel

Laravel ayrıca JavaScript tek sayfa uygulaması veya mobil uygulamaya API backend olarak da hizmet verebilir. Örneğin, Next.js uygulamanız için Laravel'i API backend olarak kullanabilirsiniz. Bu bağlamda, Laravel'i uygulamanız için kimlik doğrulama ve veri depolama/alma sağlamak için kullanabilir, aynı zamanda kuyruklar, e-postalar, bildirimler ve daha fazlası gibi Laravel'in güçlü hizmetlerinden de yararlanabilirsiniz.

Laravel'i bu şekilde kullanmayı planlıyorsanız, routing, Laravel Sanctum ve Eloquent ORM belgelerimize göz atmak isteyebilirsiniz.

# Yapılandırma

## Giriş

Laravel çerçevesi için tüm yapılandırma dosyaları config dizininde saklanır. Her seçenek belgelenmiştir, bu nedenle dosyalara göz atabilir ve mevcut seçenekleri tanıyabilirsiniz.

Bu yapılandırma dosyaları, veritabanı bağlantı bilgileriniz, mail sunucu bilgileriniz ve uygulama URL'niz ve şifreleme anahtarınız gibi çeşitli diğer temel yapılandırma değerleri gibi şeyleri yapılandırmanıza olanak tanır.

## about Komutu

Laravel, about Artisan komutu aracılığıyla uygulamanızın yapılandırması, sürücüleri ve ortamının genel bir bakışını görüntüleyebilir.

```bash
php artisan about
```

Uygulama genel bakış çıktısının yalnızca belirli bir bölümüyle ilgileniyorsanız, --only seçeneğini kullanarak o bölümü filtreleyebilirsiniz:

```bash
php artisan about --only=environment
```

Veya, belirli bir yapılandırma dosyasının değerlerini ayrıntılı olarak keşfetmek için config:show Artisan komutunu kullanabilirsiniz:

```bash
php artisan config:show database
```

## Ortam Yapılandırması

Uygulamanın çalıştığı ortama göre farklı yapılandırma değerlerine sahip olmak genellikle yararlıdır. Örneğin, yerel olarak üretim sunucunuzda kullandığınızdan farklı bir önbellek sürücüsü kullanmak isteyebilirsiniz.

Bunu kolaylaştırmak için Laravel, DotEnv PHP kütüphanesini kullanır. Yeni bir Laravel kurulumunda, uygulamanızın kök dizini birçok yaygın ortam değişkenini tanımlayan bir .env.example dosyası içerecektir. Laravel kurulum süreci sırasında, bu dosya otomatik olarak .env'ye kopyalanacaktır.

Laravel'in varsayılan .env dosyası, uygulamanızın yerel olarak mı yoksa üretim web sunucusunda mı çalıştığına bağlı olarak değişebilecek bazı yaygın yapılandırma değerlerini içerir. Bu değerler daha sonra Laravel'in env fonksiyonu kullanılarak config dizinindeki yapılandırma dosyaları tarafından okunur.

Bir ekiple geliştirme yapıyorsanız, .env.example dosyasını uygulamanızla birlikte dahil etmeye ve güncellemeye devam etmek isteyebilirsiniz. Örnek yapılandırma dosyasına yer tutucu değerler koyarak, ekibinizdeki diğer geliştiriciler uygulamanızı çalıştırmak için hangi ortam değişkenlerinin gerekli olduğunu açıkça görebilir.

.env dosyanızdaki herhangi bir değişken, sunucu düzeyinde veya sistem düzeyinde ortam değişkenleri gibi harici ortam değişkenleri tarafından geçersiz kılınabilir.

### Ortam Dosyası Güvenliği

.env dosyanız uygulamanızın kaynak kontrolüne commit edilmemelidir, çünkü uygulamanızı kullanan her geliştirici/sunucu farklı bir ortam yapılandırması gerektirebilir. Ayrıca, bir saldırganın kaynak kontrol deposuna erişim sağlaması durumunda bu bir güvenlik riski oluşturur, çünkü hassas kimlik bilgileri açığa çıkar.

Ancak, Laravel'in yerleşik ortam şifrelemesini kullanarak ortam dosyanızı şifrelemek mümkündür. Şifrelenmiş ortam dosyaları güvenli bir şekilde kaynak kontrole yerleştirilebilir.

### Ek Ortam Dosyaları

Uygulamanızın ortam değişkenlerini yüklemeden önce, Laravel bir APP_ENV ortam değişkeninin harici olarak sağlanıp sağlanmadığını veya --env CLI argümanının belirtilip belirtilmediğini belirler. Eğer öyleyse, Laravel varsa bir .env.[APP_ENV] dosyasını yüklemeye çalışacaktır. Yoksa, varsayılan .env dosyası yüklenecektir.

### Ortam Değişkeni Türleri

.env dosyalarındaki tüm değişkenler genellikle string olarak ayrıştırılır, bu nedenle env() fonksiyonundan daha geniş bir tür yelpazesi döndürmenize olanak tanımak için bazı ayrılmış değerler oluşturulmuştur:

| .env Değeri | env() Değeri |
|-------------|--------------|
| true | (bool) true |
| (true) | (bool) true |
| false | (bool) false |
| (false) | (bool) false |
| empty | (string) '' |
| (empty) | (string) '' |
| null | (null) null |
| (null) | (null) null |

Boşluklar içeren bir değerle ortam değişkeni tanımlamanız gerekiyorsa, değeri çift tırnak içine alarak bunu yapabilirsiniz:

```
APP_NAME="My Application"
```

## Ortam Yapılandırmasını Alma

.env dosyasında listelenen tüm değişkenler, uygulamanız bir istek aldığında $_ENV PHP süper globaline yüklenecektir. Ancak, yapılandırma dosyalarınızda bu değişkenlerden değerleri almak için env fonksiyonunu kullanabilirsiniz. Aslında, Laravel yapılandırma dosyalarını gözden geçirirseniz, seçeneklerin çoğunun zaten bu fonksiyonu kullandığını fark edeceksiniz:

```php
'debug' => env('APP_DEBUG', false),
```

env fonksiyonuna geçirilen ikinci değer "varsayılan değer"dir. Bu değer, verilen anahtar için hiç ortam değişkeni yoksa döndürülecektir.

## Mevcut Ortamı Belirleme

Mevcut uygulama ortamı, .env dosyanızdaki APP_ENV değişkeni aracılığıyla belirlenir. Bu değere App facade'ındaki environment metoduyla erişebilirsiniz:

```php
use Illuminate\Support\Facades\App;

$environment = App::environment();
```

Ortamın belirli bir değerle eşleşip eşleşmediğini belirlemek için environment metoduna argümanlar da geçirebilirsiniz. Ortam verilen değerlerden herhangi biriyle eşleşirse metod true döndürecektir:

```php
if (App::environment('local')) {
    // Ortam local
}

if (App::environment(['local', 'staging'])) {
    // Ortam local VEYA staging...
}
```

Mevcut uygulama ortam algılaması, sunucu düzeyinde APP_ENV ortam değişkeni tanımlayarak geçersiz kılınabilir.

## Ortam Dosyalarını Şifreleme

Şifrelenmemiş ortam dosyaları asla kaynak kontrolde saklanmamalıdır. Ancak, Laravel ortam dosyalarınızı şifrelemenize olanak tanır, böylece uygulamanızın geri kalanıyla birlikte güvenli bir şekilde kaynak kontrole eklenebilir.

### Şifreleme

Bir ortam dosyasını şifrelemek için env:encrypt komutunu kullanabilirsiniz:

```bash
php artisan env:encrypt
```

env:encrypt komutunu çalıştırmak .env dosyanızı şifreleyecek ve şifrelenmiş içeriği .env.encrypted dosyasına yerleştirecektir. Şifre çözme anahtarı komutun çıktısında sunulur ve güvenli bir şifre yöneticisinde saklanmalıdır. Kendi şifreleme anahtarınızı sağlamak istiyorsanız, komutu çağırırken --key seçeneğini kullanabilirsiniz:

```bash
php artisan env:encrypt --key=3UVsEgGVK36XN82KKeyLFMhvosbZN1aF
```

Sağlanan anahtarın uzunluğu, kullanılan şifreleme algoritmasının gerektirdiği anahtar uzunluğuyla eşleşmelidir. Varsayılan olarak, Laravel 32 karakterlik bir anahtar gerektiren AES-256-CBC algoritmasını kullanacaktır. Komutu çağırırken --cipher seçeneğini geçerek Laravel'in şifreleyicisi tarafından desteklenen herhangi bir algoritmayı kullanmakta özgürsünüz.

Uygulamanızın .env ve .env.staging gibi birden fazla ortam dosyası varsa, --env seçeneği aracılığıyla ortam adını sağlayarak şifrelenmesi gereken ortam dosyasını belirtebilirsiniz:

```bash
php artisan env:encrypt --env=staging
```

### Şifre Çözme

Bir ortam dosyasının şifresini çözmek için env:decrypt komutunu kullanabilirsiniz. Bu komut Laravel'in LARAVEL_ENV_ENCRYPTION_KEY ortam değişkeninden alacağı bir şifre çözme anahtarı gerektirir:

```bash
php artisan env:decrypt
```

Veya, anahtar doğrudan --key seçeneği aracılığıyla komuta sağlanabilir:

```bash
php artisan env:decrypt --key=3UVsEgGVK36XN82KKeyLFMhvosbZN1aF
```

env:decrypt komutu çağrıldığında, Laravel .env.encrypted dosyasının içeriğinin şifresini çözecek ve şifresi çözülmüş içeriği .env dosyasına yerleştirecektir.

Özel bir şifreleme algoritması kullanmak için env:decrypt komutuna --cipher seçeneği sağlanabilir:

```bash
php artisan env:decrypt --key=qUWuNRdfuImXcKxZ --cipher=AES-128-CBC
```

Uygulamanızın .env ve .env.staging gibi birden fazla ortam dosyası varsa, --env seçeneği aracılığıyla ortam adını sağlayarak şifresi çözülmesi gereken ortam dosyasını belirtebilirsiniz:

```bash
php artisan env:decrypt --env=staging
```

Mevcut bir ortam dosyasının üzerine yazmak için env:decrypt komutuna --force seçeneğini sağlayabilirsiniz:

```bash
php artisan env:decrypt --force
```

## Yapılandırma Değerlerine Erişim

Uygulamanızın herhangi bir yerinden Config facade'ini veya global config fonksiyonunu kullanarak yapılandırma değerlerinize kolayca erişebilirsiniz. Yapılandırma değerlerine, erişmek istediğiniz dosya ve seçeneğin adını içeren "nokta" sözdizimi kullanılarak erişilebilir. Bir varsayılan değer de belirtilebilir ve yapılandırma seçeneği yoksa döndürülecektir:

```php
use Illuminate\Support\Facades\Config;

$value = Config::get('app.timezone');

$value = config('app.timezone');

// Yapılandırma değeri yoksa varsayılan değeri al...
$value = config('app.timezone', 'Asia/Seoul');
```

Çalışma zamanında yapılandırma değerlerini ayarlamak için Config facade'inin set metodunu çağırabilir veya config fonksiyonuna bir dizi geçirebilirsiniz:

```php
Config::set('app.timezone', 'America/Chicago');

config(['app.timezone' => 'America/Chicago']);
```

Statik analizi desteklemek için Config facade ayrıca tipli yapılandırma alma metodları da sağlar. Alınan yapılandırma değeri beklenen türle eşleşmezse, bir istisna atılacaktır:

```php
Config::string('config-key');
Config::integer('config-key');
Config::float('config-key');
Config::boolean('config-key');
Config::array('config-key');
Config::collection('config-key');
```

## Yapılandırma Önbelleği

Uygulamanıza hız kazandırmak için, config:cache Artisan komutunu kullanarak tüm yapılandırma dosyalarınızı tek bir dosyada önbelleğe almalısınız. Bu, uygulamanızın tüm yapılandırma seçeneklerini çerçeve tarafından hızlıca yüklenebilecek tek bir dosyada birleştirecektir.

Genellikle php artisan config:cache komutunu üretim dağıtım sürecinizin bir parçası olarak çalıştırmalısınız. Komut yerel geliştirme sırasında çalıştırılmamalıdır çünkü uygulamanızın gelişimi sürecinde yapılandırma seçeneklerinin sıklıkla değiştirilmesi gerekecektir.

Yapılandırma önbelleğe alındıktan sonra, uygulamanızın .env dosyası istekler veya Artisan komutları sırasında çerçeve tarafından yüklenmeyecektir; bu nedenle, env fonksiyonu yalnızca harici, sistem düzeyinde ortam değişkenlerini döndürecektir.

Bu nedenle, env fonksiyonunu yalnızca uygulamanızın yapılandırma (config) dosyalarından çağırdığınızdan emin olmalısınız. Laravel'in varsayılan yapılandırma dosyalarını inceleyerek bunun birçok örneğini görebilirsiniz. Yapılandırma değerlerine uygulamanızın herhangi bir yerinden yukarıda açıklanan config fonksiyonunu kullanarak erişilebilir.

Önbelleğe alınmış yapılandırmayı temizlemek için config:clear komutu kullanılabilir:

```bash
php artisan config:clear
```

Dağıtım süreciniz sırasında config:cache komutunu çalıştırırsanız, env fonksiyonunu yalnızca yapılandırma dosyalarınızdan çağırdığınızdan emin olmalısınız. Yapılandırma önbelleğe alındıktan sonra, .env dosyası yüklenmeyecektir; bu nedenle, env fonksiyonu yalnızca harici, sistem düzeyinde ortam değişkenlerini döndürecektir.

## Yapılandırma Yayınlama

Laravel'in yapılandırma dosyalarının çoğu zaten uygulamanızın config dizininde yayınlanmıştır; ancak cors.php ve view.php gibi belirli yapılandırma dosyaları varsayılan olarak yayınlanmaz, çünkü çoğu uygulama bunları hiç değiştirmeyecektir.

Ancak, varsayılan olarak yayınlanmayan herhangi bir yapılandırma dosyasını yayınlamak için config:publish Artisan komutunu kullanabilirsiniz:

```bash
php artisan config:publish

php artisan config:publish --all
```

## Debug Modu

config/app.php yapılandırma dosyanızdaki debug seçeneği, bir hata hakkında kullanıcıya ne kadar bilgi görüntüleneceğini belirler. Varsayılan olarak, bu seçenek .env dosyanızda saklanan APP_DEBUG ortam değişkeninin değerini dikkate alacak şekilde ayarlanmıştır.

Yerel geliştirme için APP_DEBUG ortam değişkenini true olarak ayarlamalısınız. Üretim ortamınızda, bu değer her zaman false olmalıdır. Değişken üretimde true olarak ayarlanırsa, hassas yapılandırma değerlerini uygulamanızın son kullanıcılarına ifşa etme riskiyle karşı karşıya kalırsınız.

## Bakım Modu

Uygulamanız bakım modundayken, uygulamanıza yapılan tüm istekler için özel bir görünüm görüntülenecektir. Bu, güncellenirken veya bakım gerçekleştirirken uygulamanızı "devre dışı bırakmayı" kolaylaştırır. Bakım modu kontrolü, uygulamanızın varsayılan middleware yığınına dahildir. Uygulama bakım modundaysa, 503 durum koduyla bir Symfony\Component\HttpKernel\Exception\HttpException örneği atılacaktır.

Bakım modunu etkinleştirmek için down Artisan komutunu çalıştırın:

```bash
php artisan down
```

Tüm bakım modu yanıtlarıyla birlikte Refresh HTTP başlığının gönderilmesini istiyorsanız, down komutunu çağırırken refresh seçeneğini sağlayabilirsiniz. Refresh başlığı, tarayıcıya belirtilen saniye sayısından sonra sayfayı otomatik olarak yenilemesi talimatını verecektir:

```bash
php artisan down --refresh=15
```

Down komutuna ayrıca Retry-After HTTP başlığının değeri olarak ayarlanacak bir retry seçeneği de sağlayabilirsiniz, ancak tarayıcılar genellikle bu başlığı yok sayar:

```bash
php artisan down --retry=60
```

### Bakım Modunu Atlama

Gizli bir belirteç kullanarak bakım modunun atlanmasına izin vermek için, bakım modu atlama belirteci belirtmek üzere secret seçeneğini kullanabilirsiniz:

```bash
php artisan down --secret="1630542a-246b-4b66-afa1-dd72a4c43515"
```

Uygulamayı bakım moduna aldıktan sonra, bu belirteçle eşleşen uygulama URL'sine gidebilirsiniz ve Laravel tarayıcınıza bir bakım modu atlama çerezi verecektir:

```
https://example.com/1630542a-246b-4b66-afa1-dd72a4c43515
```

Laravel'in sizin için gizli belirteci oluşturmasını istiyorsanız, with-secret seçeneğini kullanabilirsiniz. Uygulama bakım moduna geçtikten sonra gizli belirteç size gösterilecektir:

```bash
php artisan down --with-secret
```

Bu gizli rotaya eriştiğinizde, uygulamanın / rotasına yönlendirileceksiniz. Çerez tarayıcınıza verildikten sonra, bakım modunda değilmiş gibi uygulamada normal şekilde gezinebileceksiniz.

Bakım modu gizli belirteciniz genellikle alfanümerik karakterlerden ve isteğe bağlı olarak tirelerden oluşmalıdır. ? veya & gibi URL'lerde özel anlamı olan karakterleri kullanmaktan kaçınmalısınız.

### Birden Fazla Sunucuda Bakım Modu

Varsayılan olarak, Laravel uygulamanızın dosya tabanlı bir sistem kullanarak bakım modunda olup olmadığını belirler. Bu, bakım modunu etkinleştirmek için php artisan down komutunun uygulamanızı barındıran her sunucuda çalıştırılması gerektiği anlamına gelir.

Alternatif olarak, Laravel bakım modunu ele almak için önbellek tabanlı bir yöntem sunar. Bu yöntem, php artisan down komutunun yalnızca bir sunucuda çalıştırılmasını gerektirir. Bu yaklaşımı kullanmak için uygulamanızın .env dosyasındaki bakım modu değişkenlerini değiştirin. Tüm sunucularınız tarafından erişilebilen bir önbellek deposu seçmelisiniz. Bu, bakım modu durumının her sunucuda tutarlı bir şekilde korunmasını sağlar:

```
APP_MAINTENANCE_DRIVER=cache
APP_MAINTENANCE_STORE=database
```

### Bakım Modu Görünümünü Önceden Render Etme

Dağıtım sırasında php artisan down komutunu kullanırsanız, Composer bağımlılıklarınız veya diğer altyapı bileşenleri güncellenirken uygulamaya erişirlerse kullanıcılarınız hala ara sıra hatalarla karşılaşabilir. Bu, Laravel çerçevesinin önemli bir kısmının uygulamanızın bakım modunda olduğunu belirlemek ve şablon motorunu kullanarak bakım modu görünümünü render etmek için önyükleme yapması gerektiği için oluşur.

Bu nedenle, Laravel istek döngüsünün başında döndürülecek bir bakım modu görünümünü önceden render etmenize olanak tanır. Bu görünüm, uygulamanızın bağımlılıkları yüklenmeden önce render edilir. Down komutunun render seçeneğini kullanarak seçtiğiniz şablonu önceden render edebilirsiniz:

```bash
php artisan down --render="errors::503"
```

### Bakım Modu İsteklerini Yönlendirme

Bakım modundayken, Laravel kullanıcının erişmeye çalıştığı tüm uygulama URL'leri için bakım modu görünümünü görüntüleyecektir. İsterseniz, Laravel'e tüm istekleri belirli bir URL'ye yönlendirmesi talimatını verebilirsiniz. Bu, redirect seçeneği kullanılarak gerçekleştirilebilir. Örneğin, tüm istekleri / URI'sine yönlendirmek isteyebilirsiniz:

```bash
php artisan down --redirect=/
```

### Bakım Modunu Devre Dışı Bırakma

Bakım modunu devre dışı bırakmak için up komutunu kullanın:

```bash
php artisan up
```

resources/views/errors/503.blade.php konumunda kendi şablonunuzu tanımlayarak varsayılan bakım modu şablonunu özelleştirebilirsiniz.

### Bakım Modu ve Kuyruklar

Uygulamanız bakım modundayken, hiçbir kuyruktaki iş işlenmeyecektir. İşler, uygulama bakım modundan çıktıktan sonra normal şekilde işlenmeye devam edecektir.

### Bakım Moduna Alternatifler

Bakım modu uygulamanızın birkaç saniye kesinti yaşamasını gerektirdiğinden, Laravel ile sıfır kesinti dağıtımı gerçekleştirmek için Laravel Cloud gibi tamamen yönetilen bir platformda uygulamalarınızı çalıştırmayı düşünün.

# Dizin Yapısı

## Giriş

Varsayılan Laravel uygulama yapısı, hem büyük hem de küçük uygulamalar için harika bir başlangıç noktası sağlamak amacıyla tasarlanmıştır. Ancak uygulamanızı istediğiniz şekilde organize etmekte özgürsünüz. Laravel, herhangi bir sınıfın nerede bulunduğu konusunda neredeyse hiçbir kısıtlama getirmez - Composer sınıfı otomatik yükleyebildiği sürece.

## Kök Dizin

### App Dizini

App dizini, uygulamanızın temel kodunu içerir. Bu dizini yakında daha ayrıntılı olarak keşfedeceğiz; ancak, uygulamanızdaki sınıfların neredeyse tamamı bu dizinde olacaktır.

### Bootstrap Dizini

Bootstrap dizini, çerçeveyi önyükleyen app.php dosyasını içerir. Bu dizin ayrıca rota ve hizmet önbellek dosyaları gibi performans optimizasyonu için çerçeve tarafından oluşturulan dosyaları içeren bir cache dizini barındırır.

### Config Dizini

Config dizini, adından da anlaşılacağı gibi, uygulamanızın tüm yapılandırma dosyalarını içerir. Tüm bu dosyaları okumak ve mevcut seçenekleri tanımak harika bir fikirdir.

### Database Dizini

Database dizini, veritabanı migration'larınızı, model fabrikalarını ve seed'leri içerir. İsterseniz, bu dizini bir SQLite veritabanı barındırmak için de kullanabilirsiniz.

### Public Dizini

Public dizini, uygulamanıza giren tüm isteklerin giriş noktası olan ve otomatik yüklemeyi yapılandıran index.php dosyasını içerir. Bu dizin ayrıca resimler, JavaScript ve CSS gibi varlıklarınızı da barındırır.

### Resources Dizini

Resources dizini, görünümlerinizi ve CSS veya JavaScript gibi ham, derlenmemiş varlıklarınızı içerir.

### Routes Dizini

Routes dizini, uygulamanız için tüm rota tanımlarını içerir. Varsayılan olarak, Laravel ile iki rota dosyası dahildir: web.php ve console.php.

web.php dosyası, Laravel'in web middleware grubuna yerleştirdiği rotaları içerir; bu grup oturum durumu, CSRF koruması ve çerez şifreleme sağlar. Uygulamanız duruma bağlı olmayan, RESTful bir API sunmuyorsa, tüm rotalarınız büyük olasılıkla web.php dosyasında tanımlanacaktır.

console.php dosyası, tüm closure tabanlı konsol komutlarınızı tanımlayabileceğiniz yerdir. Her closure bir komut örneğine bağlanır ve her komutun IO metodlarıyla etkileşim kurmanın basit bir yolunu sağlar. Bu dosya HTTP rotaları tanımlamasa da, uygulamanıza konsol tabanlı giriş noktaları (rotalar) tanımlar. Ayrıca console.php dosyasında görevleri zamanlayabilirsiniz.

İsteğe bağlı olarak, install:api ve install:broadcasting Artisan komutları aracılığıyla API rotaları (api.php) ve yayın kanalları (channels.php) için ek rota dosyaları kurabilirsiniz.

api.php dosyası, duruma bağlı olmayan rotaları içerir, bu nedenle bu rotalar aracılığıyla uygulamaya giren isteklerin token'lar aracılığıyla kimlik doğrulaması yapılması amaçlanır ve oturum durumuna erişimleri olmayacaktır.

channels.php dosyası, uygulamanızın desteklediği tüm olay yayını kanallarını kaydettiğiniz yerdir.

### Storage Dizini

Storage dizini, log'larınızı, derlenmiş Blade şablonlarını, dosya tabanlı oturumları, dosya önbelleklerini ve çerçeve tarafından oluşturulan diğer dosyaları içerir. Bu dizin app, framework ve logs dizinlerine ayrılmıştır. App dizini, uygulamanız tarafından oluşturulan herhangi bir dosyayı saklamak için kullanılabilir. Framework dizini, çerçeve tarafından oluşturulan dosya ve önbellekleri saklamak için kullanılır. Son olarak, logs dizini uygulamanızın log dosyalarını içerir.

storage/app/public dizini, profil avatarları gibi herkese açık olması gereken kullanıcı tarafından oluşturulan dosyaları saklamak için kullanılabilir. Bu dizine işaret eden public/storage konumunda sembolik bir bağlantı oluşturmalısınız. php artisan storage:link Artisan komutunu kullanarak bağlantıyı oluşturabilirsiniz.

### Tests Dizini

Tests dizini, otomatik testlerinizi içerir. Örnek Pest veya PHPUnit birim testleri ve özellik testleri kutudan çıktığı haliyle sağlanır. Her test sınıfı Test kelimesi ile son eklenmelidir. Testlerinizi /vendor/bin/pest veya /vendor/bin/phpunit komutlarını kullanarak çalıştırabilirsiniz. Veya test sonuçlarınızın daha ayrıntılı ve güzel bir temsilini istiyorsanız, php artisan test Artisan komutunu kullanarak testlerinizi çalıştırabilirsiniz.

### Vendor Dizini

Vendor dizini, Composer bağımlılıklarınızı içerir.

## App Dizini

Uygulamanızın çoğunluğu app dizininde barınır. Varsayılan olarak, bu dizin App namespace'i altında isimlendirilmiştir ve PSR-4 otomatik yükleme standardını kullanarak Composer tarafından otomatik yüklenir.

Varsayılan olarak, app dizini Http, Models ve Providers dizinlerini içerir. Ancak zamanla, sınıf oluşturmak için make Artisan komutlarını kullandıkça app dizini içinde çeşitli diğer dizinler oluşturulacaktır. Örneğin, bir komut sınıfı oluşturmak için make:command Artisan komutunu çalıştırana kadar app/Console dizini mevcut olmayacaktır.

Console ve Http dizinleri aşağıda ilgili bölümlerinde daha ayrıntılı olarak açıklanmıştır, ancak Console ve Http dizinlerini uygulamanızın çekirdeğine bir API sağlayan şeyler olarak düşünün. HTTP protokolü ve CLI'nin her ikisi de uygulamanızla etkileşim kurma mekanizmalarıdır, ancak aslında uygulama mantığı içermezler. Başka bir deyişle, bunlar uygulamanıza komut vermenin iki yoludur. Console dizini tüm Artisan komutlarınızı içerirken, Http dizini kontrolörlerinizi, middleware'lerinizi ve isteklerinizi içerir.

App dizinindeki sınıfların çoğu Artisan aracılığıyla komutlar ile oluşturulabilir. Mevcut komutları gözden geçirmek için terminalinizde php artisan list make komutunu çalıştırın.

### Broadcasting Dizini

Broadcasting dizini, uygulamanız için tüm yayın kanalı sınıflarını içerir. Bu sınıflar make:channel komutu kullanılarak oluşturulur. Bu dizin varsayılan olarak mevcut değildir, ancak ilk kanalınızı oluşturduğunuzda sizin için oluşturulacaktır. Kanallar hakkında daha fazla bilgi edinmek için olay yayını belgelerine göz atın.

### Console Dizini

Console dizini, uygulamanız için tüm özel Artisan komutlarını içerir. Bu komutlar make:command komutu kullanılarak oluşturulabilir.

### Events Dizini

Bu dizin varsayılan olarak mevcut değildir, ancak event:generate ve make:event Artisan komutları tarafından sizin için oluşturulacaktır. Events dizini olay sınıflarını barındırır. Olaylar, belirli bir eylemin gerçekleştiğini uygulamanızın diğer bölümlerine bildirmek için kullanılabilir ve büyük bir esneklik ve ayrıştırma sağlar.

### Exceptions Dizini

Exceptions dizini, uygulamanız için tüm özel istisnaları içerir. Bu istisnalar make:exception komutu kullanılarak oluşturulabilir.

### Http Dizini

Http dizini, kontrolörlerinizi, middleware'lerinizi ve form isteklerinizi içerir. Uygulamanıza giren istekleri işlemek için mantığın neredeyse tamamı bu dizine yerleştirilecektir.

### Jobs Dizini

Bu dizin varsayılan olarak mevcut değildir, ancak make:job Artisan komutunu çalıştırırsanız sizin için oluşturulacaktır. Jobs dizini, uygulamanız için kuyruğa alınabilir işleri barındırır. İşler uygulamanız tarafından kuyruğa alınabilir veya mevcut istek yaşam döngüsü içinde eşzamanlı olarak çalıştırılabilir. Mevcut istek sırasında eşzamanlı çalışan işler, komut deseninin bir uygulaması oldukları için bazen "komutlar" olarak adlandırılırlar.

### Listeners Dizini

Bu dizin varsayılan olarak mevcut değildir, ancak event:generate veya make:listener Artisan komutlarını çalıştırırsanız sizin için oluşturulacaktır. Listeners dizini, olaylarınızı işleyen sınıfları içerir. Olay dinleyicileri bir olay örneği alır ve olayın tetiklenmesine yanıt olarak mantık gerçekleştirir. Örneğin, bir UserRegistered olayı SendWelcomeEmail dinleyicisi tarafından işlenebilir.

### Mail Dizini

Bu dizin varsayılan olarak mevcut değildir, ancak make:mail Artisan komutunu çalıştırırsanız sizin için oluşturulacaktır. Mail dizini, uygulamanız tarafından gönderilen e-postaları temsil eden tüm sınıflarınızı içerir. Mail nesneleri, Mail::send metodu kullanılarak gönderilebilen tek, basit bir sınıfta e-posta oluşturma mantığının tamamını kapsüllemenize olanak tanır.

### Models Dizini

Models dizini, tüm Eloquent model sınıflarınızı içerir. Laravel ile birlikte gelen Eloquent ORM, veritabanınızla çalışmak için güzel, basit bir ActiveRecord uygulaması sağlar. Her veritabanı tablosunun o tablo ile etkileşim kurmak için kullanılan karşılık gelen bir "Model"i vardır. Modeller, tablolarınızdaki verileri sorgulamanıza ve tabloya yeni kayıtlar eklemenize olanak tanır.

### Notifications Dizini

Bu dizin varsayılan olarak mevcut değildir, ancak make:notification Artisan komutunu çalıştırırsanız sizin için oluşturulacaktır. Notifications dizini, uygulamanızın uygulamanızda gerçekleşen olaylar hakkında basit bildirimler gibi gönderdiği tüm "işlemsel" bildirimleri içerir. Laravel'in bildirim özelliği, e-posta, Slack, SMS gibi çeşitli sürücüler üzerinden veya bir veritabanında saklanan bildirimler gönderme işlemini soyutlar.

### Policies Dizini

Bu dizin varsayılan olarak mevcut değildir, ancak make:policy Artisan komutunu çalıştırırsanız sizin için oluşturulacaktır. Policies dizini, uygulamanız için yetkilendirme politikası sınıflarını içerir. Politikalar, bir kullanıcının bir kaynak üzerinde belirli bir eylemi gerçekleştirip gerçekleştiremeyeceğini belirlemek için kullanılır.

### Providers Dizini

Providers dizini, uygulamanız için tüm hizmet sağlayıcılarını içerir. Hizmet sağlayıcıları, hizmet konteynerinde hizmetleri bağlayarak, olayları kaydederek veya uygulamanızı gelen isteklere hazırlamak için başka görevler gerçekleştirerek uygulamanızı önyükler.

Yeni bir Laravel uygulamasında, bu dizin zaten AppServiceProvider'ı içerecektir. Gerektiğinde bu dizine kendi sağlayıcılarınızı eklemekte özgürsünüz.

### Rules Dizini

Bu dizin varsayılan olarak mevcut değildir, ancak make:rule Artisan komutunu çalıştırırsanız sizin için oluşturulacaktır. Rules dizini, uygulamanız için özel doğrulama kuralı nesnelerini içerir. Kurallar, karmaşık doğrulama mantığını basit bir nesnede kapsüllemek için kullanılır. Daha fazla bilgi için doğrulama belgelerine göz atın.

# Frontend

## Giriş

Laravel, routing, doğrulama, önbelleğe alma, kuyruklar, dosya depolama ve daha fazlası gibi modern web uygulamaları oluşturmak için ihtiyacınız olan tüm özellikleri sağlayan bir backend çerçevesidir. Ancak, geliştiricilere uygulamalarının frontend'ini oluşturmak için güçlü yaklaşımlar da dahil olmak üzere güzel bir full-stack deneyim sunmanın önemli olduğuna inanıyoruz.

Laravel ile bir uygulama oluştururken frontend geliştirmeye yaklaşmanın iki temel yolu vardır ve hangi yaklaşımı seçeceğiniz, frontend'inizi PHP'den yararlanarak mı yoksa Vue ve React gibi JavaScript çerçevelerini kullanarak mı oluşturmak istediğinize bağlıdır. Uygulamanız için frontend geliştirmeye en iyi yaklaşım konusunda bilinçli bir karar verebilmeniz için aşağıda bu seçeneklerin her ikisini de tartışacağız.

## PHP Kullanarak

### PHP ve Blade

Geçmişte, çoğu PHP uygulaması, istek sırasında veritabanından alınan verileri render eden PHP echo ifadeleriyle serpiştirilmiş basit HTML şablonları kullanarak tarayıcıya HTML render ediyordu:

```php
<div>
    <?php foreach ($users as $user): ?>
        Hello, <?php echo $user->name; ?> <br />
    <?php endforeach; ?>
</div>
```

Laravel'de, HTML render etme yaklaşımı views ve Blade kullanarak hala gerçekleştirilebilir. Blade, veri görüntüleme, veri üzerinde iterasyon ve daha fazlası için uygun, kısa sözdizimi sağlayan son derece hafif bir şablon dilidir:

```blade
<div>
    @foreach ($users as $user)
        Hello, {{ $user->name }} <br />
    @endforeach
</div>
```

Uygulamaları bu şekilde oluştururken, form gönderileri ve diğer sayfa etkileşimleri genellikle sunucudan tamamen yeni bir HTML belgesi alır ve tüm sayfa tarayıcı tarafından yeniden render edilir. Bugün bile, birçok uygulama frontend'lerini basit Blade şablonları kullanarak bu şekilde oluşturmaya mükemmel şekilde uygun olabilir.

### Artan Beklentiler

Ancak, web uygulamalarına ilişkin kullanıcı beklentileri olgunlaştıkça, birçok geliştirici daha cilalı hissettiren etkileşimlerle daha dinamik frontend'ler oluşturma ihtiyacı duymuştur. Bu ışıkta, bazı geliştiriciler uygulamalarının frontend'ini Vue ve React gibi JavaScript çerçevelerini kullanarak oluşturmaya başlamayı tercih ederler.

Diğerleri, rahat ettikleri backend diliyle kalmayı tercih ederek, hala öncelikli olarak tercih ettikleri backend dilini kullanırken modern web uygulaması UI'larının oluşturulmasına olanak tanıyan çözümler geliştirmişlerdir. Örneğin, Rails ekosisteminde, bu Turbo Hotwire ve Stimulus gibi kütüphanelerin oluşturulmasını teşvik etmiştir.

Laravel ekosistemi içinde, öncelikli olarak PHP kullanarak modern, dinamik frontend'ler oluşturma ihtiyacı Laravel Livewire ve Alpine.js'in oluşturulmasına yol açmıştır.

### Livewire

Laravel Livewire, Vue ve React gibi modern JavaScript çerçeveleriyle oluşturulan frontend'ler gibi dinamik, modern ve canlı hissettiren Laravel destekli frontend'ler oluşturmak için bir çerçevedir.

Livewire kullanırken, UI'nızın ayrı bir bölümünü render eden ve uygulamanızın frontend'inden çağrılabilecek ve etkileşimde bulunulabilecek metodlar ve veriler sunan Livewire "bileşenleri" oluşturacaksınız. Örneğin, basit bir "Sayaç" bileşeni şu şekilde görünebilir:

```php
<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $count = 0;

    public function increment()
    {
        $this->count++;
    }

    public function render()
    {
        return view('livewire.counter');
    }
}
```

Ve sayaca karşılık gelen şablon şu şekilde yazılacaktır:

```blade
<div>
    <button wire:click="increment">+</button>
    <h1>{{ $count }}</h1>
</div>
```

Gördüğünüz gibi, Livewire Laravel uygulamanızın frontend'i ve backend'ini bağlayan wire:click gibi yeni HTML öznitelikleri yazmanıza olanak tanır. Ayrıca, basit Blade ifadeleri kullanarak bileşeninizin mevcut durumunu render edebilirsiniz.

Birçoğu için Livewire, Laravel ile frontend geliştirmede devrim yaratmış, modern, dinamik web uygulamaları oluştururken Laravel'in rahatlığında kalmalarına olanak tanımıştır. Genellikle, Livewire kullanan geliştiriciler ayrıca frontend'lerine yalnızca gerekli olduğu yerlerde, örneğin bir dialog penceresi render etmek için Alpine.js kullanarak JavaScript "serpiştireceklerdir".

Laravel'e yeniyseniz, views ve Blade'in temel kullanımını öğrenmenizi öneririz. Ardından, etkileşimli Livewire bileşenleriyle uygulamanızı bir sonraki seviyeye nasıl taşıyacağınızı öğrenmek için resmi Laravel Livewire belgelerine başvurun.

### Başlangıç Kitleri

Frontend'inizi PHP ve Livewire kullanarak oluşturmak istiyorsanız, uygulamanızın geliştirmesini hızlandırmak için Livewire başlangıç kitimizden yararlanabilirsiniz.

## React veya Vue Kullanarak

Laravel ve Livewire kullanarak modern frontend'ler oluşturmak mümkün olsa da, birçok geliştirici hala React veya Vue gibi JavaScript çerçevelerinin gücünden yararlanmayı tercih ediyor. Bu, geliştiricilerin NPM aracılığıyla mevcut zengin JavaScript paket ve araç ekosisteminden yararlanmalarına olanak tanır.

Ancak, ek araç olmadan, Laravel'i React veya Vue ile eşleştirmek, istemci tarafı routing, veri hidrasyonu ve kimlik doğrulama gibi çeşitli karmaşık problemleri çözmemizi gerektirir. İstemci tarafı routing genellikle Next ve Nuxt gibi opinionated React / Vue çerçeveleri kullanılarak basitleştirilir; ancak veri hidrasyonu ve kimlik doğrulama, Laravel gibi bir backend çerçevesini bu frontend çerçeveleriyle eşleştirirken çözülmesi karmaşık ve zahmetli problemler olarak kalır.

Ayrıca, geliştiriciler iki ayrı kod deposunu sürdürmek zorunda kalır, genellikle her iki depoda da bakım, sürümler ve dağıtımları koordine etmeleri gerekir. Bu problemler aşılmaz olmasa da, bunun uygulamalar geliştirmek için üretken veya keyifli bir yol olduğuna inanmıyoruz.

### Inertia

Neyse ki, Laravel her iki dünyanın da en iyisini sunar. Inertia, Laravel uygulamanız ile modern React veya Vue frontend'iniz arasındaki boşluğu kapatır, routing, veri hidrasyonu ve kimlik doğrulama için Laravel rotalarını ve kontrolörlerini kullanırken React veya Vue kullanarak tam teşekküllü, modern frontend'ler oluşturmanıza olanak tanır — hepsi tek bir kod deposu içinde. Bu yaklaşımla, her iki aracın yeteneklerini felç etmeden hem Laravel hem de React / Vue'nun tam gücünün keyfini çıkarabilirsiniz.

Inertia'yı Laravel uygulamanıza kurduktan sonra, rotalar ve kontrolörleri normal şekilde yazacaksınız. Ancak, kontrolörünüzden bir Blade şablonu döndürmek yerine, bir Inertia sayfası döndüreceksiniz:

```php
<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Inertia\Response;

class UserController extends Controller
{
    /**
     * Show the profile for a given user.
     */
    public function show(string $id): Response
    {
        return Inertia::render('users/show', [
            'user' => User::findOrFail($id)
        ]);
    }
}
```

Bir Inertia sayfası, genellikle uygulamanızın resources/js/pages dizininde saklanan bir React veya Vue bileşenine karşılık gelir. Inertia::render metodu aracılığıyla sayfaya verilen veriler, sayfa bileşeninin "props"larını hidratlamak için kullanılacaktır:

```javascript
import Layout from '@/layouts/authenticated';
import { Head } from '@inertiajs/react';

export default function Show({ user }) {
    return (
        <Layout>
            <Head title="Welcome" />
            <h1>Welcome</h1>
            <p>Hello {user.name}, welcome to Inertia.</p>
        </Layout>
    )
}
```

Gördüğünüz gibi, Inertia frontend'inizi oluştururken React veya Vue'nun tam gücünden yararlanmanıza olanak tanırken, Laravel destekli backend'iniz ile JavaScript destekli frontend'iniz arasında hafif bir köprü sağlar.

### Sunucu Tarafı Rendering

Uygulamanız sunucu tarafı rendering gerektirdiği için Inertia'ya dalmaktan endişe ediyorsanız, endişelenmeyin. Inertia sunucu tarafı rendering desteği sunar. Ve uygulamanızı Laravel Cloud veya Laravel Forge aracılığıyla dağıttığınızda, Inertia'nın sunucu tarafı rendering sürecinin her zaman çalıştığından emin olmak çok kolaydır.

### Başlangıç Kitleri

Frontend'inizi Inertia ve Vue / React kullanarak oluşturmak istiyorsanız, uygulamanızın geliştirmesini hızlandırmak için React veya Vue uygulama başlangıç kitlerinden yararlanabilirsiniz. Bu başlangıç kitlerinin her ikisi de Inertia, Vue / React, Tailwind ve Vite kullanarak uygulamanızın backend ve frontend kimlik doğrulama akışını iskeletler, böylece bir sonraki büyük fikrinizi oluşturmaya başlayabilirsiniz.

## Varlıkları Paketleme

Frontend'inizi Blade ve Livewire kullanarak mı yoksa Vue / React ve Inertia kullanarak mı geliştirmeyi seçerseniz seçin, muhtemelen uygulamanızın CSS'ini üretime hazır varlıklara paketlemeniz gerekecektir. Tabii ki, uygulamanızın frontend'ini Vue veya React ile oluşturmayı seçerseniz, bileşenlerinizi tarayıcıya hazır JavaScript varlıklarına paketlemeniz de gerekecektir.

Varsayılan olarak, Laravel varlıklarınızı paketlemek için Vite kullanır. Vite şimşek hızında build süreleri ve yerel geliştirme sırasında neredeyse anlık Hot Module Replacement (HMR) sağlar. Başlangıç kitlerini kullananlar da dahil olmak üzere tüm yeni Laravel uygulamalarında, Vite'ı Laravel uygulamalarıyla kullanmanın keyfini çıkaran hafif Laravel Vite eklentimizi yükleyen bir vite.config.js dosyası bulacaksınız.

Laravel ve Vite ile başlamanın en hızlı yolu, frontend ve backend kimlik doğrulama iskeletini sağlayarak uygulamanızı hızlandıran uygulama başlangıç kitlerini kullanarak uygulamanızın geliştirmesine başlamaktır.

Vite'ı Laravel ile kullanma konusunda daha ayrıntılı belgeler için, varlıklarınızı paketleme ve derleme konusundaki özel belgelerimize bakın.

# Dağıtım

## Giriş

Laravel uygulamanızı üretime dağıtmaya hazır olduğunuzda, uygulamanızın mümkün olduğunca verimli çalışmasını sağlamak için yapabileceğiniz bazı önemli şeyler vardır. Bu belgede, Laravel uygulamanızın düzgün bir şekilde dağıtıldığından emin olmak için harika başlangıç noktalarını ele alacağız.

## Sunucu Gereksinimleri

Laravel framework'ünün bazı sistem gereksinimleri vardır. Web sunucunuzun aşağıdaki minimum PHP sürümüne ve eklentilere sahip olduğundan emin olmalısınız:

- PHP >= 8.2
- Ctype PHP Eklentisi
- cURL PHP Eklentisi
- DOM PHP Eklentisi
- Fileinfo PHP Eklentisi
- Filter PHP Eklentisi
- Hash PHP Eklentisi
- Mbstring PHP Eklentisi
- OpenSSL PHP Eklentisi
- PCRE PHP Eklentisi
- PDO PHP Eklentisi
- Session PHP Eklentisi
- Tokenizer PHP Eklentisi
- XML PHP Eklentisi

## Sunucu Yapılandırması

### Nginx

Uygulamanızı Nginx çalıştıran bir sunucuya dağıtıyorsanız, web sunucunuzu yapılandırmak için aşağıdaki yapılandırma dosyasını başlangıç noktası olarak kullanabilirsiniz. Büyük olasılıkla, bu dosya sunucunuzun yapılandırmasına göre özelleştirilecektir. Sunucunuzu yönetme konusunda yardım almak isterseniz, Laravel Cloud gibi tamamen yönetilen bir Laravel platformu kullanmayı düşünebilirsiniz.

Aşağıdaki yapılandırmada olduğu gibi, web sunucunuzun tüm istekleri uygulamanızın public/index.php dosyasına yönlendirdiğinden emin olun. index.php dosyasını projenizin köküne taşımaya asla çalışmamalısınız, çünkü uygulamayı proje kökünden sunmak birçok hassas yapılandırma dosyasını herkese açık hale getirir:

```
server {
    listen 80;
    listen [::]:80;
    server_name example.com;
    root /srv/example.com/public;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";

    index index.php;
    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ ^/index\.php(/|$) {
        fastcgi_pass unix:/var/run/php/php8.2-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
        fastcgi_hide_header X-Powered-By;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

### FrankenPHP

Laravel uygulamalarınızı sunmak için FrankenPHP de kullanılabilir. FrankenPHP, Go ile yazılmış modern bir PHP uygulama sunucusudur. FrankenPHP ile bir Laravel uygulamasını sunmak için sadece şu komutu çalıştırabilirsiniz:

```
frankenphp php-server -r public/
```

FrankenPHP'nin Laravel Octane entegrasyonu, HTTP/3, modern sıkıştırma veya Laravel uygulamalarını bağımsız ikili dosyalar olarak paketleme gibi daha güçlü özelliklerinden yararlanmak için FrankenPHP'nin Laravel dokümantasyonuna bakın.

## Dizin İzinleri

Laravel'in bootstrap/cache ve storage dizinlerine yazabilmesi gerekecektir, bu nedenle web sunucusu işlem sahibinin bu dizinlere yazma iznine sahip olduğundan emin olmalısınız.

## Optimizasyon

Uygulamanızı üretime dağıtırken, yapılandırma, olaylar, rotalar ve görünümler dahil olmak üzere çeşitli dosyaların önbelleğe alınması gerekir. Laravel, tüm bu dosyaları önbelleğe alacak tek, kullanışlı bir optimize Artisan komutu sağlar. Bu komut genellikle uygulamanızın dağıtım sürecinin bir parçası olarak çalıştırılmalıdır:

```
php artisan optimize
```

optimize:clear komutu, optimize komutu tarafından oluşturulan tüm önbellek dosyalarını ve varsayılan önbellek sürücüsündeki tüm anahtarları kaldırmak için kullanılabilir:

```
php artisan optimize:clear
```

Aşağıdaki belgelerde, optimize komutu tarafından çalıştırılan her bir ayrıntılı optimizasyon komutunu ele alacağız.

### Yapılandırma Önbelleğe Alma

Uygulamanızı üretime dağıtırken, dağıtım sürecinizde config:cache Artisan komutunu çalıştırdığınızdan emin olmalısınız:

```
php artisan config:cache
```

Bu komut, Laravel'in tüm yapılandırma dosyalarını tek bir önbelleğe alınmış dosyada birleştirir, bu da framework'ün yapılandırma değerlerini yüklerken dosya sistemine yaptığı erişim sayısını büyük ölçüde azaltır.

Dağıtım sürecinizde config:cache komutunu çalıştırırsanız, env fonksiyonunu yalnızca yapılandırma dosyalarınızdan çağırdığınızdan emin olmalısınız. Yapılandırma önbelleğe alındıktan sonra, .env dosyası yüklenmeyecek ve .env değişkenleri için env fonksiyonuna yapılan tüm çağrılar null döndürecektir.

### Olayları Önbelleğe Alma

Dağıtım sürecinizde uygulamanızın otomatik keşfedilen olay-dinleyici eşlemelerini önbelleğe almalısınız. Bu, dağıtım sırasında event:cache Artisan komutunu çağırarak yapılabilir:

```
php artisan event:cache
```

### Rotaları Önbelleğe Alma

Birçok rotaya sahip büyük bir uygulama oluşturuyorsanız, dağıtım sürecinizde route:cache Artisan komutunu çalıştırdığınızdan emin olmalısınız:

```
php artisan route:cache
```

Bu komut, tüm rota kayıtlarınızı önbelleğe alınmış bir dosyada tek bir metod çağrısına indirger ve yüzlerce rota kaydı yapılırken rota kaydının performansını artırır.

### Görünümleri Önbelleğe Alma

Uygulamanızı üretime dağıtırken, dağıtım sürecinizde view:cache Artisan komutunu çalıştırdığınızdan emin olmalısınız:

```
php artisan view:cache
```

Bu komut, tüm Blade görünümlerinizi önceden derler, böylece istek sırasında derlenmezler ve bir görünüm döndüren her isteğin performansını artırır.

## Debug Modu

config/app.php yapılandırma dosyanızdaki debug seçeneği, bir hata hakkında kullanıcıya ne kadar bilgi görüntüleneceğini belirler. Varsayılan olarak, bu seçenek .env dosyanızda saklanan APP_DEBUG ortam değişkeninin değerini dikkate alacak şekilde ayarlanmıştır.

Üretim ortamınızda, bu değer her zaman false olmalıdır. APP_DEBUG değişkeni üretimde true olarak ayarlanırsa, hassas yapılandırma değerlerini uygulamanızın son kullanıcılarına ifşa etme riskiyle karşı karşıya kalırsınız.

## Health Route

Laravel, uygulamanızın durumunu izlemek için kullanılabilecek yerleşik bir sağlık kontrol rotası içerir. Üretimde, bu rota uygulamanızın durumunu bir uptime monitor, yük dengeleyici veya Kubernetes gibi bir orkestrasyon sistemine raporlamak için kullanılabilir.

Varsayılan olarak, sağlık kontrol rotası /up adresinde sunulur ve uygulama istisnasız başlatıldıysa 200 HTTP yanıtı döndürür. Aksi takdirde, 500 HTTP yanıtı döndürülür. Bu rotanın URI'sini uygulamanızın bootstrap/app dosyasında yapılandırabilirsiniz:

```php
->withRouting(
    web: __DIR__.'/../routes/web.php',
    commands: __DIR__.'/../routes/console.php',
    health: '/up', 
    health: '/status', 
)
```

Bu rotaya HTTP istekleri yapıldığında, Laravel ayrıca Illuminate\Foundation\Events\DiagnosingHealth etkinliğini tetikler ve uygulamanızla ilgili ek sağlık kontrolleri gerçekleştirmenize olanak tanır. Bu etkinlik için bir dinleyicide, uygulamanızın veritabanı veya önbellek durumunu kontrol edebilirsiniz. Uygulamanızda bir sorun tespit ederseniz, dinleyiciden basitçe bir istisna fırlatabilirsiniz.

## Laravel Cloud veya Forge ile Dağıtım

### Laravel Cloud

Tamamen yönetilen, otomatik ölçeklenen ve Laravel'e özel bir dağıtım platformu istiyorsanız, Laravel Cloud'a göz atın. Laravel Cloud, yönetilen compute, veritabanları, önbellekler ve nesne depolama sunan sağlam bir dağıtım platformudur.

Laravel uygulamanızı Cloud'da başlatın ve ölçeklenebilir sadeliğe aşık olun. Laravel Cloud, Laravel'in yaratıcıları tarafından framework ile sorunsuz çalışacak şekilde ince ayarlanmıştır, böylece Laravel uygulamalarınızı alıştığınız gibi yazmaya devam edebilirsiniz.

### Laravel Forge

Kendi sunucularınızı yönetmeyi tercih ediyor ancak sağlam bir Laravel uygulaması çalıştırmak için gereken çeşitli hizmetleri yapılandırmakta rahat değilseniz, Laravel Forge Laravel uygulamaları için bir VPS sunucu yönetim platformudur.

Laravel Forge, DigitalOcean, Linode, AWS ve daha fazlası gibi çeşitli altyapı sağlayıcılarında sunucular oluşturabilir. Ayrıca, Forge sağlam Laravel uygulamaları oluşturmak için gereken tüm araçları (Nginx, MySQL, Redis, Memcached, Beanstalk ve daha fazlası) kurar ve yönetir.