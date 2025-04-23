# PHP'de Kalıtım (Inheritance)

Kalıtım, bir sınıfın başka bir sınıftan özellik ve metotları miras almasını sağlayan temel bir OOP kavramıdır. Bu sayede kod tekrarını önler ve sınıflar arasında hiyerarşi kurarız.

## Temel Kavramlar

- **Temel Sınıf**: Özellik ve metotları miras veren sınıf.
- **Türemiş Sınıf**: Temel sınıftan miras alan sınıf.
- **Metot Ezme (Overriding)**: Türemiş sınıfın, temel sınıftaki bir metodu kendi ihtiyacına göre yeniden yazmasıdır.

## Örnek

Aşağıdaki örnekte, `Hayvan` adında bir temel sınıf ve ondan türeyen `Kopek` sınıfı bulunmaktadır. `Kopek` sınıfı, temel sınıftaki `sesCikar` metodunu kendine özgü şekilde ezmektedir.

### Kod Örneği

```php
// example.php

class Hayvan {
    public function sesCikar() {
        return "Bir ses";
    }
}

class Kopek extends Hayvan {
    public function sesCikar() {
        return "Hav hav";
    }
}

$kopek = new Kopek();
echo $kopek->sesCikar(); // Çıktı: Hav hav
```

Bu yapı sayesinde, temel sınıftan türeyen farklı hayvan türleri kendi seslerini tanımlayabilirler. Daha fazla detay için `example.php` dosyasına bakabilirsiniz.