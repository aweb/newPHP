<?php
/**
 * PHP5.5 新特性整理
 *
 * http://php.net/manual/zh/migration55.new-features.php
 *
 * Created At 2018/11/6.
 * User: kaiyanh <nzing@aweb.cc>
 */


/**
 * 这个和java中的finally一样，经典的try … catch … finally 三段式异常处理。
 * 一个catch语句块现在可以通过管道字符(|)来实现多个异常的捕获。 这对于需要同时处理来自不同类的不同异常时很有用。
 */
echo "*********************** finally关键字 START***********************\n";
try {
    // some code
} catch (FirstException | SecondException $e) {
    // handle first and second exceptions
} catch (\Exception $e) {
    // ...
} finally{
//
}


/**
 * foreach 控制结构现在支持通过 list() 构造将嵌套数组分离到单独的变量
 */
echo "*********************** foreach 现在支持 list() START***********************\n";
$array = [
    [1, 2],
    [3, 4,4,4],
];

foreach ($array as list($a, $b)) {
    echo "A: $a; B: $b\n";
}

/**
 * empty() 现在支持传入一个任意表达式，而不仅是一个变量
 */
echo "*********************** empty() 支持任意表达式 START***********************\n";
function always_false() {
    return false;
}

if (empty(always_false())) {
    echo "This will be printed. \n";
}

if (empty(true)) {
    echo "This will not be printed.\n";
}
// empty常见问题
if (empty(" ")) {
    echo "empty string \n";
}


echo "*********************** 非变量array和string也能支持下标获取了 START***********************\n";
echo 'Array dereferencing: ';
echo [1, 2, 3][0];
echo "\n";

echo 'String dereferencing: ';
echo 'PHP'[0];
echo "\n";