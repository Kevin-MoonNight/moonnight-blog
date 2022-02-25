<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StoreCommentRequest extends FormRequest
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
            'comment' => ['required', 'string', 'max:255'],
            'article_id' => ['required', 'numeric', Rule::exists('articles', 'id')],
            'user_id' => ['required', 'numeric', Rule::exists('users', 'id')],
            'parent_id' => ['nullable', 'numeric']
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'user_id' => $this->user_id ?: Auth::id()
        ]);
    }
}
