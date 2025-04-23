<?php
// Temel sınıf
class Hayvan {
    public function sesCikar() {
        return "Bir ses";
    }
}




// Türemiş sınıf
class Kopek extends Hayvan {
    public function sesCikar() {
        return "Hav hav";
    }
}



// Kullanım
$kopek = new Kopek();
echo $kopek->sesCikar(); // Çıktı: Hav hav







?>



