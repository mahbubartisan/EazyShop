<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBrandRequest;
use App\Models\Brand;
use App\Models\Type;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class BrandController extends Controller {

    public function ShowBrand() {

        $data['brands'] = Brand::withCount('product')->get();

        return view('admin.brand.show', $data);
    }

    public function CreateBrand() {

        $data['types'] = Type::latest()->get();

        return view('admin.brand.create', $data);
    }

    public function StoreBrand(StoreBrandRequest $request) {

        try {

            if ($request->has('brand_image')) {

                $brand_image = $request->file('brand_image');

                if ($brand_image) {

                    $brand_image_name = hexdec(uniqid()) . '.' . $brand_image->getClientOriginalExtension();

                    Image::make($brand_image)->resize(300, 300)->save('upload/brands/' . $brand_image_name);

                    $image_path = 'upload/brands/' . $brand_image_name;

                    Brand::create([
                        'brand_name_eng' => $request->brand_name_eng ?? null,
                        'brand_name_hindi' => $request->brand_name_hindi ?? null,
                        'type_id' => $request->type_id,
                        'brand_image' => $image_path,
                        'brand_slug_eng' => Str::slug($request->brand_name_eng) ?? null,
                        'brand_slug_hindi' => Str::slug($request->brand_name_hindi) ?? null,
                        'created_at' => now(),

                    ]);

                    return redirect()->route('show.brand');
                }
            }

            Brand::create([
                'brand_name_eng' => $request->brand_name_eng ?? null,
                'brand_name_hindi' => $request->brand_name_hindi ?? null,
                'type_id' => $request->type_id,
                'brand_slug_eng' => Str::slug($request->brand_name_eng) ?? null,
                'brand_slug_hindi' => Str::slug($request->brand_name_hindi) ?? null,
                'created_at' => now(),

            ]);

            return redirect()->route('show.brand');

        } catch (\Exception$e) {

            return $e->getMessage();
        }

        return abort(500);
    }

    public function EditBrand($id) {

        $data['brands'] = Brand::findOrFail($id);
        $data['types'] = Type::all();

        return view('admin.brand.edit', $data);
    }

    public function UpdateBrand(StoreBrandRequest $request, $id) {

        try {

            $old_image = $request->old_image;

            if ($request->has('brand_image')) {

                $brand_image = $request->file('brand_image');

                if ($brand_image) {

                    $brand_image_name = hexdec(uniqid()) . '.' . $brand_image->getClientOriginalExtension();

                    Image::make($brand_image)->resize(300, 300)->save('upload/brands/' . $brand_image_name);

                    $image_path = 'upload/brands/' . $brand_image_name;

                    unlink($old_image);

                    Brand::findOrFail($id)->update([
                        'brand_name_eng' => $request->brand_name_eng ?? null,
                        'brand_name_hindi' => $request->brand_name_hindi ?? null,
                        'brand_image' => $image_path,
                        'brand_slug_eng' => strtolower(str_replace(' ', '-', $request->brand_name_eng)) ?? null,
                        'brand_slug_hindi' => strtolower(str_replace(' ', '-', $request->brand_name_hindi)) ?? null,
                        'updated_at' => now(),
                    ]);
                }
            }

            Brand::findOrFail($id)->update([
                'brand_name_eng' => $request->brand_name_eng ?? null,
                'brand_name_hindi' => $request->brand_name_hindi ?? null,
                'brand_slug_eng' => Str::slug($request->brand_name_eng) ?? null,
                'brand_slug_hindi' => Str::slug($request->brand_name_hindi) ?? null,
                'updated_at' => now(),
            ]);

            return redirect()->route('show.brand');

        } catch (\Exception$e) {

            return $e->getMessage();
        }

        return abort(500);
    }

    public function DeleteBrand($id) {

        try {

            Brand::findOrFail($id)->delete();

            return redirect()->route('show.brand');

        } catch (\Exception$e) {

            return $e->getMessage();
        }

        return abort(500);
    }
}