<?php

namespace App\Http\Requests;

use App\Models\Article;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class UpdateArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::any(['article', 'admin'], $this->route('article'));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required', 'max:255'],
            'content' => ['required'],
            'slug' => ['required', Rule::unique('articles', 'slug')->ignore($this->route('article'))],
            'excerpt' => ['required'],
            'thumbnail' => ['image'],
            'state' => ['required'],
            'tags' => []
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => Str::slug($this->slug ?: $this->title)
        ]);
    }

    public function messages()
    {
        return [
            "title.required" => "標題為必填資料",
            "title.max" => '標題必須小於255',
            "content.required" => "內容為必填資料",
            "slug.required" => "slug為必填資料",
            "slug.unique" => "slug重複",
            "excerpt.required" => "摘要為必填資料",
            "thumbnail.image" => '縮圖為必須為圖片',
            "state.required" => '狀態為必填資料',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response($this->validator->errors(), 400));
    }
}
