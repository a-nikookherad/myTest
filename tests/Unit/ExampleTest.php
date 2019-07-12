<?php

namespace Tests\Unit;
include_once "../../app/test.php";
use database;
use App\test\facade_test;
use App\test\harchi;
use App\User;
use factory;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
	use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
		$response=facade_test::chap('ali');
		$this->assertEquals($response,'helloali');
    }

	public function testResponse()
	{
		$response=new harchi();
		$bar=$response->chap("ali");
		$this->assertEquals($bar,'helloali');
    }

	public function testSingletonDesignPattern()
	{
		$db=database::db();
//		$db=new  database();
		echo $db->dbName;
		echo '<br>';
		$db->dbName="pdo";
		$db2=database::db();
//		$db2=new database();
		echo $db2->dbName;
		$this->assertEquals($db2->dbName,"pdo");
	}

	public function testFactoryDesignPattern()
	{
		$aliCars=factory::carBuilder("bmw");
		$this->assertEquals($aliCars->name,'bmw');

	}
	public function testCheckUsers()
	{
//		$users=User::all();
//		$this->assert($users);
//		$this->assertDatabaseHas("users");
    }
}
