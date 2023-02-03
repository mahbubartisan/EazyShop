<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Coupon;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\District;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function addToCart(Request $request, $id)
    {

        $product = Product::findOrFail($id);

        if (Session::has('coupon')) {
            Session::forget('coupon');
        }

        if ($product->discount_price == NULL) {

            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                // 'product_attribute' => $request->product_attribute, 
                'qty' => $request->product_qty,
                'price' => $product->selling_price,
                'weight' => 1,
                'options' => [
                    'thumb_image' => $product->thumb_image,
                    'color' => $request->color
                ],
            ]);

            return response()->json(['success' => 'Product added successfully']);

        } else {

            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                // 'product_attribute' => $request->product_attribute, 
                'qty' => $request->product_qty,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => [
                    'thumb_image' => $product->thumb_image,
                    'color' => $request->color
                ],
            ]);


            return response()->json(['success' => 'Product added to the cart.']);

        }

    }

    public function MiniCart()
    {

        $cart_content = Cart::content();
        $cart_qty = Cart::count();
        $cart_total = Cart::total();

        return response()->json(
            array(
                'cart_content' => $cart_content,
                'cart_qty' => $cart_qty,
                'cart_total' => $cart_total
            )
        );
    }

    public function CartItemRemove($rowId)
    {

        Cart::remove($rowId);

        return response()->json(['success' => 'Cart item removed.']);
    }


    public function ViewMyCart()
    {

        return view('frontend.cart.index');
    }

    public function MyCartProduct()
    {

        $cart_content = Cart::content();
        $cart_qty = Cart::count();
        $cart_total = Cart::total();

        return response()->json(
            array(
                'cart_content' => $cart_content,
                'cart_qty' => $cart_qty,
                'cart_total' => $cart_total
            )
        );
    }

    public function MyCartProductRemove($rowId)
    {

        Cart::remove($rowId);

        if (Session::has('coupon')) {
            Session::forget('coupon');
        }

        return response()->json(['success' => 'Cart item removed.']);
    }

    public function CartQtyIncrement($rowId)
    {

        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty + 1);

        if (Session::has('coupon')) {

            $coupon_name = Session::get('coupon')['name'];
            $coupon = Coupon::where('name', $coupon_name)->first();

            Session::put('coupon', [
                'name' => $coupon->name,
                'amount' => $coupon->amount,
                'discount_amount' => Cart::total() * $coupon->amount / 100,
                'total_amount' => Cart::total() - Cart::total() * $coupon->amount / 100

            ]);
        }

        return response()->json('increment');
    }

    public function CartQtyDecrement($rowId)
    {

        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty - 1);

        if (Session::has('coupon')) {

            $coupon_name = Session::get('coupon')['name'];
            $coupon = Coupon::where('name', $coupon_name)->first();

            Session::put('coupon', [
                'name' => $coupon->name,
                'amount' => $coupon->amount,
                'discount_amount' => Cart::total() * $coupon->amount / 100,
                'total_amount' => Cart::total() - Cart::total() * $coupon->amount / 100

            ]);
        }

        return response()->json('decrement');
    }


    public function ApplyCoupon(Request $request)
    {

        $coupon = Coupon::where('name', $request->coupon_name)
            ->where('validity', '>=', now()->format('Y-m-d'))->first();

        if ($coupon) {

            Session::put('coupon', [
                'name' => $coupon->name,
                'amount' => $coupon->amount,
                'discount_amount' => round(Cart::total() * $coupon->amount / 100),
                'total_amount' => round(Cart::total() - Cart::total() * $coupon->amount / 100)

            ]);

            return response()->json(
                array(
                    'validity' => true,
                    'success' => 'Coupon has been applied successfully'
                )
            );

        } else {

            return response()->json(
                array(
                    'error' => 'Invalid coupon code'
                )
            );
        }

    }

    public function CouponAmountCalc()
    {

        if (Session::has('coupon')) {

            return response()->json(
                array(
                    'sub_total' => Cart::total(),
                    'name' => Session::get('coupon')['name'],
                    'amount' => Session::get('coupon')['amount'],
                    'discount_amount' => Session::get('coupon')['discount_amount'],
                    'total_amount' => Session::get('coupon')['total_amount']

                )
            );

        } else {

            return response()->json(
                array(
                    'total' => Cart::total()
                )
            );
        }

    }

    public function CouponRemove()
    {

        Session::forget('coupon');

        return response()->json(['success' => 'Coupon removed successfully.']);
    }

    public function CheckoutPage()
    {

        if (Auth::check()) {

            if (Cart::total() > 0) {

                $cart_contents = Cart::content();
                $cart_qty = Cart::count();
                $cart_total = Cart::total();

                $districts = District::orderBy('name', 'ASC')->get();

                return view('frontend.checkout.index', compact('cart_contents', 'cart_qty', 'cart_total', 'districts'));

            } else {

                return redirect()->to('/');
            }

        } else {

            return redirect()->route('login');
        }

    }
}