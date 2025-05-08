<?php
interface ISharable {
    public function share($platform);
}


// yazdırılabilir arayüzü tanımla
interface IPrintable {
    public function print();
}
// arayüzü uygulayan belge sınıfı
class PDFDocument implements IPrintable, ISharable {
    public function share($platform) {
        return "PDF Belge {$platform} platformunda paylaşılıyor.";
    }
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

function shareDocument(ISharable $document, $platform) {
    echo $document->share($platform);
}

// Kullanım örneği
$pdf = new PDFDocument();
$word = new WORDDocument();
echo "<pre style='background-color: #f0f0f0; padding: 10px;font-size: 21px;'>";
printDocument($pdf); // Çıktı:PDF Belge yazdırılıyor.
echo "\n";
printDocument($word);  // Çıktı: Word Belge yazdırılıyor.
echo "\n";
shareDocument($pdf, "Facebook"); // Çıktı: PDF Belge Facebook platformunda paylaşılıyor.

echo "</pre>";
?>