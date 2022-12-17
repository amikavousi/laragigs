<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ListingRequest extends FormRequest
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
            "title" => "required",
            "company" => "required",
            "tags" => "required",
            "email" =>["required","email"],
            "website" => ["required","url"],
            "location" => "required",
            "description" => "required",
            "logo" => "image"
        ];
    }
}
