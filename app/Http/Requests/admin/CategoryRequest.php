<?php

namespace App\Http\Requests\admin;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:100'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập category.',
            'name.string' => 'Category phải là chuỗi.',
            'name.max' => 'Category không được vượt quá 100 ký tự.',
        ];
    }
}
