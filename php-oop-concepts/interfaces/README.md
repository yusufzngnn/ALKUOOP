# PHP'de Arayüzler (Interfaces)

Arayüzler, bir sınıfın hangi metotları içermesi gerektiğini belirten yapılardır. Arayüzler, metotların sadece imzasını barındırır; gövdesi olmaz. Bir sınıf birden fazla arayüzü uygulayabilir.

## Temel Özellikler

- **Tanımlama**: `interface` anahtar kelimesi ile tanımlanır.
- **Uygulama**: Sınıflar, arayüzleri `implements` anahtar kelimesi ile uygular.
- **Çoklu Arayüz**: Bir sınıf birden fazla arayüzü uygulayabilir.
- **Özellik (Property) içeremez**: Sadece metot imzaları bulunur.

## Örnek

Aşağıdaki örnekte, `Arac` adında bir arayüz ve bu arayüzü uygulayan `Araba` ile `Bisiklet` sınıfları bulunmaktadır.

### Kod Örneği

```php
// example.php

interface Arac {
    public function sur();
}

class Araba implements Arac {
    public function sur() {
        return "Araba sürülüyor.";
    }
}

class Bisiklet implements Arac {
    public function sur() {
        return "Bisiklet sürülüyor.";
    }
}

// Kullanım
$araba = new Araba();
echo $araba->sur(); // Çıktı: Araba sürülüyor.

$bisiklet = new Bisiklet();
echo $bisiklet->sur(); // Çıktı: Bisiklet sürülüyor.
```

## Sonuç

Arayüzler, PHP'de temiz ve düzenli bir kod yapısı oluşturmayı sağlar. Farklı sınıfların aynı arayüzü farklı şekillerde uygulamasına olanak tanır ve kodunuzu daha esnek ve sürdürülebilir hale getirir.