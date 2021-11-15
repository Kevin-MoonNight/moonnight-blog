<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Gate;

class UpdateProductRequest extends FormRequest
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
            'excerpt' => ['required', 'max:255'],
            'thumbnail' => ['image'],
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "名稱為必填資料",
            "name.max" => "名稱字數必須小於255",
            "excerpt.required" => "摘要為必填資料",
            "excerpt.max" => "摘要字數必須小於255",
            "thumbnail.image" => '縮圖為必須為圖片',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response($this->validator->errors(), 400));
    }
}