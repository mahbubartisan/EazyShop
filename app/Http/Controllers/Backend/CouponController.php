<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function ShowCoupon()
    {

        $coupons = Coupon::latest()->get();

        return view('admin.coupon.show', compact('coupons'));
    }

    public function CreateCoupon()
    {

        return view('admin.coupon.create');
    }

    public function StoreCoupon(Request $request)
    {

        Coupon::create([
            'name' => strtoupper($request->name),
            'amount' => $request->amount,
            'validity' => $request->validity,
            'status' => $request->status,
            'created_at' => now()
        ]);

        return redirect()->route('show.coupon');
    }

    public function EditCoupon($id)
    {

        $data['coupon'] = Coupon::findOrFail($id);

        return view('admin.coupon.edit', $data);

    }

    public function UpdateCoupon(Request $request, $id)
    {

        Coupon::findOrFail($id)->update([
            'name' => strtoupper($request->name),
            'amount' => $request->amount,
            'validity' => $request->validity,
            'status' => $request->status,
            'updated_at' => now()
        ]);

        return redirect()->route('show.coupon');
    }

    public function DeleteCoupon($id)
    {

        Coupon::findOrFail($id)->delete();

        return back();

    }
}