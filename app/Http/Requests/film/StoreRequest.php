<?php

namespace App\Http\Requests\film;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => 'required|string',
            'description' => 'required|string',
            'realease_date' => 'required|date',
            'rating' => 'required|numeric',
            'ticket_price' => 'required|numeric',
            'country_id' => 'required|integer',
            'genre_id' => 'required|string',
            'photo' => 'required',
        ];
    }
}
