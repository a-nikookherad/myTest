<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class userRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
			"name" => 'string|min:3|max:50' ,
			"email" => 'email|required|unique:users,email' ,
			"password" => 'min:3|max:50|required' ,
        ];
    }

	public function messages()
	{
		return [
/*			'name.min' => 'حداقل کاراکتر ها نباید از 3 کمتر باشد!',
			'email.email' => 'قالب ایمیل درست نمی باشد!',
			'email.required' => 'فیلد ایمیل اجباری است',
			'email.unique' => 'ایمیل تکراری است !',
			'password.min' => 'حداقل کاراکتر ها نباید از 3 کمتر باشد!',
			'password.max' => 'حداکثر کاراکتر ها نباید از 50 بیشتر باشد!',
			'password.required' => 'فیلد پسورد اجباری میباشد!',*/
		];
    }
}
