<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHolderRequest extends FormRequest {

    public function rules() {

        if (request()->routeIs('store.type')) {

            return [

                'type_eng' => ['required'],
                'type_hindi' => ['required'],

            ];
        }

        return [

            'type_eng' => ['required'],
            'type_hindi' => ['required'],
        ];
    }

}
