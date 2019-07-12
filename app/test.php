<?php



/* object mutator*/
 /* $obj=(object)["name"=>"ali"];
echo $obj->name;

$obj2=clone $obj;
$obj2->name="jafar";
echo $obj->name;
echo $obj2->name;*/

/*---------------------singleton design pattern---------------------*/
class database{
	private static $instanse=null;
	public $dbName='mysql';

	public static function db()
	{
		if (!self::$instanse instanceof database) {
			self::$instanse=new database();
		}
		return self::$instanse;
	}


	public function connection()
	{
		echo 'connect successfully';
	}

}

/*-------------------------factory design pattern-------------------------*/
class factory{
	public static function carBuilder($type)
	{
		switch ($type) {
			case 'benz':
				return new benz();
			case 'bmw':
				return new bmw();
			default:
				return new car();
		}
	}
}

interface carInterface{
	public function bogh();
	public function gaz();
}
class car implements carInterface {
	public $name;
	public $speed;

	public function bogh(): void
	{
		echo 'bogh';
	}

	public function gaz():void
	{
		echo 'gaz';
	}

}

class benz extends car{
	public $name='benz';

}

class bmw extends car{
	public $name='bmw';

}


