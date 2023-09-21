<?php
namespace Village;

interface Eatable {
    public function eat();
}

interface Playable {
    public function play();
}

class Animal {
    protected $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    public function makeSound() {
        return "Animal sound";
    }
}

class Cat extends Animal implements Eatable, Playable {
    public function makeSound() {
        return "Meow";
    }

    public function eat() {
        return "Cat eats fish";
    }

    public function play() {
        return "Cat plays with a ball of yarn";
    }
}

class Dog extends Animal implements Eatable, Playable {
    public function makeSound() {
        return "Woof";
    }

    public function eat() {
        return "Dog eats bone";
    }

    public function play() {
        return "Dog plays fetch";
    }
}

class Robot implements Playable {
    protected $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    public function play() {
        return "Robot plays video games";
    }
}

class AnimalRobot extends Robot implements Eatable {
    public function makeSound() {
        return "RoboSound";
    }

    public function eat() {
        return "AnimalRobot eats electricity";
    }
}

class Farm {
    protected $name;
    protected $residents = [];

    public function __construct($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    public function addResident($resident) {
        $this->residents[] = $resident;
    }

    public function getResidents() {
        return $this->residents;
    }

    public function dailyRoutine() {
        foreach ($this->residents as $resident) {
            echo $resident->getName() . " does its daily routine: ";
            if ($resident instanceof Animal) {
                echo "Sound: " . $resident->makeSound() . " | ";
            }
            if ($resident instanceof Eatable) {
                echo $resident->eat() . " | ";
            }
            if ($resident instanceof Playable) {
                echo $resident->play() . " | ";
            }
            echo "\n";
        }
    }
}

// Создаем объекты
$cat = new Cat('Tom');
$dog = new Dog('Rex');
$robot1 = new Robot('R2-D2');
$robot2 = new Robot('C-3PO');
$animalRobot = new AnimalRobot('RoboCat');

$farm = new Farm('My Farm');
$farm->addResident($cat);
$farm->addResident($dog);
$farm->addResident($robot1);
$farm->addResident($robot2);
$farm->addResident($animalRobot);

// Выполняем рутину каждый день
$farm->dailyRoutine();
