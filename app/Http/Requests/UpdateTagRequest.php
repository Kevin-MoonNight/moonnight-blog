<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class UpdateTagRequest extends FormRequest
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
            'name' => ['required'],
            'slug' => ['required', Rule::unique('articles', 'slug')->ignore($this->route('tag'))]
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => Str::slug($this->slug ?: $this->name)
        ]);
    }

    public function messages()
    {
        return [
            "name.required" => "名稱為必填資料",
            "slug.required" => "slug為必填資料",
            "slug.unique" => "slug重複"
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response($this->validator->errors(), 400));
    }
}
