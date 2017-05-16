<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SponsorRequest extends FormRequest
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
            'name' => 'required|max:255',
            'image' => 'max:800|image|required',
            'desc' => 'required|max:800',
            'level' => 'required',
            'contact' => 'required|max:255',
            'email' => 'required|max:255',
            'phone' => 'required|max:25',
            'website' => 'required|max:255'
        ];
    }
}
