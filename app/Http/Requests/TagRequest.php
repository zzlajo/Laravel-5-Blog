<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class TagRequest extends Request
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
        if ($this->method() == "PUT") {
            return [
                'name' => 'required|max:255',
            ];
        }

        return [
            'name' => 'required|max:255',
            'slug' => 'required|max:255|unique:tags',
        ];
    }
}
