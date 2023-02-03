<?php

namespace App\Http\Controllers\Backend;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSliderRequest;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    public function ShowSlider()
    {

        $data['sliders'] = Slider::latest()->get();

        return view('admin.slider.show', $data);
    }

    public function CreateSlider()
    {

        return view('admin.slider.create');
    }

    public function StoreSlider(StoreSliderRequest $request)
    {

        $image = $request->file('image');

        if ($image) {

            $image_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

            Image::make($image)->resize(870, 370)->save('upload/sliders/' . $image_name);

            $image_path = 'upload/sliders/' . $image_name;

            // Slider::create($request->only('image', $image_path,'title', 'description', 'status', 'created_at'));

            Slider::create([
                'image' => $image_path,
                'title' => $request->title,
                'description' => $request->description,
                'status' => $request->status,
                'created_at' => now()
            ]);


            return redirect()->route('show.slider');
        }
    }

    public function EditSlider($id)
    {

        $data['slider'] = Slider::find($id);

        return view('admin.slider.edit', $data);
    }

    public function UpdateSlider(Request $request, $id)
    {

        $image = $request->file('image');

        if ($image) {

            $image_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

            Image::make($image)->resize(870, 370)->save('upload/sliders/' . $image_name);

            $image_path = 'upload/sliders/' . $image_name;


            Slider::find($id)->update([
                'image' => $image_path,
                'title' => $request->title,
                'description' => $request->description,
                'status' => $request->status,
                'updated_at' => now()
            ]);

            return redirect()->route('show.slider');
        }

        Slider::find($id)->update(
            $request->only(
                'title',
                'description',
                'status',
                'updated_at'
            )
        );


        return redirect()->route('show.slider');
    }

    public function DeleteSlider($id)
    {

        $image = Slider::find($id);

        unlink($image->image);

        Slider::find($id)->delete();

        return back();
    }
}