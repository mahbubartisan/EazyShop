<?php

namespace App\Http\Controllers\Backend;

use App\Models\Attribute;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AttributeValue;

class AttributeValueController extends Controller
{
    
    public function ShowAttributeValue(){

        // $a = null;

    //    ( $a ??= 'abc');

    //    dd($a);

        $attr_values = AttributeValue::with('attributes')->get()->groupBy('attribute_id');
        
      
        return view('admin.attribute value.show', compact('attr_values'));
    }
    
    public function CreateAttributeValue(){

        $attributes = Attribute::all();

        return view('admin.attribute value.create', compact('attributes'));
    }

    public function StoreAttributeValue(Request $request){

        
        foreach ($request->attr_id as $key => $value) {


            // dd($key);
            
            $attr_values = [

                'attr_value_eng' => $request->eng_value[$key],
                'attr_value_hindi' => $request->hindi_value[$key],
                'attribute_id' => $request->attr_id[$key],
                'created_at' => now()
            ];

           

        AttributeValue::create($attr_values);
            
        }

       

        // AttributeValue::create([
        //     'attr_value_eng' => $request->eng_value,
        //     'attr_value_hindi' => $request->hindi_value,
        //     'attribute_id' => $request->attr_id,
        //     'created_at' => now()
        // ]);

        //     dd($request->eng_value);

        return back();
    }
}
