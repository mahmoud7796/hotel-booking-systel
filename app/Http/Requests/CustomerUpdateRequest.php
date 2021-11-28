<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerUpdateRequest extends FormRequest
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
            'photo'=>'required_without:id|mimes:jpg,jpeg,png',
            'full_name' => 'required|max:200',
            'email' =>  'required|email',
            'password' =>  'nullable',
            'mobile' =>  'required|min:11|numeric',
            'address' =>  'required|max:255',
        ];
    }
}
