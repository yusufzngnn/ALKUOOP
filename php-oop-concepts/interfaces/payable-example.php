<?php
//Payable arayüzü tanımla
interface IPayable {
    public function pay($amount);
}
//arayüzü uygulayan kredi kartı sınıfı
class CreditCard implements IPayable {
    public function pay($amount) {
        return "Kredi kartı ile " . $amount . " TL ödendi.";
    }
}
//arayüzü uygulayan nakit sınıfı
class Cash implements IPayable {
    public function pay($amount) {
        return "Nakit olarak " . $amount . " TL ödendi.";
    }
}
//arayüzü uygulayan paypal sınıfı
class PayPal implements IPayable {
    public function pay($amount) {
        return "PayPal ile " . $amount . " TL ödendi.";
    }
}
//arayüzü uygulayan bitcoin sınıfı

//arayüzü uygulayan crypto cüzdan sınıfı
class CryptoWallet implements IPayable {
    public function pay($amount) {
        return "Kripto cüzdan ile " . $amount . " TL ödendi.";
    }
}
//arayüzü uygulayan banka transfer sınıfı
class BankTransfer implements IPayable {
    public function pay($amount) {
        return "Banka transferi ile " . $amount . " TL ödendi.";
    }
}

//fonksiyonla Kullanım örneği
function processPayment(IPayable $paymentMethod, $amount) {
    return $paymentMethod->pay($amount);
}
// Kullanım örneği
$creditCard = new CreditCard();
$cash = new Cash();
$paypal = new PayPal();
$cryptowallet = new CryptoWallet();
$bankTransfer = new BankTransfer();




echo processPayment($creditCard, 100); // Çıktı: Kredi kartı ile 100 TL ödendi.
echo "\n";
echo processPayment($cash, 50); // Çıktı: Nakit olarak 50 TL ödendi.
echo "\n";
echo processPayment($paypal, 200); // Çıktı: PayPal ile 200 TL ödendi.
echo "\n";
echo processPayment($cryptowallet, 300); // Çıktı: Kripto cüzdan ile 300 TL ödendi.
echo "\n";
echo processPayment($bankTransfer, 400); // Çıktı: Banka transferi ile 400 TL ödendi.
?>