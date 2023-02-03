<?php

namespace App\Http\Controllers\Backend;

use App\Models\Type;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function ShowCategory()
    {

        $data['categories'] = Category::with('parents', 'types')->get();

        return view('admin.category.show', $data);
    }

    public function CreateCategory()
    {

        $data['parent_categories'] = Category::whereNull('parent_id')->get();
        $data['types'] = Type::latest()->get();

        return view('admin.category.create', $data);
    }

    public function StoreCategory(Request $request)
    {


        Category::create([
            'category_name_eng' => $request->category_name_eng,
            'category_name_hindi' => $request->category_name_hindi,
            'parent_id' => $request->parent_id,
            'type_id' => $request->type_id,
            'category_icon' => $request->category_icon,
            'category_slug_eng' => strtolower(str_replace(' ', '-', $request->category_name_eng)),
            'category_slug_hindi' => strtolower(str_replace(' ', '-', $request->category_name_hindi)),
            'created_at' => now()

        ]);

        return redirect()->route('show.category');
    }

    public function EditCategory($id)
    {

        $data['category'] = Category::find($id);
        $data['parent_categories'] = Category::whereNull('parent_id')->get();
        $data['types'] = Type::all();

        return view('admin.category.edit', $data);
    }

    public function UpdateCategory(Request $request, $id)
    {

        Category::find($id)->update([
            'category_name_eng' => $request->category_name_eng,
            'category_name_hindi' => $request->category_name_hindi,
            'parent_id' => $request->parent_id,
            'category_icon' => $request->category_icon,
            'category_slug_eng' => strtolower(str_replace(' ', '-', $request->category_name_eng)),
            'category_slug_hindi' => strtolower(str_replace(' ', '-', $request->category_name_hindi)),
            'created_at' => now()

        ]);

        return redirect()->route('show.category');
    }

    public function DeleteCategory($id)
    {

        Category::find($id)->delete();

        return back();
    }

    public function ParentCategory($type_id)
    {

        $types = Category::whereNull('parent_id')->where('type_id', $type_id)->get();

        return json_encode($types);
    }

}