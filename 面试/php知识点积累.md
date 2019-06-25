  $_SERVER['SERVER_ADDR'];  服务器地址
  $_SERVER['REMOTE_ADDR'];  客户端地址
  $_SERVER['HTTP_REFERER']; 上级请求的页面
  

  ####常量：
  定义：const define 
  const更快 是语言结构 fefine是函数
  define不能用于类常量的定义 Const可以 
  敞亮一经定义  不能被修改 不能被删除

  预定义常量
  __FILE__返回文件的路径和名称  __LINE__返回所在行的行号 __DIR__文件所在的路径 __FUNCTION__ __CLASS__ __METHOD__返回类和方法名 __NAMESPACE__

####魔术方法

__set($key,$value)  再给类中不存在的变量赋值时，自动调用  
__get($key)   输出__set()中的变量时调用  
__call($funName,$param)    使用类中不存在的方法时调用
__callStatic($funcName,$param)  调用类中不存在的静态方法时，调用  必须声明static
__tostring()   将实例化对象输出为字符串时调用  有返回值  返回值即为输出的字符串
__invoke($param)  将实例化对象当做函数去使用时调用  有返回值
变量的引用 全局变量  函数的调用 
```php
$var1 = 5;
$var2 = 10;

function foo(&$my_var)
{
    global $var1;
    $var1 +=2;
    $var2 =4;
    $my_var +=3;
    return $var2;
}

$my_var = 5;
echo foo($my_var)."\n";
echo $my_var;
echo $var1;
echo $var3;
$bar = 'foo';
$my_var = 10;
echo $bar($my_var);

```


如果switch外边还有一个循环 可以使用continue2跳出两个循环
优化if 。。。elseif   将可能性较大的放在前边  或者使用switch case 

include 警告   require  致命错误

序列化函数和范序列化函数
serialize（）   unserialize（）

file_put_contentd  将序列化的数据保存在本地
##打印处理
echo print() printf() print_r() var_dump() 

    echo()
    可以一次输出多个值，多个值之间用逗号分隔。echo是语言结构(language construct)，而并不是真正的函数，因此不能作为表达式的一部分使用。

    print()
    函数print()打印一个值（它的参数），如果字符串成功显示则返回true，否则返回false。

    print_r()
    可以把字符串和数字简单地打印出来，而数组则以括起来的键和值得列表形式显示，并以Array开头。但print_r()输出布尔值和NULL的结果没有意义，因为都是打印"\n"。因此用var_dump()函数更适合调试。

    var_dump()
    判断一个变量的类型与长度,并输出变量的数值,如果变量有值输的是变量的值并回返数据类型。此函数显示关于一个或多个表达式的结构信息，包括表达式的类型与值。数组将递归展开值，通过缩进显示其结构。
######0.1+0.7 = 0.7999···
###认定为false的数据
0 ,0.0, '', '0',false,array(),null 
###认定为null的数据
直接赋值为null，未定义的变量，unset销毁的变量

##字符串函数
    chr 返回指定字符
    explode 使用一个字符串分割一位数组
    join implode  将一维数组连接成字符串
    trim rtrim  ltrim  去空格 去掉左边的空格 去掉右边的空格
    MD5
    echo print print_f 
    str_replace（替换的，想要替换的，替换的字符串） str_ireplace（忽略大小写）  字符替换
    strcasecmp(不区分大小写)  strcmp（区分大小写） 比较字符串大小 如果 str1 小于 str2 返回 < 0；如果 str1 大于 str2 返回 > 0；如果两者相等，返回 0。 
  substr  返回所要区间的字符串 
```php
echo substr('abcdef', 1);     // bcdef
echo substr('abcdef', 1, 3);  // bcd
```
  strstr(不区分大小写)   strstr(不区分大小写) 返回字符串指定字符之前或者之后的字符串
```php
$email = 'USER@EXAMPLE.com';
  echo stristr($email, 'e'); // 输出 ER@EXAMPLE.com
  echo stristr($email, 'e', true); // 自 PHP 5.3.0 起，输出 US
```
    strpos(‘要查找的字符串’,'字符串') 查找字符在字符串中首次出现的位置 stripos(不区分大小写) strrpos（） 计算指定字符串在目标字符串中最后出现的位置 strripos(不区分大小写) 

    strrev 翻转一个字符串

    strtolower 将字符串中的字母全部转换为小写
    strtoupper 将字符串中的字母全部转换为大写

  strtr 修改字符串中的指定字符
```php
echo strtr("baab", "ab", "01"),"\n";//输出1001

$trans = array("ab" => "01");
echo strtr("baab", $trans);//输出ba01
```

##数组函数

###超全局数组
$_GLOBALS ,$_GET, $_POST, $_REQUEST, $_SESSION, $_COOKIUE, $_SERVER,$_FILES, $_ENV
array_change_key_case(‘要修改数组’，case=‘CASE_UPPER/CASE_LOSER’) 将字符串中的所有键名修改为大写或者小写

```php
$input_array = array("FirSt" => 1, "SecOnd" => 4);
print_r(array_change_key_case($input_array, CASE_UPPER));
/*
  输出 ARRAY
  (
    [FIRST] =>1,
    [SECOND] =>4
  )
*/
```

array_chunk(array,'每个数组单元的个数',bool(默认为false，如果设置为true，则保留原先的键名))

```php
$input_array = array('a', 'b', 'c', 'd', 'e');
print_r(array_chunk($input_array, 2));//不保留建名，从0开始索引
print_r(array_chunk($input_array, 2, true));//分割后任然保留原先的键名
```
array_column(array,'键名','分配给数组的键名')  返回数组中指定键名的列 如果第三个参数指定了   那么 生成的数组将有键名
```php
$records = array(
    array(
        'id' => 2135,
        'first_name' => 'John',
        'last_name' => 'Doe',
    ),
    array(
        'id' => 3245,
        'first_name' => 'Sally',
        'last_name' => 'Smith',
    ),
    array(
        'id' => 5342,
        'first_name' => 'Jane',
        'last_name' => 'Jones',
    ),
    array(
        'id' => 5623,
        'first_name' => 'Peter',
        'last_name' => 'Doe',
    )
);
 
$first_names = array_column($records, 'first_name');//生成的数组索引从0开始
$last_names = array_column($records, 'last_name', 'id');//生成的数组索引为指定数组的id

/*
$first_names 
Array
(
    [0] => John
    [1] => Sally
    [2] => Jane
    [3] => Peter
)
$last_names
Array
(
    [2135] => Doe
    [3245] => Smith
    [5342] => Jones
    [5623] => Doe
)
*/
```
array_combine(array,array)  将两个数组合并 第一个数组为key第二个数组为vlaue  两个数组单元数要想等否则返回false

array_diff($array1,$array2)  比较两个数组之间的差集 （返回array1中array2里边没有的元素）

array_intersect(array1,array2) 返回两者的交集 键名以array1为主

array_merge(array1,array2,...) 将多个数组合并 键名和值以第一个数组为主 没有键名将重置

array_pop() 弹出并返回数组的最后一个元素（出栈） 如果数组为空 则返回null
array_push() 将一个或者福多个元素一一压入数组（入栈） 返回处理之后数组的个数
array_shift() 将数组第一个元素取出并返回 如果数组为空 则返回null
array_unshift() 将一个或者多个元素在数组开头插入 返回新数组的长度

sort() rsort() 按照值进行排序
natsort() 按照值得自然排序算法
```php 

$array1 = $array2 = array("img12.png", "img10.png", "img2.png", "img1.png");

asort($array1);
echo "Standard sorting\n";
print_r($array1);

natsort($array2);
echo "\nNatural order sorting\n";
print_r($array2);
?>  


以上例程会输出：


//非自然
Array
(
    [3] => img1.png
    [1] => img10.png
    [0] => img12.png
    [2] => img2.png
)

//自然排序-----按照人类的思想进行排序
Array
(
    [3] => img1.png
    [2] => img2.png
    [1] => img10.png
    [0] => img12.png
)
```
asort(按照值对数组正向排序) arsort(按照值对数组逆向排序) 如果是字符串，则按照首字母排序
ksort(按照键对数组进行排序) krsort(按照键对数组进行逆向排序)

 in_array()  array_key_exists

 next() prev() reset(将数组的内部指针指向第一位) end(将数组的内部指针指向最后一位) current(返回数组的当前元素)
each(返回数组当前的键/值，并且将指针指向下一个位置，和list()结合使用来遍历数组)
```php
$fruit = array('a' => 'apple', 'b' => 'banana', 'c' => 'cranberry');

reset($fruit);//将数组的指针指向第一个元素
while (list($key, $val) = each($fruit)) {
    echo "$key => $val\n";
}

/*
a => apple
b => banana
c => cranberry

*/
```
###优先级
递增递减不影响true和false 
null递减不影响 递增值为1
++ -- 类型>* / + - >大小比较>相等比较>引用>&&>||>三目>赋值>and>or

```php 
$a = 0;
$b = 0;
if($a = 3>0 || $b = 3>0)
{
  $a++;
  $b++;
  echo $a--$b;
}
```

###正则表达式
1、作用：分割 查找 匹配 替换
2、分隔符 / # ~
3、通用原子：/d 0-9 /D 除了0-9  \w 字母和下划线  \W w取反  \s空白符  \S 除了s

###文件操作
fopen()   读取函数
打开模式：r/r+  w/w+  a/a+  x/x+  b  t

fwrite()    写入函数

fread() fgets()读取一行 fgetc()读取一个字符

fclose()

file()读取文件并放到数组  readfile()读取文件 放到缓冲区

######目录遍历
```php
function loopDir($dir)
{
  $handle = opendir($dir);//打开目录
  while(false !== ($file = readdir($handle)))//编写条件  避免遇到0或者空的文件名称
  {
    echo $file."\n";
    if(filetype($dir.'/'.$file) == 'dir')//判断目录下边的文件是否还是目录
    {
      loopDir($dir.'/'.$file);//递归调用 遍历子目录
    }
  }
}

```

###会话控制技术
cookie 是由服务器端发送给客户端的片刻信息 存在客户端的内存或者硬盘（浏览器中的文件）

不占用服务器资源  不安全

session 将使用者的信息存储在服务器中 使用cookie的session_id


###面向对象
__construct()  构造方法   对象创建时调用
__destruct()     析构方法  对象销毁时（网页执行完毕，或者unset主动销毁）调用 


###网络协议

OSI的7层从上到下分别是： 7 应用层 6 表示层 5 会话层 4 传输层 3 网络层 2 数据链路层 1 物理层 

http的工作特点

  基于b/s模式 
  通信开销小 简单快速  传输成本低
  使用灵活 可使用超文本传输协议 节省传输时间 无状态

http工作原理

  客户端发送请求给服务器，创建一个tcp链接，指定端口号，默认为80，连接到服务器，服务器监听到浏览器请求，一旦监听到请求，分析请求类型后，服务器会向客户端返回状态信息和数据

http请求方法

  GET POST HEAD OPTIONS PUT DELETE TRACE

  get 最大 2048个字符

  HTTPS协议在HTTP的基础上，添加了ssl/tls握手以及数据加密传输，也属于应用层协议


####数据库

  1.char和varchar的区别
    char是固定长度，当分配了长度之后 不论 存入的值长度如果小 不会自动填充  但是存储空间还是那么大  如果存入的值长度大  会自动截取到其固定长度 
      char类型 一般用于固定长度的数据  在myisam中使用 
    varchar是可变长度，分配了长度之后 如果存入的值小  会自动将存储空间的大小分配为值得大小 然后另加一个字节来保存长度（当超过255时需要两个字节） 如果存入   的字节大于其长度，会自动截取到规定长度

#mysql索引

###基本原则

  1、最适合的索引是出现在where中的列 或者是出现在链接子句中的列 而不是出现在select后的列
  2、索引列的计数越大 索引的效果越好
  3、对字符串的索引 应该制定一个前缀长度 可以节省大量的索引空间
  4、根据情况创建复合索引 索引可以提高查询效率
  5、避免创建太多的索引  索引会占用额外的磁盘空间  降低写操作的效率
  6、主键尽可能选择较短的数据类型  可以减少索引的磁盘占有 提高查询效率