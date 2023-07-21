<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderAddRequest extends FormRequest
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
            'name' => 'bail|required|unique:sliders|max:168|min:3',
            'description' => 'required',
            'image_path' => 'required',

        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Tên slider không được để trống',
            'name.max' => 'Tên slider không được quá 168 ký tự',
            'name.unique' => 'Tên slider không được phép giống nhau',
            'name.min' => 'Tên slider không được nhỏ quá 3 kí tự',
            'description.required' => 'Mô tả không được để trống',
            'image_path.required' => 'Ảnh không được để trống',
        ];
    }
}
