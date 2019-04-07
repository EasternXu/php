<?php  

/**
 * 1、单例模式
 * 2、工厂模式
 * 3、注册树
 */

class Site
{
	// 属性
	protected $siteName;


	// 定义变量，用来保存实例对象
	protected static $instance = null;

	// 私有的构造函数，防止外部使用new来实例化
	protected function __construct($siteName)
	{
		$this->siteName = $siteName;
	}


	//检查是否有实例化对象
	
	public static function getInstance($siteName)
	{
		if (!self::$instance instanceof self) {
			self::$instance = new self($siteName);
		}
		return self::$instance;
	}
}



//工厂模式

class Factory
{
	//返回一个对象实例
	public static function create()
	{
		return Site::getInstance('www.php.cn');
	}
}



//注册树

class Register
{
	/**
	 * 注册：set()
	 * 获取：get()
	 * 注销：_unset()
	 * 
	 * 
	 */
	
	protected static $objects = [];

	public static function set($alias,$obj)
	{
		self::$objects[$alias] = $obj; 
	}

	public static function get($alias)
	{
		return self::$objects[$alias]; 
	}

	public static function _unset($alias)
	{
		unset(self::$objects[$alias]); 
	}


}


Register::set('site',Factory::create());


$obj = Register::get('site');

var_dump($obj);


















?>