<?php

/**
 * PHP - Trait
 *
 * 自 PHP 5.4.0 起，PHP 实现了一种代码复用的方法，称为 trait。
 *
 * Trait 是为类似 PHP 的单继承语言而准备的一种代码复用机制。Trait 为了减少单继承语言的限制，使开发人员能够自由地在不同层次结构内独立的类中复用 method。
 * Trait 和 Class 组合的语义定义了一种减少复杂性的方式，避免传统多继承和 Mixin 类相关典型问题。
 *
 * Trait 和 Class 相似，但仅仅旨在用细粒度和一致的方式来组合功能。 无法通过 trait 自身来实例化。它为传统继承增加了水平特性的组合；也就是说，应用的几个 Class 之间不需要继承。
 *
 * Created At 2018/11/5
 * User: kaiyanh <nzing@aweb.cc>
 */
class Base
{
    public function sayHello()
    {
        echo __CLASS__."<>Hello \n";
    }
}

trait SayWorld
{
    public function sayHello()
    {
        parent::sayHello();
        echo __CLASS__."<>World! \n";
    }
}

class MyHelloWorld extends Base
{
    use SayWorld;
}

$o = new MyHelloWorld();
$o->sayHello();