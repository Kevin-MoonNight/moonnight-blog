<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\Rule;


class RegisterRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'username'=>['required','string','max:255', Rule::unique('users','username')],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users','email')],
            'password' => ['required', 'string', new Password, 'confirmed'],
        ];
    }

    public function messages()
    {
        return [
            "name.required" => '名稱為必填資料',
            "name.max" => '名稱必須小於255',
            "name.string" => '名稱必須為字串',
            "username.required" => "帳號為必填資料",
            "username.max" => '帳號必須小於255',
            "username.string" => '帳號必須是字串',
            "username.unique" => "帳號已經被註冊了",
            "email.required" => "電子信箱為必填資料",
            "email.string" => "電子信箱必須為字串",
            "email.max" => "電子信箱必需小於255",
            "email.unique" => "電子信箱已經被註冊了",
            "password.required" => '密碼為必填資料',
            "password.string" => '密碼必須為字串',
            "password.confirmed" => '密碼不一樣',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response($this->validator->errors(),400));
    }
}
