<?php

namespace App\Http\Controllers\Backend;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class SettingController extends Controller
{
    public function ShowSettings()
    {

        $data['setting'] = Setting::first();

        return view('admin.settings.index', $data);
    }

    public function UpdateSettings(Request $request)
    {
        $id = $request->id;

        $old_image = $request->old_image;

        $image = $request->file('image');

        if ($image) {
            $image_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

            Image::make($image)->resize(300, 300)->save('upload/site/' . $image_name);

            $image_path = 'upload/site/' . $image_name;

            unlink($old_image);

            Setting::findOrFail($id)->update([
                'image' => $image_path,
                'address' => $request->address,
                'phone' => $request->phone,
                'email' => $request->email,
                'facebook' => $request->facebook,
                'instagram' => $request->instagram,
                'twitter' => $request->twitter,
            ]);

            return back();

        } else {

            Setting::findOrFail($id)->update([
                'address' => $request->address,
                'phone' => $request->phone,
                'email' => $request->email,
                'facebook' => $request->facebook,
                'instagram' => $request->instagram,
                'twitter' => $request->twitter,
            ]);

            return back();

        }

    }
}