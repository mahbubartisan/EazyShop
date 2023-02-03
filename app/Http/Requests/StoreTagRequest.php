<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreTagRequest extends FormRequest {

    public function rules() {

        if (request()->routeIs('store.tag')) {

            return [

                'tag_eng' => ['required', 'string','array','min:3'],
                'tag_hindi' => ['required', 'string', 'unique:tags,tag_hindi'],
            ];
        }

        return [
            'tag_eng' => ['required', 'string', Rule::unique('tags')->ignore($this->id)],
            'tag_hindi' => ['required', 'string', Rule::unique('tags')->ignore($this->id)],
        ];
    }
}
