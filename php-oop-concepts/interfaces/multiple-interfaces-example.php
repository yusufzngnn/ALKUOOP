<?php
// Çoklu arayüz (interface) kullanımı örneği

// Ödeme işlemleri için arayüz
interface IPayable {
    public function processPayment($amount);
    public function refund($amount);
}

// Kullanıcı yönetimi için arayüz
interface IUserManageable {
    public function registerUser($username, $email);
    public function deleteUser($userId);
    public function updateUserProfile($userId, $data);
}

// Ürün yönetimi için arayüz
interface IProductManageable {
    public function addProduct($name, $price);
    public function removeProduct($productId);
    public function updateProductDetails($productId, $data);
}

// Raporlama işlemleri için arayüz
interface IReportable {
    public function generateSalesReport($startDate, $endDate);
    public function generateUserActivityReport($userId);
}

// Birden fazla arayüzü uygulayan E-ticaret platformu sınıfı
class ECommercePlatform implements IPayable, IUserManageable, IProductManageable, IReportable {
    private $platformName;
    private $users = [];
    private $products = [];
    private $transactions = [];
    
    public function __construct($platformName) {
        $this->platformName = $platformName;
    }
    
    // IPayable arayüzü metodları
    public function processPayment($amount) {
        $transactionId = uniqid('TRX-');
        $this->transactions[] = [
            'id' => $transactionId,
            'type' => 'payment',
            'amount' => $amount,
            'date' => date('Y-m-d H:i:s')
        ];
        return "Ödeme işlemi gerçekleştirildi: {$amount} TL (İşlem No: {$transactionId})";
    }
    
    public function refund($amount) {
        $refundId = uniqid('RFD-');
        $this->transactions[] = [
            'id' => $refundId,
            'type' => 'refund',
            'amount' => $amount,
            'date' => date('Y-m-d H:i:s')
        ];
        return "İade işlemi gerçekleştirildi: {$amount} TL (İade No: {$refundId})";
    }
    
    // IUserManageable arayüzü metodları
    public function registerUser($username, $email) {
        $userId = count($this->users) + 1;
        $this->users[$userId] = [
            'id' => $userId,
            'username' => $username,
            'email' => $email,
            'registrationDate' => date('Y-m-d H:i:s')
        ];
        return "Kullanıcı kaydı tamamlandı: {$username} (ID: {$userId})";
    }
    
    public function deleteUser($userId) {
        if (isset($this->users[$userId])) {
            $username = $this->users[$userId]['username'];
            unset($this->users[$userId]);
            return "Kullanıcı silindi: {$username} (ID: {$userId})";
        }
        return "Kullanıcı bulunamadı.";
    }
    
    public function updateUserProfile($userId, $data) {
        if (isset($this->users[$userId])) {
            foreach ($data as $key => $value) {
                if (isset($this->users[$userId][$key])) {
                    $this->users[$userId][$key] = $value;
                }
            }
            return "Kullanıcı profili güncellendi: {$this->users[$userId]['username']}";
        }
        return "Kullanıcı bulunamadı.";
    }
    
    // IProductManageable arayüzü metodları
    public function addProduct($name, $price) {
        $productId = count($this->products) + 1;
        $this->products[$productId] = [
            'id' => $productId,
            'name' => $name,
            'price' => $price,
            'addedDate' => date('Y-m-d H:i:s')
        ];
        return "Ürün eklendi: {$name}, {$price} TL (ID: {$productId})";
    }
    
    public function removeProduct($productId) {
        if (isset($this->products[$productId])) {
            $productName = $this->products[$productId]['name'];
            unset($this->products[$productId]);
            return "Ürün kaldırıldı: {$productName} (ID: {$productId})";
        }
        return "Ürün bulunamadı.";
    }
    
    public function updateProductDetails($productId, $data) {
        if (isset($this->products[$productId])) {
            foreach ($data as $key => $value) {
                if (isset($this->products[$productId][$key])) {
                    $this->products[$productId][$key] = $value;
                }
            }
            return "Ürün bilgileri güncellendi: {$this->products[$productId]['name']}";
        }
        return "Ürün bulunamadı.";
    }
    
    // IReportable arayüzü metodları
    public function generateSalesReport($startDate, $endDate) {
        // Gerçek bir uygulamada, burada veritabanı sorguları çalıştırılırdı
        return "Satış raporu oluşturuldu: {$startDate} - {$endDate}";
    }
    
    public function generateUserActivityReport($userId) {
        if (isset($this->users[$userId])) {
            return "Kullanıcı aktivite raporu oluşturuldu: {$this->users[$userId]['username']}";
        }
        return "Kullanıcı bulunamadı.";
    }
    
    // Platform'a özgü ekstra metodlar
    public function getPlatformInfo() {
        return [
            'name' => $this->platformName,
            'userCount' => count($this->users),
            'productCount' => count($this->products),
            'transactionCount' => count($this->transactions)
        ];
    }
    
    public function displayStats() {
        $info = $this->getPlatformInfo();
        return "Platform: {$info['name']}\n" .
               "Kullanıcı Sayısı: {$info['userCount']}\n" .
               "Ürün Sayısı: {$info['productCount']}\n" .
               "İşlem Sayısı: {$info['transactionCount']}";
    }
}

// E-ticaret platformu örneği oluşturma ve kullanma
$ecommerce = new ECommercePlatform("AlkuShop");

// Kullanıcı işlemleri (IUserManageable)
echo $ecommerce->registerUser("ahmet", "ahmet@example.com");
echo "\n";
echo $ecommerce->registerUser("ayşe", "ayse@example.com");
echo "\n";
echo $ecommerce->updateUserProfile(1, ['email' => 'ahmet.yeni@example.com']);
echo "\n";

// Ürün işlemleri (IProductManageable)
echo $ecommerce->addProduct("Akıllı Telefon", 12000);
echo "\n";
echo $ecommerce->addProduct("Laptop", 20000);
echo "\n";
echo $ecommerce->updateProductDetails(1, ['price' => 11500]);
echo "\n";

// Ödeme işlemleri (IPayable)
echo $ecommerce->processPayment(5000);
echo "\n";
echo $ecommerce->refund(500);
echo "\n";

// Rapor işlemleri (IReportable)
echo $ecommerce->generateSalesReport('2025-01-01', '2025-05-08');
echo "\n";
echo $ecommerce->generateUserActivityReport(1);
echo "\n\n";

// Platform istatistikleri
echo $ecommerce->displayStats();