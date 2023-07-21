<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddSettingRequest extends FormRequest
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
            'config_key' => 'bail|required|max:20|min:3',
            'config_value' => 'required',

        ];
    }
    public function messages(): array
    {
        return [
            'config_key.required' => 'config_key Tên không được để trống',
            'config_key.max' => 'config_key không được quá 20 ký tự',
            'config_key.min' => 'config_key không được nhỏ quá 3 kí tự',
            'config_value.required' => 'config_value không được để trống',
        ];
    }
}
