<?php

namespace App\Http\Controllers;

use App\Http\Requests\userRequest;
use App\Http\Resources\userResource;
use App\Http\Resources\userResourceCollection;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{

	public function index()
	{
		//
		userResourceCollection::wrap("dadeha");
		$users = User::all();
		$userResourceCollection = new userResourceCollection($users->load("posts"));
		return $userResourceCollection;
	}


	public function show($id)
	{
		//
		userResource::wrap("dadeha");
//		userResource::withoutWrapping();
		$user = User::findOrFail($id);
		$userResource = new userResource($user->load("posts"));
		return $userResource;

	}


	public function store(userRequest $request)
	{
		//

		$data = [
			"name" => $request->input("name") ,
			"email" => $request->input("email") ,
			"password" => $request->input("password") ,
		];

		$user = User::create($data);
		if ($user instanceof User) {
			return $this->jsonResponse(["msg" => "user successfully created"] , 201);
		}
		return $this->jsonResponse(["error" => "bad request"] , 400);
	}


	public function update(userRequest $request , $id)
	{
		//
		$data = [
			"name" => $request->input("name") ,
			"email" => $request->input("email") ,
			"password" => $request->input("password") ,
		];
		$isUpdate = User::where("id" , $id)->update($data);
		if ($isUpdate) {
			return $this->jsonResponse(["msg" => "user successfully updated"] , 202);
		}
		return $this->jsonResponse(["error" => "bad request"] , 400);
	}

	public function destroy($id)
	{
		//
		if (User::find($id)) {
			$isDelete = User::where("id" , $id)->delete();
			if ($isDelete) {
				return $this->jsonResponse(["msg" => "user delete successfully"] , 204);
			}
		}

		return $this->jsonResponse(["error" => "bad request"] , 400);
	}


	public function login(Request $request)
	{
		if (Auth::attempt([
			"email" => $request->input("email") ,
			"password" => $request->input("password") ,
		])) {
			return $this->jsonResponse(["token" => Auth::user()->generateToken()] , 200);
		}
		return $this->jsonResponse(["error" => "user is not valid"] , 401);
	}


	public function logout()
	{
		Auth::guard("api")->user()->removeToken();
		Auth::guard("api")->logout();
		return $this->jsonResponse(["msg" => "user successfully logout"] , 200);
	}

	/**
	 * generate json response for api request
	 *
	 * @param $message
	 * @param $code
	 * @return \Illuminate\Http\JsonResponse
	 */
	private function jsonResponse($message , $code): \Illuminate\Http\JsonResponse
	{
		return response()
			->json($message , $code);
	}
}
