<?php

/**
 * 后期静态绑定
 *
 * 自 PHP 5.3.0 起，PHP 增加了一个叫做后期静态绑定的功能，用于在继承范围内引用静态调用的类。
 *
 * 准确说，后期静态绑定工作原理是存储了在上一个“非转发调用”（non-forwarding call）的类名。当进行静态方法调用时，该类名即为明确指定的那个（通常在 :: 运算符左侧部分）；当进行非静态方法调用时，即为该对象所属的类。
 * 所谓的“转发调用”（forwarding call）指的是通过以下几种方式进行的静态调用：self::，parent::，static:: 以及 forward_static_call()。
 * 可用 get_called_class() 函数来得到被调用的方法所在的类名，static:: 则指出了其范围。
 *
 * 该功能从语言内部角度考虑被命名为“后期静态绑定”。“后期绑定”的意思是说，static:: 不再被解析为定义当前方法所在的类，而是在实际运行时计算的。也可以称之为“静态绑定”，因为它可以用于（但不限于）静态方法的调用。
 *
 * Created At 2018/11/5.
 * User: kaiyanh <nzing@aweb.cc>
 */
class A
{
    public static function who()
    {
        echo __CLASS__;
    }

    public static function test()
    {
        static::who(); // 后期静态绑定从这里开始
    }
    public static function test2()
    {
        self::who(); // 使用 self:: 或者 __CLASS__ 对当前类的静态引用，取决于定义当前方法所在的类：
    }


}

class B extends A
{
    public static function who()
    {
        echo __CLASS__;
    }
}

B::test();
echo "\n";
B::test2();
echo "\n";