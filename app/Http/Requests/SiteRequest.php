<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SiteRequest extends FormRequest
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
            'name'        => 'required|min:2|max:20|regex:/^[a-zA-Z0-9\-\s]+$/|exists:sites,name',
            'code'        => 'required',
            'logo' 		  => 'image|required|mimes:jpeg,png,jpg,gif,svg',
            'flag' 		  => 'image|required|mimes:jpeg,png,jpg,gif,svg',
        ];
    }
}
