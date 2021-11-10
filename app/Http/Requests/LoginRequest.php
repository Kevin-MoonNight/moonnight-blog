<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class LoginRequest extends FormRequest
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
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string'],
        ];
    }

    public function messages()
    {
        return [
            "email.required" => "電子信箱為必填資料",
            "email.string" => "電子信箱必須為字串",
            "email.max" => "電子信箱必需小於255",
            "password.required" => '密碼為必填資料',
            "password.string" => '密碼必須為字串',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response($this->validator->errors(), 400));
    }
}
