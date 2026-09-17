<?php

namespace App\Http\Requests\admin;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            'name' => 'required|max:20',
            'email' => 'required|email',
            'password' => 'nullable',
            'phone' => 'nullable',
            'address' => 'nullable',
            'id_country' => 'nullable',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Vui lòng nhập họ tên.',

            'email.required' => 'Vui lòng nhập email.',
            'email.email' => 'Email không đúng định dạng.',

            'avatar.image' => 'File tải lên phải là hình ảnh.',
            'avatar.mimes' => 'Avatar phải có định dạng jpeg, png, jpg hoặc gif.',
            'avatar.max' => 'Avatar không được lớn hơn 1MB.',
        ];
    }
}
