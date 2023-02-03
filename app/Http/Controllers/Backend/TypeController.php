<?php

namespace App\Http\Controllers\Backend;

use App\Models\Type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHolderRequest;
// use App\Http\Requests\StoreTypeRequest;

class TypeController extends Controller
{
    public function ShowType()
    {

        $data['types'] = Type::latest()->paginate(10);

        return view('admin.type.show', $data);
    }

    public function CreateType()
    {

        return view('admin.type.create');
    }

    public function StoreType(StoreHolderRequest $request)
    {

        foreach ($request->type_eng as $key => $value) {

            $data = [
                'type_eng' => $request->type_eng[$key] ?? null,
                'type_hindi' => $request->type_hindi[$key] ?? null,
            ];
            
            Type::create($data);
        }


        return redirect()->route('show.type');
    }

    public function EditType($id)
    {

        $data['types'] = Type::findOrFail($id);

        return view('admin.type.edit', $data);
    }

    public function UpdateType(Request $request, $id)
    {

        foreach ($request->type_eng as $key => $value) {

            $data = [
                'type_eng' => $request->type_eng[$key] ?? null,
                'type_hindi' => $request->type_hindi[$key] ?? null,
            ];
        }

        Type::findOrFail($id)->update($data);

        return redirect()->route('show.type');

    }

    public function DeleteType($id)
    {

        Type::findOrFail($id)->delete();

        return back();
    }
}