<?php  
namespace A;


class A
{
	function say()
	{
		echo "A--a--say";
	}

	function jump()
	{
		echo "A--a--jump";
	}
}


class B
{
	function say()
	{
		echo "A--b--say";
	}

	function jump()
	{
		echo "A--b--jump";
	}
}


namespace B;


use A\{A,B as AB};//可以引入多个class
$a = new A();

$a->say();

$b = new AB();

$b->say();

?>