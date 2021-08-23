<?php

namespace App\Http\Requests\Rewards;

use Illuminate\Foundation\Http\FormRequest;

class rewardRequest extends FormRequest
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
            'title' => 'required|regex:/^[a-zA-Z0-9_]*$/u|max:255' ,
            'total_points' => 'required|regex:/^[1-9]\d*$/u|max:255' ,


            
        ];
    }
}
