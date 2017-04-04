<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoaiSanPhamRequest extends FormRequest
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
        //unique:ten bang,cot
        return [
           'txtTenLoai'=>'required|unique:LoaiSanPham,TenLoai'
        ];
    }
    public function messages()
    {
        return[
            'txtTenLoai.required'=>'Vui lòng nhập tên loại',
            'txtTenLoai.unique'=>'Tên loại đã tồn tại'
        ];
    }
}
