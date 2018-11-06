<?php
/**
 * PHP5.6 新特性
 *
 * http://php.net/manual/zh/migration56.new-features.php
 *
 * Created At 2018/11/6 10:06 AM.
 * User: kaiyanh <nzing@aweb.cc>
 */

/**
 * 在之前的 PHP 版本中， 必须使用静态值来定义常量，声明属性以及指定函数参数默认值。 现在你可以使用包括数值、字符串字面量以及其他常量在内的数值表达式来 定义常量、声明属性以及设置函数参数默认值。
 */
echo "*********************** 使用表达式定义常量 START***********************\n";
const ONE = 1;
const TWO = ONE * 2;
const ARR = ['a', 'b'];

class C {
    const THREE = TWO + 1;
    const ONE_THIRD = ONE / self::THREE;
    const SENTENCE = 'The value of THREE is '.self::THREE;

    public function f($a = ONE + self::THREE) {
        return $a;
    }
}

echo (new C)->f()."\n";
echo C::SENTENCE."\n";
var_dump(ARR);


/**
 * 现在可以不依赖 func_get_args()， 使用 ... 运算符 来实现 变长参数函数。
 */
echo "*********************** 使用 ... 运算符定义变长参数函数 START***********************\n";
function f($req, $opt = null, ...$params) {
    // $params 是一个包含了剩余参数的数组
    printf('$req: %d; $opt: %d; number of params: %d; data is %s'."\n", $req, $opt, count($params), json_encode($params));
}

f(1);
f(1, 2);
f(1, 2, 3);
f(1, 2, 3, 4);
f(1, 2, 3, 4, 5);


/**
 * 在调用函数的时候，使用 ... 运算符， 将 数组 和 可遍历 对象展开为函数参数。 在其他编程语言，比如 Ruby中，这被称为连接运算符，。
 */
echo "*********************** 使用 ... 运算符进行参数展开 START***********************\n";
function add($a, $b, $c) {
    return $a + $b + $c;
}

$operators = [2, 3];
echo "this sum is: ".add(1, ...$operators);
echo "\n";

/**
 * 加入右连接运算符 ** 来进行幂运算。 同时还支持简写的 **= 运算符，表示进行幂运算并赋值。
 */
echo "*********************** 使用 ** 进行幂运算 START***********************\n";
printf("2 ** 3 ==      %d\n", 2 ** 3);
printf("2 ** 3 ** 2 == %d\n", 2 ** 3 ** 2);

$a = 2;
$a **= 3;
printf("a ==           %d\n", $a);


/**
 * use 运算符 被进行了扩展以支持在类中导入外部的函数和常量。 对应的结构为 use function 和 use const。
 */
echo "*********************** use function 以及 use const START***********************\n";
//namespace Name\Space {
//    const FOO = 42;
//    function f() { echo __FUNCTION__."\n"; }
//}
//
//namespace {
//    use const Name\Space\FOO;
//    use function Name\Space\f;
//
//    echo FOO."\n";
//    f();
//}

/**
 * 加入 hash_equals() 函数， 以恒定的时间消耗来进行字符串比较， 以避免时序攻击。 比如当比较 crypt() 密码散列值的时候，就可以使用此函数。 （假定你不能使用 password_hash() 和 password_verify()， 这两个函数也可以抵抗时序攻击）
 */
echo "*********************** 使用 hash_equals() 比较字符串避免时序攻击 START***********************\n";
$expected  = crypt('12345', '$2a$07$usesomesillystringforsalt$');
$correct   = crypt('12345', '$2a$07$usesomesillystringforsalt$');
$incorrect = crypt('1234',  '$2a$07$usesomesillystringforsalt$');

var_dump(hash_equals($expected, $correct));
var_dump(hash_equals($expected, $incorrect));