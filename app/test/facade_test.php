<?php
/**
 * Created by PhpStorm.
 * User: RedTie
 * Date: 07/06/2019
 * Time: 12:44 PM
 */

namespace App\test;


class facade_test
{
	public static function __callStatic($method, $param=[])
	{
		if (method_exists(harchi::class,$method)) {
			$harchi=new harchi();
			return call_user_func_array([$harchi,$method],$param);
		}else{
			dd('nakheyr');
		}
	}
}

