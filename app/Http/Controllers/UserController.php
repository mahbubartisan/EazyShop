<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function Profile()
    {
        $user_id = Auth::id();

        $user = User::findOrFail($user_id);

        return view('user.profile', compact('user'));

    }

    public function ProfileUpdate(Request $request)
    {
        $user = User::findOrFail(Auth::id());

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;


        if ($request->file('profile_photo_path')) {

            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/users/' . $user->profile_photo_path));
            $fileName = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/users'), $fileName);
            $user['profile_photo_path'] = $fileName;
        }

        $user->save();

        return redirect()->route('dashboard');

    }

    public function ChangePassword()
    {
        $user_id = Auth::id();
        $user = User::findOrFail($user_id);

        return view('user.change_password', compact('user'));
    }

    public function UpdatePassword(Request $request)
    {
        $hash_password = User::findOrFail(Auth::id())->password;

        if (Hash::check($request->old_password, $hash_password)) {

            $user = User::findOrFail(Auth::id());
            $user->password = bcrypt($request->password);
            $user->save();

            Auth::logout();

            return redirect()->route('login');

        } else {
            return back();
        }

    }

    public function Logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }


    public function UserOrder()
    {
        $orders = Order::where('user_id', Auth::id())->get();

        return view('user.order', compact('orders'));
    }

    public function OrderDetail($id)
    {
        $order = Order::with('district', 'city')->where('id', $id)->where('user_id', Auth::id())->first();

        $order_items = OrderItem::with('product')->where('order_id', $id)->get();

        return view('user.order_detail', compact('order', 'order_items'));
    }

    public function InvoiceDownload($id)
    {
        $order = Order::with('district', 'city')->where('id', $id)->where('user_id', Auth::id())->first();

        $order_items = OrderItem::with('product')->where('order_id', $id)->get();

        $pdf = Pdf::loadView('user.invoice', compact('order', 'order_items'))
            ->setOptions([
                'tempDir' => public_path(),
                'chroot' => public_path()
            ]);
        return $pdf->download('invoice.pdf');

    }

    public function ReturnProduct(Request $request, $id)
    {
        Order::findOrFail($id)->update([
            'return_reason' => $request->return_reason,
            'return_date' => now()->format('d F Y')

        ]);

        return back();
    }


}