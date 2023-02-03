<?php

namespace App\Http\Controllers\Frontend;

use Stripe\Charge;

use Stripe\Stripe;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\OrderMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;


class PaymentController extends Controller
{
	public function StripePayment(Request $request)
	{
		if (Session::has('coupon')) {
			$total_amount = session()->get('coupon')['total_amount'];
		} else {
			$total_amount = round(Cart::total());
		}

		Stripe::setApiKey('sk_test_51LWuT0C8a1g2DfHqT9JaEevm0bZmWLOeMfE6UQcgONDemThKGjwn8m6Jwb4FjBmgpY9FIR1xCLYKxgiVcfQsQadY00WSgfag3d');

		$token = $_POST['stripeToken'];

		$charge = Charge::create([
			'amount' => $total_amount * 100,
			'currency' => 'USD',
			'description' => 'Easy To Buy',
			'source' => $token,
			'metadata' => ['order_id' => uniqid()],
		]);

		// dd($charge);

		$order = Order::create([
			'user_id' => Auth::id(),
			'district_id' => $request->district_id,
			'city_id' => $request->city_id,
			'first_name' => $request->first_name,
			'last_name' => $request->last_name,
			'phone' => $request->phone,
			'email' => $request->email,
			'address' => $request->address,
			'postcode' => $request->postcode,
			'notes' => $request->notes,
			'payment_type' => 'Stripe',
			'payment_method' => 'Stripe',
			'payment_type' => $charge->payment_method,
			'transaction_id' => $charge->balance_transaction,
			'currency' => $charge->currency,
			'amount' => $total_amount,
			'order_no' => $charge->metadata->order_id,
			'invoice_no' => 'EMART' . mt_rand(10000000, 99999999),
			'order_date' => now()->format('d F Y'),
			'order_month' => now()->format('F'),
			'order_year' => now()->format('Y'),
			'status' => 'Pending',
			'created_at' => now(),
		]);

		// Start Send Confirmation Mail

		$send_mail = Order::findOrFail($order->id);

		$data = [
			'invoice_no' => $send_mail->invoice_no,
			'amount' => $total_amount,
			'order_no' => $send_mail->order_no,
			'email' => $send_mail->email,
			'first_name' => $send_mail->first_name,
			'last_name' => $send_mail->last_name,
		];

		Mail::to($request->email)->send(new OrderMail($data));


		// End Confirmation Mail

		$carts = Cart::content();

		foreach ($carts as $cart) {
			OrderItem::create([
				'order_id' => $order->id,
				'product_id' => $cart->id,
				'color' => $cart->options->color,
				'size' => $cart->options->size,
				'quantity' => $cart->qty,
				'price' => $cart->price,
				'created_at' => now(),
			]);
		}

		if (Session::has('coupon')) {
			Session::forget('coupon');
		}

		Cart::destroy();

		return redirect()->to('/');
	}

	public function CashOnDelivery(Request $request)
	{
		if (Session::has('coupon')) {
			$total_amount = session()->get('coupon')['total_amount'];
		} else {
			$total_amount = round(Cart::total());
		}


		$order = Order::create([
			'user_id' => Auth::id(),
			'district_id' => $request->district_id,
			'city_id' => $request->city_id,
			'first_name' => $request->first_name,
			'last_name' => $request->last_name,
			'phone' => $request->phone,
			'email' => $request->email,
			'address' => $request->address,
			'postcode' => $request->postcode,
			'notes' => $request->notes,
			'payment_type' => 'CASH ON DELIVERY',
			'payment_method' => 'CASH ON DELIVERY',
			'currency' => 'USD',
			'amount' => $total_amount,
			'invoice_no' => 'EMART' . mt_rand(10000000, 99999999),
			'order_date' => now()->format('d F Y'),
			'order_month' => now()->format('F'),
			'order_year' => now()->format('Y'),
			'status' => 'Pending',
			'created_at' => now(),
		]);

		// Start Send Confirmation Mail

		$send_mail = Order::findOrFail($order->id);

		$data = [
			'invoice_no' => $send_mail->invoice_no,
			'amount' => $total_amount,
			'order_no' => $send_mail->order_no,
			'email' => $send_mail->email,
			'first_name' => $send_mail->first_name,
			'last_name' => $send_mail->last_name,
		];

		Mail::to($request->email)->send(new OrderMail($data));

		// End Confirmation Mail

		$carts = Cart::content();

		foreach ($carts as $cart) {
			OrderItem::create([
				'order_id' => $order->id,
				'product_id' => $cart->id,
				'color' => $cart->options->color,
				'size' => $cart->options->size,
				'quantity' => $cart->qty,
				'price' => $cart->price,
				'created_at' => now(),
			]);
		}

		if (Session::has('coupon')) {
			Session::forget('coupon');
		}

		Cart::destroy();

		return redirect()->to('/');
	}
}