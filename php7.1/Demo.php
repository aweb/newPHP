<?php
/**
 * PHP7.1 新特性
 *
 * http://php.net/manual/zh/migration71.new-features.php
 *
 * Created At 2018/11/6.
 * User: kaiyanh <nzing@aweb.cc>
 */


/**
 * 参数以及返回值的类型现在可以通过在类型前加上一个问号使之允许为空。
 * 当启用这个特性时，传入的参数或者函数返回的结果要么是给定的类型，要么是 null 。
 */
echo "*********************** 可为空（Nullable）类型 START***********************\n";
function testReturn(): ?string
{
    return 'elePHPant';
}

var_dump(testReturn());

function testReturn2(): ?string
{
    return null;
}

var_dump(testReturn2());

function test(?string $name)
{
    var_dump($name);
}

test('elePHPant');
test(null);
//test();


/**
 * 一个新的返回值类型void被引入。 返回值声明为 void 类型的方法要么干脆省去 return 语句，要么使用一个空的 return 语句。
 * 对于 void 函数来说，NULL 不是一个合法的返回值。
 */
echo "*********************** Void 函数 START***********************\n";
function swap(&$left, &$right): void
{
    if ($left === $right) {
        return;
    }

    $tmp = $left;
    $left = $right;
    $right = $tmp;
}

$a = 1;
$b = 2;
var_dump(swap($a, $b), $a, $b);


/**
 * 短数组语法（[]）现在作为list()语法的一个备选项，可以用于将数组的值赋给一些变量（包括在foreach中）
 */
echo "*********************** Symmetric array destructuring START***********************\n";
$data = [
    [1, 'Tom'],
    [2, 'Fred'],
];

// list() style
list($id1, $name1) = $data[0];
echo $id1."<>".$name1."\n";

// [] style
[$id1, $name1] = $data[0];
echo $id1."<>".$name1."\n";

// list() style
foreach ($data as list($id, $name)) {
    echo $id."<>".$name."\n";
    // logic here with $id and $name
}

// [] style
foreach ($data as [$id, $name]) {
    echo $id."<>".$name."\n";
    // logic here with $id and $name
}

echo "*********************** 类常量可见性 START***********************\n";

class ConstDemo
{
    const PUBLIC_CONST_A = 1;
    public const PUBLIC_CONST_B = 2;
    protected const PROTECTED_CONST = 3;
    private const PRIVATE_CONST = 4;

    function __construct()
    {
        echo "实例化对象 \n";
        echo self::PROTECTED_CONST."\n";
        echo self::PRIVATE_CONST."\n";
    }
}

echo ConstDemo::PUBLIC_CONST_B."\n";
$obj = new ConstDemo();
// echo ConstDemo::PROTECTED_CONST."\n"; 抛出错误


echo "*********************** 多异常捕获处理 START***********************\n";
try {
    // some code
} catch (FirstException | SecondException $e) {
    // handle first and second exceptions
}


/**
 * 现在list()和它的新的[]语法支持在它内部去指定键名。这意味着它可以将任意类型的数组 都赋值给一些变量（与短数组语法类似）
 */
echo "*********************** list()现在支持键名 START***********************\n";
$data = [
    ["id" => 1, "name" => 'Tom'],
    ["id" => 2, "name" => 'Fred'],
];

// list() style
list("id" => $id1, "name" => $name1) = $data[0];

// [] style
["id" => $id1, "name" => $name1] = $data[0];

// list() style
foreach ($data as list("id" => $id, "name" => $name)) {
    // logic here with $id and $name
}

// [] style
foreach ($data as ["id" => $id, "name" => $name]) {
    // logic here with $id and $name
    echo $id."<>".$name."\n";
}


/**
 * 现在所有支持偏移量的字符串操作函数 都支持接受负数作为偏移量，包括通过[]或{}操作字符串下标。
 * 在这种情况下，一个负数的偏移量会被理解为一个从字符串结尾开始的偏移量。
 */
echo "*********************** 支持为负的字符串偏移量 START***********************\n";
var_dump("abcdef"[2]);
var_dump("abcdef"[-2]);
var_dump(strpos("aabbcc", "b", -3));
$string = 'bar';
echo "The last character of '$string' is '$string[-1]'.\n";


/**
 * 一个新的名为 pcntl_async_signals() 的方法现在被引入， 用于启用无需 ticks （这会带来很多额外的开销）的异步信号处理。
 */
echo "*********************** 异步信号处理 START***********************\n";
pcntl_async_signals(true); // turn on async signals

pcntl_signal(SIGHUP, function ($sig) {
    echo "SIGHUP\n";
});

posix_kill(posix_getpid(), SIGHUP);


