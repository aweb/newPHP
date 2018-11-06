# PHP5.3 ~ PHP7新特性

## PHP7.2 新特性
- 新的对象类型
- 通过名称加载扩展
- 允许重写抽象方法(Abstract method)
- 使用Argon2算法生成密码散列
- 新增 ext/PDO（PDO扩展） 字符串扩展类型
- 为 ext/PDO新增额外的模拟调试信息
- ext/LDAP（LDAP扩展） 支持新的操作方式
- ext/sockets（sockets扩展）添加了地址信息
- 允许分组命名空间的尾部逗号

## PHP7.2 废弃的功能
- 不带引号的字符串
- GD 扩展内的 png2wbmp() 和 jpeg2wbmp() 现已被废弃，将在下一个 PHP 主版本中移除。
- __autoload() 方法已被废弃， 因为和 spl_autoload_register() 相比功能较差 (因为无法链式处理多个 autoloader)
- track_errors ini 设置和 $php_errormsg 变量
- 考虑到此函数的安全隐患问题（它是 eval() 的瘦包装器），该过时的函数现在已被废弃。 更好的选择是匿名函数。
- mbstring.func_overload ini 设置
- (unset) 类型强制转化
- parse_str() 不加第二个参数
- gmp_random() 函数
- each() 函数

## PHP7.1 新特性
- 可为空（Nullable）类型
- Void 函数
- Symmetric array destructuring
- 类常量可见性
- iterable 伪类
- 多异常捕获处理
- list()现在支持键名
- 支持为负的字符串偏移量
- ext/openssl 支持 AEAD
- 异步信号处理

## PHP7.1 中废弃的特性
- ext/mcrypt
- mb_ereg_replace()和mb_eregi_replace()的Eval选项

## PHP7.0 新特性
- 标量类型声明
- 返回值类型声明
- null合并运算符
- 太空船操作符（组合比较符）
- 通过 define() 定义常量数组
- 匿名类
- Closure::call()
- 为unserialize()提供过滤
- Group use declarations
- 生成器可以返回表达式
- 整数除法函数 intdiv()
- 会话选项
- preg_replace_callback_array()
- CSPRNG Functions
- random_bytes|random_int函数
- 允许在克隆表达式上访问对象成员，例如： (clone $foo)->bar()

## PHP7.0 弃用的功能
- PHP4 风格的构造函数
- 静态调用非静态的方法
- password_hash() 盐值选项
- capture_session_meta SSL 上下文选项
- ldap_sort() LDAP 中的废弃

## PHP5.6 新特性

- 使用表达式定义常量
- 使用 ... 运算符定义变长参数函数
- 使用 ... 运算符进行参数展开
- 使用 ** 进行幂运算
- use function 以及 use const
- phpdbg
- 默认字符编码
- php://input 是可重用的了
- 大文件上传(现在可以支持大于 2GB 的文件上传)
- 使用 hash_equals() 比较字符串避免时序攻击
- SSL/TLS改进

## PHP5.6 中废弃的特性
- 从不兼容的上下文调用方法
- iconv 和 mbstring 编码设置


## PHP5.5 新特性
- 新增 Generators(yield)
- 新增 finally 关键字
- foreach 现在支持 list()
- list()现在支持键名
- empty() 支持任意表达式
- array and string literal dereferencing
- 新的密码哈希 API
- 改进 GD

## PHP 5.5.x 中废弃的特性
- 废弃 ext/mysql
- preg_replace() 中的 /e 修饰符
- intl 中的废弃
- mcrypt 中的废弃


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


# 参考网站
- http://www.php.ent
- http://www.laruence.com/2015/05/28/3038.html
- https://blog.csdn.net/h330531987/article/details/74364681
