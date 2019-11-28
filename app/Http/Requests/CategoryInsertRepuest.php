<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryInsertRepuest extends FormRequest
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
            'name' => 'required|unique:db_category|',

            //
        ];
    }
    public function messages()
    {
        return [
            'name.category'=>'Tên Đăng Nhập Bắt Buộc Phải Có',
            'name.unique'=>'Tên Sản Phẩm Đã Tồn Tại',




        ];
    }
}
