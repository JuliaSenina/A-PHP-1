<?php

declare(strict_types=1);

class Student {
  public int $age;
  public string $name;
  public string $surname;

  public function __construct(int $age, string $name, string $surname) {
    $this->age = $age;
    $this->name = $name;
    $this->surname = $surname;
  }

  public function setAge(int $age): void {
    if ($age > 0) {
      $this->age = $age;
    }
  }

  public function getAge(): int {
    return $this->age;
  }
}

class Car {
  public int $maxFuel;
  public int $fuel = 0;
  public string $model;
  public string $bodyType;

  public function __construct(string $model, string $bodyType, int $fuel, int $maxFuel) {
    $this->model = $model;
    $this->bodyType = $bodyType;
    $this->fuel = $fuel;
    $this->maxFuel = $maxFuel;
  }

  public function reFuel(int $count): void {
    if ($count > 0) {
      $this->fuel += $count;
    }
    if ($this->fuel > $this->maxFuel) {
      $this->fuel = $this->maxFuel;
    }
  }

  public function getStatusFuel(): string {
    $status = '';

    if ($this->fuel === 0) {
      $status = '0%';
    } elseif ($this->fuel === $this->maxFuel) {
      $status = '100%';
    } else {
      $status = round((100 * $this->fuel / $this->maxFuel), 2) . '%';
    }
    return $status;
    }
}

class TV {
  public string $model;
  public int $size;
  public static string $status = 'выключен';

  public function __construct(string $model, int $size) {
    $this->model = $model;
    $this->size = $size;
  }

  public static function on(): void {
    self::$status = 'включен';
  }

  public static function off(): void {
    self::$status = 'выключен';
  }
}

$student = new Student(29, 'Анна', 'Каренина');
echo $student->name . ' студентка и ей ' . $student->getAge() . ' лет' . PHP_EOL;

echo PHP_EOL;

$auto = new Car('Лада', 'седан', 30, 300);
echo 'У нее есть автомобиль ' . $auto->model . ' и это ' . $auto->bodyType . PHP_EOL;
echo 'В баке сейчас топлива - ' . $auto->getStatusFuel() . PHP_EOL;
echo 'Заправка ...' . PHP_EOL;
$auto->reFuel(120);
echo 'В баке топлива после заправки - ' . $auto->getStatusFuel() . PHP_EOL;

echo PHP_EOL;

$technics = new TV('Xiaomi', 55);
echo 'Также у нее есть телевизор марки ' . $technics->model . ' диагональю ' . $technics->size . ' дюймов.' . PHP_EOL;
echo 'Телевизор ' . TV::$status . PHP_EOL;
TV::on();
echo 'Телевизор ' . TV::$status . PHP_EOL;
