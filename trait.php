<?php  
/**
 *  Trait的几个特性
 *      实现了代码的复用，突破了单继承的限制
 *      不能实例化
 *      支持类的语法
 *
 * 		优先级：当前类的方法>trait>父类
 *
 *
 * 		多个trait中有同名方法时：编写规则
 *
 * 
 */



trait demo1
{
	public static function hello1()
	{
		echo __METHOD__;
	}
	public static function hello3()
	{
		echo __METHOD__;
	}
}

trait demo2
{
	public static function hello2()
	{
		echo __METHOD__;
	}
	public static function hello3()
	{
		echo __METHOD__;
	}
}

class demo
{
	use demo1,demo2{
		demo1::hello3 insteadof demo2;
		demo2::hello3 as demo2hello3;
	}

	public static function hello()
	{
		echo __METHOD__;
	}
}


demo::hello();

echo "<hr>";

demo::hello1();

echo "<hr>";
demo::hello2();

echo "<hr>";

demo::hello3();

echo "<hr>";
demo::demo2hello3();

echo "<hr>";
?>