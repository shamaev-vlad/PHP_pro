<?php

// Задания 1, 2, 3, 4

class Product {
  public $id;
  public $name;
  public $price;
  public $description;


  public function getProduct() {

  }

  public function displayProduct() {

  }

  public function deleteProduct() {

  }

}

class Discount extends Product {
  public $condition;
  public $pack;
  public $reason;


  public function getProduct() {

  }

  public function displayProduct() {

  }

}

  $product1 = new Product();
  $product2 = new Product();

  $product1 -> id = 1;
  $product2 -> id = 2;
  $product1 -> name = "";
  $product2 -> name = "";
  $product1 -> price = "";
  $product2 -> price = "";
  $product1 -> description = "";
  $product2 -> description = "";
  $product1 -> displayProduct();
  $product2 -> displayProduct();
  $product2 -> deleteProduct(1);

  $discount1 = new Discount();
  $discount2 = new Discount();

  $discount1 -> condition = "";
  $discount2 -> condition = "";
  $discount1 -> pack = "";
  $discount2 -> pack = "";
  $discount1 -> reason = "";
  $discount2 -> reason = "";
  $discount1 -> displayProduct();
  $discount2 -> displayProduct();
  $discount1 -> deleteProduct(1);






 //-----------------------------------------------------------------------------



// Задание 5

// Создан класс А
 class A {
   // Создан публичный метод для объектов класса А
    public function foo() {
      // Задана статичная переменная
        static $x = 0;
        // Префиксная форма инкремента
        echo ++$x;
    }
}
// Создан первый объект
$a1 = new A();
// Создан второй объект
$a2 = new A();
// Выполняется метод в первом объекте, получаем 1
$a1->foo();
// Выполняется метод во втором объкте, получаем 2, т.к. переменная $x статична для всего класса
$a2->foo();
// Ещё раз выполняется метод в первом объкте, получаем 3
$a1->foo();
// Ещё раз выполняется метод во втором объкте, получаем 4
$a2->foo();



//-----------------------------------------------------------------------------



// Задание 6

// Создан класс А
class A {
  // Создан публичный метод для объектов класса А
    public function foo() {
      // Задана статичная переменная
        static $x = 0;
        // Префиксная форма инкремента
        echo ++$x;
    }
}
// Создан класс В, наследник класса А
class B extends A {
}
// Создан объкт класса А
$a1 = new A();
// Создан объкт класса В
$b1 = new B();
// Выполняется метод в объекте класса А, получаем 1
$a1->foo();
/* Выполняется метод в объекте класса В, получаем 1,
  т.к. А и В разные классы и у каждого своя статичная переменная $x */
$b1->foo();
// Ещё раз выполняется метод в объекте класса А, получаем 2
$a1->foo();
// Ещё раз выполняется метод в объекте класса В, получаем 2
$b1->foo();
?>
