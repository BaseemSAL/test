<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferRequest extends FormRequest
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
        return ['name'=>'required',
            'price'=>'required|numeric',
            'photo'=>'required'];
    }

    public function messages()
    {
      return [
          'name.required'=>'Enter Name Please',
          'price.required'=>'Enter Price Please',
          'price.numeric'=>'price must be a number'];

    }
}
