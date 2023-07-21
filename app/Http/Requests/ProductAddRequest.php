<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductAddRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'bail|required|unique:products|max:168|min:3',
            'price' => 'required',
            'contents' => 'required',
            'parent_id' => 'required',

        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Tên không được để trống',
            'name.max' => 'Tên không được quá 168 ký tự',
            'name.unique' => 'Tên không được phép giống nhau',
            'name.min' => 'Tên không được nhỏ quá 3 kí tự',
            'price.required' => 'Giá không được để trống',
            'contents.required' => 'Nội dung không được để trống',
            'parent_id.required' => 'Danh mục không được để trống',
        ];
    }
}
