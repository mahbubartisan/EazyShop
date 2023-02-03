<?php

namespace App\Http\Controllers\Backend;

use App\Models\Attribute;
use Illuminate\Http\Request;
use App\Models\AttributeValue;
use App\Http\Controllers\Controller;


class AttributeController extends Controller
{

    public function ShowAttribute()
    {
        // return
        $attr_values = AttributeValue::with('attributes')->get()->groupBy('attribute_id');

        return view('admin.attribute.show', compact('attr_values'));
    }

    public function CreateAttribute()
    {

        return view('admin.attribute.create');
    }

    public function StoreAttribute(Request $request)
    {

        $attribute_id = Attribute::insertGetId([
            'attr_name_eng' => $request->attr_name_eng,
            'attr_name_hindi' => $request->attr_name_hindi,
            'created_at' => now()

        ]);

        foreach ($request->attr_value_eng as $key => $value) {

            $attr_values = [
                'attr_value_eng' => $request->attr_value_eng[$key],
                'attr_value_hindi' => $request->attr_value_hindi[$key],
                'attribute_id' => $attribute_id,
                'created_at' => now()

            ];

            AttributeValue::insert($attr_values);

        }

        return redirect()->route('show.attribute');
    }

    public function EditAttribute($key)
    {

        $data['attr_values'] = AttributeValue::with('attributes')->where('attribute_id', $key)->get();

        return view('admin.attribute.edit', $data);

    }

    public function UpdateAttribute(Request $request, $id)
    {

        $attribute = Attribute::findOrFail($id);

        $attribute->update([
            'attr_name_eng' => $request->attr_name_eng,
            'attr_name_hindi' => $request->attr_name_hindi,
            'updated_at' => now(),

        ]);


        $attribute->attributeValue()->delete();


        foreach ($request->attr_value_eng as $key => $value) {

            $data[] = [
                'attr_value_eng' => $request->attr_value_eng[$key],
                'attr_value_hindi' => $request->attr_value_hindi[$key],
                'attribute_id' => $id,
                'updated_at' => now()
            ];

        }

        $attribute->attributeValue()->insert($data);

        return redirect()->route('show.attribute');

    }

    public function DeleteAttribute($id)
    {


        Attribute::find($id)->delete();

        return redirect()->route('show.attribute');

    }

}