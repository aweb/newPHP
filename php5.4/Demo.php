<?php
/**
 * PHP5.4 新特性演示
 *
 * http://php.net/manual/zh/migration54.new-features.php
 *
 * Created At 2018/11/5 3:58 PM.
 * User: kaiyanh <nzing@aweb.cc>
 */
echo "*********************** 短数组语法 START***********************\n";
$old = array(1, 2);
$a = [1, 2, 3, 4];
$b = [
    'one' => 1,
    'two' => 2,
    'three' => 3,
    'four' => [
        1 => 'hi',
        2 => 'ben',
    ],
];
print_r($old);
print_r($a);
print_r($b);

echo "*********************** array 数组中某个索引值简写 START***********************\n";
function myfunc() {
    return array(1,'james', 'james@fwso.cn');
}
echo myfunc()[1]."\n";

$name = explode(",", "Laruence,male")[0];
echo $name."\n";

echo "*********************** 在实例化时访问类成员 START***********************\n";
class Foo {
    function bar() {
        echo "say Hi \n";
    }
}
(new Foo())->bar();

echo "*********************** 二进制直接定义值 START***********************\n";
$bin  = 0b1101;
echo $bin."\n";

echo "*********************** 支持 Class::{expr}() 语法 START***********************\n";
class Human{
    function __construct($name)
    {
        echo $name."\n";
    }

    function hello() {
        echo "hi \n";
    }
}

foreach ([new Human("Gonzalo"), new Human("Peter")] as $human) {
    echo $human->{'hello'}();
}
