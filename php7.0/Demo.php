<?php
/**
 * PHP7.0 新特性
 *
 * http://php.net/manual/zh/migration70.new-features.php
 *
 * Created At 2018/11/6.
 * User: kaiyanh <nzing@aweb.cc>
 */

/**
 *标量类型声明 有两种模式: 强制 (默认) 和 严格模式。 现在可以使用下列类型参数（无论用强制模式还是严格模式）： 字符串(string), 整数 (int), 浮点数 (float), 以及布尔值 (bool)。
 * 它们扩充了PHP5中引入的其他类型：类名，接口，数组和 回调类型。
 */
echo "*********************** 标量类型声明 START***********************\n";
// Coercive mode
function sumOfInts(int ...$ints)
{
    return array_sum($ints);
}

var_dump(sumOfInts(2, '3', 4.1));


/**
 * PHP 7 增加了对返回类型声明的支持。 类似于参数类型声明，返回类型声明指明了函数返回值的类型。可用的类型与参数声明中可用的类型相同。
 */
echo "*********************** 返回值类型声明 START***********************\n";
function arraysSum(array ...$arrays): array
{
    return array_map(function (array $array): int {
        return array_sum($array);
    }, $arrays);
}

print_r(arraysSum([1, 2, 3], [4, 5, 6], [7, 8, 9]));

/**
 * 由于日常使用中存在大量同时使用三元表达式和 isset()的情况， 我们添加了null合并运算符 (??) 这个语法糖。
 * 如果变量存在且值不为NULL， 它就会返回自身的值，否则返回它的第二个操作数。
 */
echo "*********************** null合并运算符 START***********************\n";
// Fetches the value of $_GET['user'] and returns 'nobody'
// if it does not exist.
$username = $_GET['user'] ?? 'nobody';
echo "$username \n";
// This is equivalent to:
$username = isset($_GET['user']) ? $_GET['user'] : 'nobody';
echo "$username \n";

// Coalesces can be chained: this will return the first
// defined value out of $_GET['user'], $_POST['user'], and
// 'nobody'.
$_POST['user'] = 'hello';
$username = $_GET['user'] ?? $_POST['user'] ?? 'nobody';
echo "$username \n";

/**
 * 太空船操作符用于比较两个表达式。当$a小于、等于或大于$b时它分别返回-1、0或1。 比较的原则是沿用 PHP 的常规比较规则进行的
 */
echo "*********************** 太空船操作符（组合比较符） START***********************\n";
// 整数
echo 1 <=> 1; // 0
echo 1 <=> 2; // -1
echo 2 <=> 1; // 1

// 浮点数
echo 1.5 <=> 1.5; // 0
echo 1.5 <=> 2.5; // -1
echo 2.5 <=> 1.5; // 1

// 字符串
echo "a" <=> "a"; // 0
echo "a" <=> "b"; // -1
echo "b" <=> "a"; // 1
echo "\n";


/**
 * Array 类型的常量现在可以通过 define() 来定义。在 PHP5.6 中仅能通过 const 定义。
 */
echo "*********************** 通过 define() 定义常量数组 START***********************\n";
define('ANIMALS', [
    'dog',
    'cat',
    'bird',
]);
echo ANIMALS[1]."\n"; // 输出 "cat"

/**
 * Closure::call() 现在有着更好的性能，简短干练的暂时绑定一个方法到对象上闭包并调用它。
 */
echo "*********************** Closure::call() START***********************\n";

class A
{
    private $x = 12;
}

// PHP 7 之前版本的代码
$getXCB = function () {
    return $this->x;
};
$getX = $getXCB->bindTo(new A, 'A'); // 中间层闭包
echo $getX()."\n";

// PHP 7+ 及更高版本的代码
$getX = function () {
    return $this->x;
};
echo $getX->call(new A)."\n";

/**
 * 从同一 namespace 导入的类、函数和常量现在可以通过单个 use 语句 一次性导入了。
 */
echo "*********************** Group use declarations START***********************\n";
//// PHP 7 之前的代码
//use some\namespace\ClassA;
//use some\namespace\ClassB;
//use some\namespace\ClassC as C;
//
//use function some\namespace\fn_a;
//use function some\namespace\fn_b;
//use function some\namespace\fn_c;
//
//use const some\namespace\ConstA;
//use const some\namespace\ConstB;
//use const some\namespace\ConstC;
//
//// PHP 7+ 及更高版本的代码
//use some\namespace\{ClassA, ClassB, ClassC as C};
//use function some\namespace\{fn_a, fn_b, fn_c};
//use const some\namespace\{ConstA, ConstB, ConstC};


/**
 * 此特性基于 PHP 5.5 版本中引入的生成器特性构建的。 它允许在生成器函数中通过使用 return 语法来返回一个表达式 （但是不允许返回引用值），
 * 可以通过调用 Generator::getReturn() 方法来获取生成器的返回值， 但是这个方法只能在生成器完成产生工作以后调用一次。
 */
echo "*********************** 生成器可以返回表达式 START***********************\n";
$gen = (function () {
    yield 1;
    yield 2;

    return 3;
})();

foreach ($gen as $val) {
    echo $val, PHP_EOL;
}

echo $gen->getReturn(), PHP_EOL;


echo "*********************** 整数除法函数 intdiv() START***********************\n";
var_dump(intdiv(10, 3));


/**
 * 在 PHP 7 之前，当使用 preg_replace_callback() 函数的时候， 由于针对每个正则表达式都要执行回调函数，可能导致过多的分支代码。
 * 而使用新加的 preg_replace_callback_array() 函数， 可以使得代码更加简洁。
 * 现在，可以使用一个关联数组来对每个正则表达式注册回调函数， 正则表达式本身作为关联数组的键， 而对应的回调函数就是关联数组的值。
 */
echo "*********************** preg_replace_callback_array START***********************\n";
$subject = 'Aaaaaa Bbb';

preg_replace_callback_array(
    [
        '~[a]+~i' => function ($match) {
            echo strlen($match[0]), ' matches for "a" found', PHP_EOL;
        },
        '~[b]+~i' => function ($match) {
            echo strlen($match[0]), ' matches for "b" found', PHP_EOL;
        }
    ],
    $subject
);

echo "*********************** random_bytes|random_int START***********************\n";
var_dump(random_bytes(10));
var_dump(random_int(100, 999));
var_dump(random_int(-1000, 0));