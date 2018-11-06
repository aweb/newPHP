<?php
/**
 * PHP7.2 新特性
 *
 * http://php.net/manual/zh/migration72.new-features.php
 *
 * Created At 2018/11/6 2:05 PM.
 * User: kaiyanh <nzing@aweb.cc>
 */


/**
 * 这种新的对象类型, object, 引进了可用于逆变（contravariant）参数输入和协变（covariant）返回任何对象类型。
 */
echo "*********************** 新的对象类型 START***********************\n";
function test(object $obj): object
{
    return new SplQueue();
}
//test(new StdClass());

