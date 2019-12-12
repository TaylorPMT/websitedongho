<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsUpdateRequest extends FormRequest
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
            'title' => 'required',
            'topid' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'title.required'=>'Tên Đăng Nhập Bắt Buộc Phải Có',
            'title.unique'=>'Tên Tin Tức Đã Tồn Tại',
            'topid.required'=>'Bạn Chưa Chọn Loại Tin Tức'



        ];
    }
}
