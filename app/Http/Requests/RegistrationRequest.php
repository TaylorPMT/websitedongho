<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
         'name' => 'required|unique:db_user|',
         //   'fullname' => 'required',
         //   'email'=>'required',
            //unique kiem tra trung
            //required kiem tra rong
         //  'password'=>'required',
         //  'gioitinh'=>'required',
         //  'phone'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Tên Đăng Nhập Bắt Buộc Phải Có',

          // 'topid.required'=>'Bạn Chưa Chọn Loại Sản Phẩm',
          //  'email.required'=>'Email Không được để trống',
            //'password.required'=>'Họ và tên Không được để trống',
           // 'gioitinh.required'=>'Họ và tên Không được để trống',
           // 'phone.required'=>'Họ và tên Không được để trống',


        ];
    }
}
