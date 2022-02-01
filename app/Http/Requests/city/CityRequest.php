<?php

namespace App\Http\Requests\city;

use Illuminate\Foundation\Http\FormRequest;

class CityRequest extends FormRequest
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
            's_name' => 'required|string',
            's_slug' => 'required|string|unique:cities',
            'fk_i_region_id' => 'required',
        ];
    }
}
