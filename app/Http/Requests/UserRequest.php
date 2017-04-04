<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'txtUser'=>'required|unique:users,name',
            'txtRePass'=>'required|same:txtPass',
            'txtEmail'=>'required|unique:users,email',
        ];
    }
    public function messages()
    {
        return[
            'txtUser.required'=>'Vui lòng nhập tên user',
            'txtUser.unique'=>'Tên user đã tồn tại',

            'txtRePass.required'=>'Vui lòng nhập lại mật khẩu',
            'txtUser.same'=>'Mật khẩu nhập lại không giống',

            'txtEmail.required'=>'Vui lòng nhập email',
            'txtEmail.unique'=>'Email đã tồn tại'
        ];
    }
}
