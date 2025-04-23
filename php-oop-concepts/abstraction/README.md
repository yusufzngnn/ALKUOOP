# PHP'de Soyutlama (Abstraction)

Soyutlama, karmaşık yapıları basitleştirerek sadece gerekli olan detayları göstermemizi sağlar. PHP'de soyutlama, soyut sınıflar ve soyut metotlar ile gerçekleştirilir.

## Soyut Sınıflar

Soyut sınıflar doğrudan örneklenemez, sadece miras alınabilir. Hem soyut (gövdesiz) hem de somut (gövdeli) metotlar içerebilirler.

## Soyut Metotlar

Soyut metotlar yalnızca tanımlanır, gövdeleri olmaz. Bu metotlar, soyut sınıftan türeyen sınıflarda mutlaka uygulanmalıdır.

## Örnek

Aşağıdaki örnekte, `Sekil` adında bir soyut sınıf ve bu sınıftan türeyen `Daire` ile `Dikdortgen` sınıfları yer almaktadır. Her iki sınıf da `alanHesapla` metodunu kendine göre uygular.

### Kod Örneği

```php
// example.php

abstract class Sekil {
    abstract public function alanHesapla();
}

class Daire extends Sekil {
    private $yaricap;
    public function __construct($yaricap) {
        $this->yaricap = $yaricap;
    }
    public function alanHesapla() {
        return pi() * $this->yaricap * $this->yaricap;
    }
}

class Dikdortgen extends Sekil {
    private $genislik;
    private $yukseklik;
    public function __construct($genislik, $yukseklik) {
        $this->genislik = $genislik;
        $this->yukseklik = $yukseklik;
    }
    public function alanHesapla() {
        return $this->genislik * $this->yukseklik;
    }
}

$daire = new Daire(5);
echo "Daire Alanı: " . $daire->alanHesapla() . "\n";

$dikdortgen = new Dikdortgen(4, 6);
echo "Dikdörtgen Alanı: " . $dikdortgen->alanHesapla() . "\n";
```

Daha fazla detay için `example.php` dosyasına bakabilirsiniz.