<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required|min:4',
            'price' => 'required',
            'description' => 'required|min:10',
            'quantity' => 'required',
            'image' => 'required|image',
            'category_id' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.min' => 'Tên sản phẩm có phải có độ dài ít nhất 4 kí tự',
            'name.required' => 'Tên sản phẩm không được để trống',
            'price.required' => 'Giá sản phẩm không được để trống',
            'description.min' => 'Mô tả sản phẩm có phải có độ dài ít nhất 10 kí tự',
            'description.required' => 'Mô tả sản phẩm không được để trống',
            'quantity.required' => 'Số lượng sản phẩm không được để trống',
            'image.required' => 'Ảnh sản phẩm không được để trống',
            'category_id.required' => 'Thể loại sản phẩm không được để trống',
            'image.image' => 'Ảnh sản phẩm phải đúng định dạng',

        ];
    }
}
