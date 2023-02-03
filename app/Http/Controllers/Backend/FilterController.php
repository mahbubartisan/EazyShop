<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Filter;
use App\Models\FilterValue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FilterController extends Controller
{
    public function ShowFilter()
    {

        $data['filters'] = Filter::with('filterValue')->get();

        // return

        $category = Category::select('id', 'category_name_eng')->get();

        return view('admin.filter.show', $data, compact('category'));
    }
    public function CreateFilter()
    {

        // return
        // $data['categories'] = Category::get()->groupBy('parent_id')->toArray();
        $data['categories'] = Category::with('parents')->get();
        // $data ['sub_categories'] = Category::whereNotNull('parent_id')->first();

        // return

        return view('admin.filter.create', $data);
    }

    public function StoreFilter(Request $request)
    {
        $filter = Filter::create([
            'cat_ids' => implode(',', $request->cat_ids),
            'filter_name' => $request->filter_name,
            'filter_column' => strtolower($request->filter_column),
            'status' => 1,
            'created_at' => now()
        ]);

        DB::statement('Alter table products add ' . strtolower($request->filter_column) . ' varchar(255) after special_offer');

        foreach ($request->filter_value as $key => $value) {

            $data = [
                'filter_value' => $request->filter_value[$key],
                'filter_id' => $filter->id,
                'status' => 1,
                'created_at' => now()

            ];

            FilterValue::insert($data);
        }

        return redirect()->route('show.filter');
    }

    public function EditFilter($id)
    {

        // return
        $data['filter_values'] = FilterValue::with('filter')->where('filter_id', $id)->get();

        $data['categories'] = Category::all();

        return view('admin.filter.edit', $data);
    }

    public function UpdateFilter(Request $request, $id)
    {
        $filter = Filter::findOrFail($id);



        $filter->update([
            'cat_ids' => implode(',', $request->cat_ids),
            'filter_name' => $request->filter_name,
            'filter_column' => strtolower($request->filter_column),
            'status' => 1,
            'updated_at' => now()

        ]);

        //DB::statement('Alter table products update '.strtolower($request->filter_column).' varchar(255) after special_offer');


        $filter->filterValue()->delete();

        foreach ($request->filter_value as $key => $value) {
            $data[] = [
                'filter_value' => $request->filter_value[$key],
                'filter_id' => $filter->id,
                'status' => 1,
                'updated_at' => now()

            ];
        }

        $filter->filterValue()->insert($data);

        return redirect()->route('show.filter');
    }
}