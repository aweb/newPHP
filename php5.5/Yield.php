<?php
/**
 * PHP5.5 新特性 - 迭代生成器 yield
 *
 * Created At 2018/11/5.
 * User: kaiyanh <nzing@aweb.cc>
 */
/**
 * 相比较迭代器，生成器提供了一种更容易的方法来实现简单的对象迭代，性能开销和复杂性都大大降低。
 *
 * 一个生成器函数看起来像一个普通的函数，不同的是普通函数返回一个值，而一个生成可以yield生成许多它所需要的值，并且每一次的生成返回值只是暂停当前的执行状态，当下次调用生成器函数时，PHP会从上次暂停的状态继续执行下去。
 *
 * 我们在使用生成器的时候可以像关联数组那样指定一个键名对应生成的值。如下生成一个键值对与定义一个关联数组相似。
 */
echo "*********************** Generators(迭代器 yield) START***********************\n";
function xrange($start, $limit, $step = 1)
{
    for ($i = $start; $i <= $limit; $i += $step) {
        yield $i;
    }
}

$range = xrange(1, 9, 2);
var_dump($range); // object(Generator)#1
var_dump($range instanceof Iterator); // bool(true)

echo "Single digit odd numbers: \n";

/* 注意保存在内存中的数组绝不会被创建或返回 */
foreach ($range as $number) {
    echo "$number ";
}

echo "\n";

/**
 * 实际上生成器函数返回的是一个Generator对象，这个对象不能通过new实例化，并且实现了Iterator接口。
 *
 *
 * Generator implements Iterator {
 * public mixed current(void)
 * public mixed key(void)
 * public void next(void)
 * public void rewind(void)
 * // 向生成器传入一个值
 * public mixed send(mixed $value)
 * public void throw(Exception $exception)
 * public bool valid(void)
 * // 序列化回调
 * public void __wakeup(void)
 * }
 * 可以看到出了实现Iterator的接口之外Generator还添加了send方法，用来向生成器传入一个值，并且当做yield表达式的结果，然后继续执行生成器，直到遇到下一个yield后会再次停住。
 */
echo "*********************** Generators(迭代器 yield) send START***********************\n";
function printer()
{
    $i = 1;
    while (true) {
        echo 'this is the yield '.$i."\n";
        echo 'receive: '.yield."\n";
        $i++;
    }
}


$printer = printer();
$printer->send('Hello');
$printer->send('world');

/**
 * 在上面的例子中，经过第一个send()方法，yield表达式的值变为Hello，之后执行echo语句，输出第一条结果receive: Hello，输出完毕后继续执行到第二个yield处，只不过当前的语句没有执行到底，不会执行输出。
 * 如果将例子改改就能够看出来yield的继续执行到哪里。
 */


echo "*********************** Generators(迭代器 yield) 合并 START***********************\n";

function generator1()
{
    yield 1;
    yield 2;
    yield from generator2();
    yield from generator3();
}

function generator2()
{
    yield 3;
    yield 4;
}

function generator3()
{
    yield 5;
    yield 6;
}

foreach (generator1() as $val) {
    echo $val, " ";
}
echo "\n";

echo "*********************** 协程 START***********************\n";
/**
 * 协程的支持是在迭代生成器的基础上, 增加了可以回送数据给生成器的功能(调用者发送数据给被调用的生成器函数).
 * 这就把生成器到调用者的单向通信转变为两者之间的双向通信.
 */
echo "*********************** Generators(迭代器 yield) 数据接收 START***********************\n";
/**
 * 这儿yield没有作为一个语句来使用, 而是用作一个表达式, 即它能被演化成一个值. 这个值就是调用者传递给send()方法的值.
 * 在这个例子里, yield表达式将首先被”Foo”替代写入Log, 然后被”Bar”替代写入Log.
 */
function logger($fileName)
{
    $fileHandle = fopen($fileName, 'a');
    while (true) {
        fwrite($fileHandle, yield."\n");
    }
}

$logger = logger(__DIR__.'/test.log');
$logger->send(date('Y-m-d H:i:s').'|Foo');
$logger->send(date('Y-m-d H:i:s').'|Bar');
echo "view test.log\n";

echo "*********************** Generators(迭代器 yield) 数据发送&接收 START***********************\n";
function gen()
{
    $ret = (yield 'yield1');
    var_dump($ret);
    $ret = (yield 'yield2');
    var_dump($ret);
}

$gen = gen();
var_dump($gen->current());    // string(6) "yield1"
var_dump($gen->send('ret1')); // string(4) "ret1"   (the first var_dump in gen)
// string(6) "yield2" (the var_dump of the ->send() return value)
var_dump($gen->send('ret2')); // string(4) "ret2"   (again from within gen)
// NULL               (the return value of ->send())