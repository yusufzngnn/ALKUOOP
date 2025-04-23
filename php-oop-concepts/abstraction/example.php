<?php
// Soyut sınıf
abstract class Sekil {
    abstract public function alanHesapla();
}

// Daire sınıfı
class Daire extends Sekil {
    private $yaricap;
    public function __construct($yaricap) {
        $this->yaricap = $yaricap;
    }
    public function alanHesapla() {
        return pi() * $this->yaricap * $this->yaricap;
    }
}

// Dikdörtgen sınıfı
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

// Kullanım
$daire = new Daire(5);
echo "Daire Alanı: " . $daire->alanHesapla() . "\n";

$dikdortgen = new Dikdortgen(4, 6);
echo "Dikdörtgen Alanı: " . $dikdortgen->alanHesapla() . "\n";
?>