<?php
/**
 *
 * Created At 2018/11/7 10:34 AM.
 * User: kaiyanh <nzing@aweb.cc>
 */
echo "*********************** 显示zval信息 START***********************\n";
$a = "new string";
xdebug_debug_zval('a');
$b = &$a;
xdebug_debug_zval('a');
echo "\n";
$c = ['meaning' => 'life', 'number' => 42];
xdebug_debug_zval('c');
$c['life'] = $c['meaning'];
xdebug_debug_zval('c');
unset($c['life']);
xdebug_debug_zval('c');

echo "*********************** 获取内存 START***********************\n";
$aaa = '123';
$aa = memory_get_usage(); // 获取目前php脚本所用的内存大小
var_dump($aa);
$ab = memory_get_peak_usage(); // 到目前为止所占用的内存峰值
var_dump($ab);


echo "*********************** 推迟内存复制的优化 START***********************\n";
$j = 1;
var_dump(memory_get_usage());

$tipi = array_fill(0, 100000, 'php-internal');
var_dump(memory_get_usage());

$tipi_copy = $tipi;
var_dump(memory_get_usage());

foreach ($tipi_copy as $i) {
    $j += count($i);
}
var_dump(memory_get_usage());


