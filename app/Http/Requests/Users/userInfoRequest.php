<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class userInfoRequest extends FormRequest
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
            //
            'first_name' => 'required|regex:/^[a-zA-Z]+$/u|max:255' ,
            'last_name' => 'required|regex:/^[a-zA-Z]+$/u|max:255' ,
            // 'father_name' => 'required|regex:/^[a-zA-Z]+$/u|max:255' ,
            'cnic' => 'required|regex:/^[0-9]{5}-[0-9]{7}-[0-9]$/u|max:255' ,
            'phone' => 'required|regex:/^((\+92)?(0092)?(92)?(0)?)(3)([0-9]{9})$/u|max:255' ,
            // 'address' => 'required|regex:/^[a-zA-Z]+$/u|max:255' ,
            // 'email' => 'required|regex:/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/u|max:255' ,


        ];
    }
}
