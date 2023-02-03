<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\City;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function FetchCities($district_id)
    {


        $district_cities = City::where('district_id', $district_id)->orderBy('name', 'ASC')->get();

        return json_encode($district_cities);
    }

    public function PlaceOrder(Request $request)
    {


        $data = array();

        $data['first_name'] = $request->fname;
        $data['last_name'] = $request->lname;
        $data['phone'] = $request->phone;
        $data['email'] = $request->email;
        $data['address'] = $request->address;
        $data['post_code'] = $request->post_code;
        $data['note'] = $request->note;
        $data['district_id'] = $request->district_id;
        $data['city_id'] = $request->city_id;
        $cart_total = Cart::total();

        //    dd($data);

        if ($request->payment_method === 'stripe') {

            return view('frontend.payment.stripe', compact('data', 'cart_total'));

        } elseif ($request->payment_method === 'card') {

            return view('frontend.payment.card', compact('data'));

        } else {
            return view('frontend.payment.cash', compact('data', 'cart_total'));
        }


    }
}