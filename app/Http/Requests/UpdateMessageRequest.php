<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Gate;

class UpdateMessageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('admin');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'remark' => ['max:500'],
            'caseType' => ['required']
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "姓名為必填資料",
            "name.max" => '姓名必須小於255',
            "email.required" => "電子信箱為必填資料",
            "email.max" => '電子信箱必須小於255',
            "email.email" => '必須為電子信箱',
            'remark' => '備註必須小於500個字',
            "caseType.required" => '委託類型為必填資料',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response($this->validator->errors(), 400));
    }
}
