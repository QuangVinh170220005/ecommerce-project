<?php

namespace App\Http\Requests\admin;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
            'name.required' => 'Vui lòng nhập brand.',
            'name.string' => 'Brand phải là chuỗi.',
            'name.max' => 'Brand không được vượt quá 100 ký tự.',
        ];
    }
}
