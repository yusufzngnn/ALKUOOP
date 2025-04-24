<?php
// yazdırılabilir arayüzü tanımla
interface IPrintable {
    public function print();
}
// arayüzü uygulayan belge sınıfı
class PDFDocument implements IPrintable {
    public function print() {
        return "PDF Belge yazdırılıyor.";
    }
}
// arayüzü uygulayan resim sınıfı
class WORDDocument implements IPrintable {
    public function print() {
        return "Word Belge yazdırılıyor.";
    }
}
// fonksiyonla Kullanım örneği
function printDocument(IPrintable $document) {
    echo $document->print();
}
// Kullanım örneği
$pdf = new PDFDocument();
$word = new WORDDocument();
printDocument($pdf); // Çıktı:PDF Belge yazdırılıyor.
echo "\n";
printDocument($word);  // Çıktı: Word Belge yazdırılıyor.
?>