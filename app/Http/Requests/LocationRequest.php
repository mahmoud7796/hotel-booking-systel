<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LocationRequest extends FormRequest
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
            'country'=>'required|max:100',
            'city'=>'required|max:100',
            'address'=>'required|max:200',
            'latitude'=>'nullable|max:200',
            'longitude'=>'nullable|max:200',
        ];
    }
}
