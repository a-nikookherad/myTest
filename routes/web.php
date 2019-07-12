<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\category;
use App\Jobs\createLogJob;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;



Route::get('/' , function () {
	return view('welcome');
});


//create panel for acl
//create event listener
//create job
Route::get('/review' , function () {
	return view('post');
});
/*--------------------------gate policy-----------------------------*/

Route::get('/gate' , function () {
	$cat = category::where("id" , 1)->first();
	$post = null;
	$user = Auth::user();
	/*gate test*/
//	if($user->can('show-content' ,$cat->posts()->where("post_id",1)->first())){
	/*	if(Gate::allows('show-content' ,$cat->posts()->where("post_id",1)->first())){
			$post=$cat->posts()->where("post_id",1)->first();

		}*/

	/*policy test*/

//	dd($user->canEdit());
	dd(Gate::forUser($user)->allows("update" , $cat->posts()->where("post_id" , 1)->first()));
	if (Gate::allows("view" , $cat->posts()->where("post_id" , 1)->first())) {
		$post = $cat->posts()->where("post_id" , 1)->first();
	}

	return view("welcome" , compact(['cat' , 'post']));
});


/*--------------------------events listener-----------------------------*/
Route::get('/event' , function () {
	$user = Auth::user();
	event(new \App\Events\userEvent($user));
});


/*--------------------------jobs-----------------------------*/
route::get('/job' , function () {
	$text = "my text for logs";
//	$user= Auth::user();

/*	createLogJob::
	withChain([new createLogJob("salam donya")])
		->dispatch($text)
		->delay(\Carbon\Carbon::now()->addSeconds(20))
		->allOnQueue("jegar")
		->onConnection("database");*/

	createLogJob::
		dispatch("salam donya")
		->delay(1)
		->onQueue("jegar")
		->onConnection("database");
});




/*--------------------------other-----------------------------*/

Route::get('/home' , 'HomeController@index')->name('home');



Route::resource('/category' , 'categoryController');










Auth::routes();