<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreBrandRequest extends FormRequest {
   
    public function rules() {

        if (request()->routeIs('store.brand')) {

            return [

                'brand_name_eng' => ['required', 'string', 'unique:brands,brand_name_eng'],
                'brand_name_hindi' => ['required', 'string', 'unique:brands,brand_name_hindi'],
                'brand_image' => ['image', 'mimes:png,jpg,jpeg'],
                'type_id' => ['required'],
            ];
        }

        return [

            'brand_name_eng' => ['required', 'string', Rule::unique('brands')->ignore($this->id)],
            'brand_name_hindi' => ['required', 'string', Rule::unique('brands')->ignore($this->id)],
            'brand_image' => ['image', 'mimes:png,jpg,jpeg'],
            'type_id' => ['required'],
        ];
    }

    public function messages()
    {
        return [

            'brand_name_eng.required' => 'English brand name is required.',
            'brand_name_hindi.required' => 'Hindi brand name is required.',
            'brand_name_eng.unique' => 'English brand is already exist.',
            'brand_name_hindi.unique' => 'Hindi brand is already exist.',
            'brand_image.image' => 'Brand image must be an image.',
            'brand_image.mimes' => 'Brand image must be a file of type: png, jpg, jpeg.',
            'type_id.required' => 'Type is required.',
        ];
    }
}
