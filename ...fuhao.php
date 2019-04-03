<?php  


	//第一种用法
	function sum(...$args)
	{
		$sum = 0;
		var_dump($args);

		foreach ($args as $item) {
			$sum += $item;
		}
		return $sum;
	}

	var_dump(sum(1,2,3,4,5));//将传入函数的参数当做一个数组



	//第二种用法
	function sum2(...$args)
	{
		var_dump($args);
	}

	var_dump(sum2(...[1,2,3,4,5]));//将传递进函数的数组中的每个元素都当做一个参数来传入
?>