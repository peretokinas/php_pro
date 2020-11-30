<?php
//Задание 3
class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
$a1 = new A();
$a2 = new A();
$a1->foo();
$a2->foo();
$a1->foo();
$a2->foo();

//1234 , так как оба экземпляра одного класса используют одну и ту же статичную переменную


// Задание 4
class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class B extends A {
}
$a1 = new A();
$b1 = new B();
$a1->foo(); 
$b1->foo(); 
$a1->foo(); 
$b1->foo();

// 1122 , так как теперь у нас два экземпляра двух разных классов. Каждый из них обращается к своей переменной

//Задание 5
class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class B extends A {
}
$a1 = new A;
$b1 = new B;
$a1->foo(); 
$b1->foo(); 
$a1->foo(); 
$b1->foo(); 

// То же самое, что и в 4. Отличия в коде только в отсутствии скобок при создании экземпляра класса. Эти скобки необязательны, если не используется конструктор.