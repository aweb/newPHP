# PHP5.3 ~ PHP7新特性

## PHP 5.3.0 提供了广泛的新特性:

- 添加了命名空间的支持.
- 添加了静态晚绑定支持.
- 添加了跳标签支持.
- 添加了原生的闭包(Lambda/匿名函数)支持.
- 新增了两个魔术方法, __callStatic 和 __invoke.
- 添加了 Nowdoc 语法支持, 类似于 Heredoc 语法, 但是包含单引号.
- 使用 Heredoc 来初始化静态变量和类属性/常量变为可能.
- 可使用双引号声明 Heredoc, 补充了 Nowdoc 语法.
- 可在类外部使用 const 关键词声明 常量.
- 三元运算操作符有了简写形式: ?:.
- HTTP 流包裹器将从 200 到 399 全部的状态码都视为成功。
- 动态访问静态方法变为可能.
- 异常可以被内嵌.
- 新增了循环引用的垃圾回收器并且默认是开启的.
- mail() 现在支持邮件发送日志. (注意: 仅支持通过该函数发送的邮件.)

## PHP 5.3.x 中弃用的功能
```php
PHP 5.3.0 新增了两个错误等级: E_DEPRECATED 和 E_USER_DEPRECATED. 错误等级 E_DEPRECATED 被用来说明一个函数或者功能已经被弃用. E_USER_DEPRECATED 等级目的在于表明用户代码中的弃用功能, 类似于 E_USER_ERROR 和 E_USER_WARNING 等级.

下面是被弃用的 INI 指令列表. 使用下面任何指令都将导致 E_DEPRECATED 错误.

define_syslog_variables
register_globals
register_long_arrays
safe_mode
magic_quotes_gpc
magic_quotes_runtime
magic_quotes_sybase
弃用 INI 文件中以 '#' 开头的注释.
弃用函数:

call_user_method() (使用 call_user_func() 替代)
call_user_method_array() (使用 call_user_func_array() 替代)
define_syslog_variables()
dl()
ereg() (使用 preg_match() 替代)
ereg_replace() (使用 preg_replace() 替代)
eregi() (使用 preg_match() 配合 'i' 修正符替代)
eregi_replace() (使用 preg_replace() 配合 'i' 修正符替代)
set_magic_quotes_runtime() 以及它的别名函数 magic_quotes_runtime()
session_register() (使用 $_SESSION 超全部变量替代)
session_unregister() (使用 $_SESSION 超全部变量替代)
session_is_registered() (使用 $_SESSION 超全部变量替代)
set_socket_blocking() (使用 stream_set_blocking() 替代)
split() (使用 preg_split() 替代)
spliti() (使用 preg_split() 配合 'i' 修正符替代)
sql_regcase()
mysql_db_query() (使用 mysql_select_db() 和 mysql_query() 替代)
mysql_escape_string() (使用 mysql_real_escape_string() 替代)
废弃以字符串传递区域设置名称. 使用 LC_* 系列常量替代.
mktime() 的 is_dst 参数. 使用新的时区处理函数替代.
弃用的功能:

弃用通过引用分配 new 的返回值.
调用时传递引用被弃用.

```

## PHP5.4 新特性

```shell
新增支持 traits 。
新增短数组语法，比如 $a = [1, 2, 3, 4]; 或 $a = ['one' => 1, 'two' => 2, 'three' => 3, 'four' => 4]; 。
新增支持对函数返回数组的成员访问解析，例如 foo()[0] 。
现在 闭包 支持 $this 。
现在不管是否设置 short_open_tag php.ini 选项，<?= 将总是可用。
新增在实例化时访问类成员，例如： (new Foo)->bar() 。
现在支持 Class::{expr}() 语法。
新增二进制直接量，例如：0b001001101 。
改进解析错误信息和不兼容参数的警告。
SESSION 扩展现在能追踪文件的 上传进度 。
内置用于开发的 CLI 模式的 web server 。
```
## PHP5.4过时的特性
```
mcrypt_generic_end()
mysql_list_dbs()
```


# 参考网站
- http://www.php.ent
- http://www.laruence.com/2015/05/28/3038.html
- https://blog.csdn.net/h330531987/article/details/74364681