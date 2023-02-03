<?php

namespace App\Http\Controllers\Backend;

use App\Models\State;
use App\Models\District;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\City;

class ShippingController extends Controller
{
    public function ShowShipping()
    {


        $data['district_cities'] = District::with('city')->get();

        return view('admin.shipping.show', $data);

    }

    public function CreateShipping()
    {

        return view('admin.shipping.create');

    }

    public function StoreShipping(Request $request)
    {


        $district = District::create([
            'name' => $request->district_name,
            'created_at' => now()
        ]);


        foreach ($request->city_name as $key => $value) {

            $data = [
                'name' => $request->city_name[$key],
                'district_id' => $district->id,
                'created_at' => now()

            ];

            City::create($data);
        }

        return redirect()->route('show.shipping');


    }

    public function EditShipping($id)
    {

        $data['cities'] = City::with('district')->where('district_id', $id)->get();

        return view('admin.shipping.edit', $data);

    }


    public function UpdateShipping(Request $request, $id)
    {

        $district = District::findOrFail($id);

        $district->update([
            'name' => $request->district_name,
            'updated_at' => now()


        ]);


        $district->city()->delete();


        foreach ($request->city_name as $key => $value) {

            $data[] = [
                'name' => $request->city_name[$key],
                'district_id' => $id,
                'updated_at' => now()

            ];
        }

        $district->city()->insert($data);

        return redirect()->route('show.shipping');

    }


    public function DeleteShipping($id)
    {

        District::findOrFail($id)->delete();

        return back();
    }
}