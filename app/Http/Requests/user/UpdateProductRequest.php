<?php

namespace App\Http\Requests\user;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'name' => 'required|string',
            'price' => 'required|numeric|min:0',
            'id_category' => 'required|integer',
            'id_brand' => 'required|integer',
            'status' => 'required|in:0,1',
            'sale' => 'nullable|integer|min:0',
            'company' => 'required|string',
            'image' => 'nullable|array',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'rmImage' => 'nullable|array',
            'rmImage.*' => 'string',
            'detail' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Vui lòng nhập tên sản phẩm.',
            'name.string' => 'Tên sản phẩm phải là chuỗi.',

            'price.required' => 'Vui lòng nhập giá sản phẩm.',
            'price.numeric' => 'Giá sản phẩm phải là số.',
            'price.min' => 'Giá sản phẩm không được nhỏ hơn 0.',

            'id_category.required' => 'Vui lòng chọn danh mục.',
            'id_category.integer' => 'Danh mục không hợp lệ.',

            'id_brand.required' => 'Vui lòng chọn thương hiệu.',
            'id_brand.integer' => 'Thương hiệu không hợp lệ.',

            'status.required' => 'Vui lòng chọn trạng thái.',
            'status.in' => 'Trạng thái không hợp lệ.',

            'sale.integer' => 'Giảm giá phải là số nguyên.',
            'sale.min' => 'Giảm giá không được nhỏ hơn 0.',

            'company.required' => 'Vui lòng nhập company.',
            'company.string' => 'Company phải là chuỗi.',

            'image.array' => 'Hình ảnh không hợp lệ.',

            'image.*.image' => 'File upload phải là hình ảnh.',
            'image.*.mimes' => 'Hình ảnh phải có định dạng jpeg, png, jpg hoặc gif.',
            'image.*.max' => 'Mỗi hình ảnh không được vượt quá 2MB.',

            'rmImage.array' => 'Danh sách hình ảnh muốn xóa không hợp lệ.',
            'rmImage.*.integer' => 'Vị trí hình ảnh muốn xóa không hợp lệ.',
            'rmImage.*.min' => 'Vị trí hình ảnh không hợp lệ.',

            'detail.required' => 'Vui lòng nhập chi tiết sản phẩm.',
            'detail.string' => 'Chi tiết sản phẩm phải là chuỗi.',
        ];
    }
}
