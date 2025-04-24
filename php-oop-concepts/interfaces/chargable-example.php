<?php
//chargable arayüzü tanımla
interface IChargable {
    public function charge();
}
//arayüzü uygulayan androidphone sınıfı
class AndroidPhone implements IChargable {
    public function charge() {
        return "Android telefon şarj ediliyor.";
    }
}
//arayüzü uygulayan iphone sınıfı

class IPhone implements IChargable {
    public function charge() {
        return "iPhone şarj ediliyor.";
    }
}
//fonksiyonla Kullanım örneği
function chargeDevice(IChargable $device) {
    $device->charge();
}
// Kullanım örneği
$androidPhone = new AndroidPhone();
$iphone = new IPhone();
chargeDevice($androidPhone); // Çıktı: Android telefon şarj ediliyor.
echo "\n";
chargeDevice($iphone); // Çıktı: iPhone şarj ediliyor.
?>
