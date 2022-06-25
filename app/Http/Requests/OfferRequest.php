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
        return [
            'name_ar' => 'required|max:100',
            'name_en' => 'required|max:100',
            'price' => 'required|max:20|numeric',
            'details_ar' => 'required',
            'details_en' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name_ar.required' => __('massages.name required'),
            'name_en.required' => __('massages.name required'),
            'name_ar.max' => __('massages.name max'),
            'name_en.max' => __('massages.name max'),
            'price.required' => __('massages.price required'),
            'price.max' => __('massages.price max'),
            'price.numeric' => __('massages.price numeric'),
            'details_ar.required' => __('massages.details required'),
            'details_en.required' => __('massages.details required'),

        ];
    }
}
