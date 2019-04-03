<?php  

/**
 * php5  可以实现的标量
 *
 *	array
 *	
 *	类
 *	
 *	闭包 
 * 
 */
// declare(strict_types=1);//严格模式，必须放在开头

class c{
	public $a = 1;
}


function sum(array $a)
{
	echo $a[0]+$a[1]."</br>";
}

sum(array(1,2));


function sum1(c $c,$a)
{
	echo $c->a+$a."</br>";
}

$c = new c();
sum1($c,1);

//强制模式
function sum2(int $a,int $b)
{
	echo $a+$b."</br>";
}

sum2(1.1,2);

//严格模式下，只有int可以转换为float
function sum3(float $a,float $b)
{
	echo $a+$b."</br>";
}

sum2(1.1,2);
/**
 * php7  
 * 	int float bool string
 * 
 */
?>