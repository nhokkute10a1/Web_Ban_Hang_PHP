<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NhaSanXuatRequest extends FormRequest
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
            'txtTenNSX'=>'required|unique:NhaSanXuat,TenNhaSanXuat',
            'txtDiaChi'=>'required',
            'txtSDT'=>'required'
        ];
    }
    public function messages()
    {
        return[
            'txtTenNSX.required'=>'Vui lòng nhập tên nhà sản xuất',
            'txtTenNSX.unique'=>'Tên nhà sản xuất đã tồn tại',

            'txtDiaChi.required'=>'Vui lòng nhập địa chỉ',
            'txtSDT.required'=>'Vui lòng nhập số điện thoại'
        ];
    }
}
