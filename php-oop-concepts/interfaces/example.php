<?php
// Arayüz tanımı
interface IArac {
    public function sur();
}

// Arayüzü uygulayan Araba sınıfı
class Araba implements IArac {
    public function sur() {
        return "Araba sürülüyor.";
    }
}

// Arayüzü uygulayan Bisiklet sınıfı
class Bisiklet implements IArac {
    public function sur() {
        return "Bisiklet sürülüyor.";
    }
}

// Kullanım örneği
$araba = new Araba();
$bisiklet = new Bisiklet();

echo $araba->sur(); // Çıktı: Araba sürülüyor.
echo "\n";
echo $bisiklet->sur(); // Çıktı: Bisiklet sürülüyor.
?>