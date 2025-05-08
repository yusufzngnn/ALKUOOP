<?php
// Polimorfizm örneği - farklı sınıfların aynı metodları farklı şekilde uygulaması

// Ana sınıf (Üst sınıf)
abstract class Animal {
    protected $name;
    
    public function __construct($name) {
        $this->name = $name;
    }
    
    // Abstract metod - tüm alt sınıflar bu metodu kendi şekillerinde uygulamalıdır
    abstract public function makeSound();
    
    // Ortak metod
    public function introduce() {
        return "Ben bir " . $this->getType() . " ve adım " . $this->name;
    }
    
    // Polimorfik davranacak başka bir metod
    abstract public function getType();
}

// Alt sınıf 1
class Dog extends Animal {
    public function makeSound() {
        return "Hav hav!";
    }
    
    public function getType() {
        return "köpek";
    }
    
    // Köpeklere özel metod
    public function fetch() {
        return $this->name . " topu getirdi!";
    }
}

// Alt sınıf 2
class Cat extends Animal {
    public function makeSound() {
        return "Miyav!";
    }
    
    public function getType() {
        return "kedi";
    }
    
    // Kedilere özel metod
    public function scratch() {
        return $this->name . " tırmalıyor!";
    }
}

// Alt sınıf 3
class Bird extends Animal {
    public function makeSound() {
        return "Cik cik!";
    }
    
    public function getType() {
        return "kuş";
    }
    
    // Kuşlara özel metod
    public function fly() {
        return $this->name . " uçuyor!";
    }
}

// Polimorfizm: Hayvan tipinden bağımsız olarak aynı arayüzle farklı davranışlar gösterme
function animalCommunicate($animal) {
    echo $animal->introduce() . "\n";
    echo "Ses çıkarıyor: " . $animal->makeSound() . "\n";
}

// Farklı hayvanlar oluşturalım
$dog = new Dog("Karabaş");
$cat = new Cat("Tekir");
$bird = new Bird("Maviş");

// Aynı fonksiyonu farklı nesnelerle çağıralım (polimorfizm)
animalCommunicate($dog);
echo "\n";
animalCommunicate($cat);
echo "\n";
animalCommunicate($bird);

// Aynı zamanda her sınıfa özel metodları da kullanabiliriz
echo "\n";
echo $dog->fetch() . "\n";
echo $cat->scratch() . "\n";
echo $bird->fly() . "\n";