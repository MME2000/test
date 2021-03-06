<?php

namespace App\Http\Requests\comment;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
            'fk_i_item_id' => 'required',
            's_title' => 'required|string',
            's_author_name' => 'required|string',
            's_author_email' => 'required|string|email',
            's_body' => 'required|string',
        ];
    }
}
