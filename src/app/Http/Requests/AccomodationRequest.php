<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccomodationRequest extends FormRequest
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
            'name' => 'required|string|max:50',
            'category_id' => 'required|string|max:1',
            'summary' => 'required|string|min:30',
            'url' => 'required|string|url',
            'accomodation_img' => 'file|mimes:jpeg,png,jpg,bmb|max:2048',
        ];
    }
}
