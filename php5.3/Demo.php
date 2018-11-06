<?php
/**
 * php5.3 新特性演示
 *
 * 官方地址： http://php.net/manual/zh/migration53.new-features.php
 *
 * Created At 2018/11/5.
 * User: kaiyanh <nzing@aweb.cc>
 */

/**
 * goto语句
 *
 * goto 操作符可以用来跳转到程序中的另一位置。该目标位置可以用目标名称加上冒号来标记，而跳转指令是 goto 之后接上目标位置的标记。
 * PHP 中的 goto 有一定限制，目标位置只能位于同一个文件和作用域，也就是说无法跳出一个函数或类方法，也无法跳入到另一个函数。
 * 也无法跳入到任何循环或者 switch 结构中。可以跳出循环或者 switch，通常的用法是用 goto 代替多层的 break。
 */
echo "*********************** goto START***********************\n";
for ($i = 0, $j = 50; $i < 100; $i++) {
    while ($j--) {
        if ($j == 17) {
            goto end;
        }
    }
}
echo "i = $i";
end:
echo "j hit 17 \n";
/**
 * 匿名函数
 *
 * 匿名函数（Anonymous functions），也叫闭包函数（closures），允许 临时创建一个没有指定名称的函数。最经常用作回调函数（callback）参数的值。当然，也有其它应用的情况。
 *
 * 匿名函数目前是通过 Closure 类来实现的。
 *
 */
echo "*********************** 匿名函数 START***********************\n";
$message = 'hello';

// 没有 "use"
$example = function () {
    // var_dump($message); 该语句报错
    echo "hello \n";
};
echo $example();

// 继承 $message
$example = function ($name) use ($message) {
    var_dump($message.": ".$name);
};
echo $example("zest");

/**
 * __invoke()
 * mixed __invoke ([ $... ] )
 * 当尝试以调用函数的方式调用一个对象时，__invoke() 方法会被自动调用。
 */
echo "*********************** __invoke START***********************\n";

class CallableClass
{
    function __invoke($x)
    {
        var_dump($x);
    }
}

$obj = new CallableClass;
$obj(5);
var_dump(is_callable($obj));

/**
 * const 常量
 *
 * 可以用 define() 函数来定义常量，在 PHP 5.3.0 以后，可以使用 const 关键字在类定义之外定义常量。一个常量一旦被定义，就不能再改变或者取消定义。
 */
echo "*********************** const START***********************\n";
define("CONSTANT", "Hello world by define.");
echo CONSTANT."\n"; // outputs "Hello world."
// 以下代码在 PHP 5.3.0 后可以正常工作
const CONSTANT2 = 'Hello World by const';
echo CONSTANT2."\n";

/**
 * 三元运算符 - 简写
 */
echo "*********************** 三元运算符 - 简写 START***********************\n";
$action = !empty($_POST['action']) ? $_POST['action'] : "default";
$action1 = isset($_POST['action']) ? $_POST['action'] : "default";
//$action2 = $_POST['action'] ? $_POST['action'] : "default"; // PHP Notice
$_POST['action'] = 'hi';
$action2 = $_POST['action'] ?: "default";
echo "old: $action \n";
echo "new: $action1 \n";
echo "new2: $action2 \n";

