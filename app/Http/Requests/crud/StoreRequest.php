<?php

namespace App\Http\Requests\crud;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
        'nama'=>'Required',
        'username'=>'Required',
        'xxx'=>'Required',
        'password'=>'Required',
        'attribute'=>'Required',
        'op'=>'Required'

            //
        ];
    }

     public function messages()
    {
        return [
            'nama.required' => 'Nama Tidak Boleh Kosong.',
            'username.required' => 'Username Tidak Boleh Kosong.',
            'xxx.required' => 'Xxx Tidak Boleh Kosong.',
            'password.required' => 'Password Tidak Boleh Kosong',
            'attribute.required' => 'Tidak Boleh Kosong',
            'op.required' => 'Tidak Boleh Kosong'
        ];
    }
}
