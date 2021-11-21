<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
            'user_name' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'user_name.required' => 'Tên người mua không được để trống',
            'phone_number.required' => 'Số điện thoại không được để trống',
            'address.required' => 'Địa chỉ không được để trống',
        ];
    }
}
