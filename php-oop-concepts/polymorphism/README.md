# Polimorfizm (Polymorphism)

Polimorfizm, nesne yönelimli programlamanın temel prensiplerinden biridir ve "çok biçimlilik" anlamına gelir. Bu kavram, aynı metodun farklı sınıflarda farklı şekillerde davranabilme özelliğidir.

## Polimorfizmin Temel Özellikleri

1. **Çok Biçimlilik**: Farklı sınıflardaki nesneler aynı metod ismiyle farklı davranışlar sergileyebilirler.

2. **Dinamik Bağlama**: Çalışma zamanında hangi metodun çağrılacağına karar verilir (runtime polymorphism).

3. **Kod Genişletilebilirliği**: Yeni sınıflar eklendiğinde mevcut kodun değiştirilmesine gerek kalmaz.

## PHP'de Polimorfizm

PHP'de polimorfizm genellikle şu şekillerde uygulanır:

### 1. Metod Ezme (Method Overriding)

Alt sınıflar, üst sınıfın metodlarını aynı isim ve parametre yapısıyla yeniden tanımlayarak farklı davranışlar gösterebilirler.

```php
class Animal {
    public function speak() {
        return "Ses çıkarıyor";
    }
}

class Dog extends Animal {
    public function speak() {
        return "Hav hav";
    }
}

class Cat extends Animal {
    public function speak() {
        return "Miyav";
    }
}
```

### 2. Soyut Sınıflar ve Metodlar (Abstract Classes & Methods)

Soyut sınıflar, alt sınıfların uygulaması gereken şablonları tanımlar.

```php
abstract class Shape {
    abstract public function calculateArea();
}

class Circle extends Shape {
    private $radius;
    
    public function calculateArea() {
        return pi() * $this->radius * $this->radius;
    }
}
```

### 3. Arayüzler (Interfaces)

Arayüzler, sınıfların uygulamak zorunda olduğu metodları tanımlar.

```php
interface Drawable {
    public function draw();
}

class Square implements Drawable {
    public function draw() {
        return "Kare çiziliyor";
    }
}
```

## Polimorfizmin Avantajları

1. **Kod Tekrarını Azaltır**: Aynı arayüzü paylaşan farklı nesneler için ortak kod yazabilirsiniz.

2. **Genişletilebilirlik**: Mevcut kodu değiştirmeden yeni sınıflar ekleyebilirsiniz.

3. **Bakım Kolaylığı**: Kodun organizasyonu daha temiz olur ve bakımı kolaylaşır.

4. **Esneklik**: Nesneler arasında dinamik değişiklik yapılabilir.

## Gerçek Dünya Örneği

Örneğin, çeşitli ödeme yöntemleri (kredi kartı, PayPal, banka transferi) düşünelim. Hepsi farklı şekilde çalışır, ancak hepsi bir "ödeme yap" metoduna sahiptir. Polimorfizm, hangi ödeme yöntemini kullanırsanız kullanın, aynı metod adıyla işlem yapabilmenizi sağlar.

```php
interface PaymentMethod {
    public function pay($amount);
}

class CreditCard implements PaymentMethod {
    public function pay($amount) {
        // Kredi kartı işlemleri
    }
}

class PayPal implements PaymentMethod {
    public function pay($amount) {
        // PayPal işlemleri
    }
}

// Kullanımı
function processPayment(PaymentMethod $method, $amount) {
    return $method->pay($amount);
}
```

Bu README dosyasındaki örnek için `example.php` dosyasına bakabilirsiniz.