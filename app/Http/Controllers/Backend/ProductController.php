<?php

namespace App\Http\Controllers\Backend;

use App\Models\Tag;
use App\Models\Type;
use App\Models\Brand;
use App\Models\Filter;
use App\Models\Product;
use App\Models\Category;
use App\Models\Attribute;
use App\Models\MultiImage;
use Illuminate\Http\Request;
use App\Models\AttributeValue;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    public function ShowProduct()
    {

        $data['products'] = Product::with('attributevalue', 'tags')->get();
        //  $data['products'] = Product::with('multiImages')->get();

        return view('admin.product.show', $data);
    }

    public function CreateProduct()
    {

        $data['brands'] = Brand::all();

        // return
        $data['categories'] = Type::with('categories')->get()->toArray();
        $data['types'] = Type::all();
        $data['attributes'] = Attribute::all();

        return view('admin.product.create', $data);
    }

    public function StoreProduct(Request $request)
    {


        $thumbnail_image = $request->file('thumbnail_image');

        $thumbnail_image_name = hexdec(uniqid()) . '.' . $thumbnail_image->getClientOriginalExtension();

        Image::make($thumbnail_image)->resize(917, 1000)->save('upload/products/thumbnail/' . $thumbnail_image_name);

        $thumbnail_image_path = 'upload/products/thumbnail/' . $thumbnail_image_name;

        $product = Product::create([
            'thumb_image' => $thumbnail_image_path,
            'product_name_eng' => $request->product_name_eng,
            'product_name_hindi' => $request->product_name_hindi,
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'short_dsc_eng' => $request->short_dsc_eng,
            'short_dsc_hindi' => $request->short_dsc_hindi,
            'long_dsc_eng' => $request->long_dsc_eng,
            'long_dsc_hindi' => $request->long_dsc_hindi,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'hot_deal' => $request->hot_deal,
            'featured' => $request->featured,
            'special_deal' => $request->special_deal,
            'special_offer' => $request->special_offer,
            'status' => $request->status,
            'type_id' => $request->type_id,
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'created_at' => now()

        ]);

        $filters = Filter::with('filterValue')->where('status', 1)->get();


        foreach ($filters as $filter) {

            $filterAvailable = Filter::filterAvailable($filter->id, $request->category_id);

            if ($filterAvailable == 'Yes') {

                if (isset($filter['filter_column']) && $request[$filter['filter_column']]) {

                    $product->{$filter['filter_column']} = $request[$filter['filter_column']];

                    // $request[$filter['filter_column']]

                }
            }
        }


        $product->attributevalue()->attach($request->attr_value_id);

        $product->tags()->attach($request->tag_id);


        // Multiple Image Upload

        $multi_images = $request->file('multi_image');

        foreach ((array) $multi_images as $multi_image) {


            $multi_image_name = hexdec(uniqid()) . '.' . $multi_image->getClientOriginalExtension();

            Image::make($multi_image)->resize(917, 1000)->save('upload/products/gallery/' . $multi_image_name);

            $multi_image_path = 'upload/products/gallery/' . $multi_image_name;

            MultiImage::create([
                'product_id' => $product->id,
                'image' => $multi_image_path,
                'created_at' => now()

            ]);

        }

        $product->save();

        return redirect()->route('show.product');

    }

    public function ShowTags($type_id)
    {

        $tags = Tag::where('type_id', $type_id)
            ->orderBy('tag_eng', 'ASC')
            ->get();

        return json_encode($tags);
    }

    public function ShowAttributes($attr_id)
    {

        $attributes = AttributeValue::where('attribute_id', $attr_id)
            ->orderBy('attr_value_eng', 'ASC')
            ->get();

        return json_encode($attributes);
    }


    public function FetchBrand($type_id)
    {

        $brands = Brand::where('type_id', $type_id)->get();

        return json_encode($brands);
    }

    public function FetchTag($type_id)
    {

        $tags = Tag::where('type_id', $type_id)->get();

        return json_encode($tags);
    }

    public function CategoryFilter(Request $request)
    {

        $category_id = $request->category_id;

        return view('admin.filter.category_filter', compact('category_id'));

    }

    public function EditProduct($id)
    {

        $product = Product::with('multiImages')->findOrFail($id);
        $data['types'] = Type::all();
        $data['categories'] = Category::all();
        $data['brands'] = Brand::all();
        $data['attributes'] = Attribute::with('attributeValue')->get();
        $data['tags'] = Tag::where('type_id', $data['types']->pluck('id'))->get();
        $data['product_tags'] = $product->tags;
        // return
        $data['attr_values'] = AttributeValue::with('attributes')->whereIn('attribute_id', $data['attributes']->pluck('id'))->get()->groupBy('attribute_id');

        //$data['attr_values'] = AttributeValue::with('attributes')->pluck('attribute_id');
        // return
        $data['attr_selected_values'] = $product->attributevalue;

        return view('admin.product.edit', $data, compact('product'));
    }

    public function UpdateProduct(Request $request, $id)
    {

        $old_image = $request->old_image;

        $thumbnail_image = $request->file('thumbnail_image');

        if ($thumbnail_image) {

            $thumbnail_image_name = hexdec(uniqid()) . '.' . $thumbnail_image->getClientOriginalExtension();

            Image::make($thumbnail_image)->resize(917, 1000)->save('upload/products/thumbnail/' . $thumbnail_image_name);

            $thumbnail_image_path = 'upload/products/thumbnail/' . $thumbnail_image_name;

            unlink($old_image);

            $product = Product::findOrFail($id);

            $product->update([
                'thumb_image' => $thumbnail_image_path,
                'product_name_eng' => $request->product_name_eng,
                'product_name_hindi' => $request->product_name_hindi,
                'product_code' => $request->product_code,
                'product_qty' => $request->product_qty,
                'short_dsc_eng' => $request->short_dsc_eng,
                'short_dsc_hindi' => $request->short_dsc_hindi,
                'long_dsc_eng' => $request->long_dsc_eng,
                'long_dsc_hindi' => $request->long_dsc_hindi,
                'selling_price' => $request->selling_price,
                'discount_price' => $request->discount_price,
                'hot_deal' => $request->hot_deal,
                'featured' => $request->featured,
                'special_deal' => $request->special_deal,
                'special_offer' => $request->special_offer,
                'status' => $request->status,
                'category_id' => $request->category_id,
                'brand_id' => $request->brand_id,
                'updated_at' => now()

            ]);
        }

        $product = Product::findOrFail($id);

        $product->update([
            'product_name_eng' => $request->product_name_eng,
            'product_name_hindi' => $request->product_name_hindi,
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'short_dsc_eng' => $request->short_dsc_eng,
            'short_dsc_hindi' => $request->short_dsc_hindi,
            'long_dsc_eng' => $request->long_dsc_eng,
            'long_dsc_hindi' => $request->long_dsc_hindi,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'hot_deal' => $request->hot_deal,
            'featured' => $request->featured,
            'special_deal' => $request->special_deal,
            'special_offer' => $request->special_offer,
            'status' => $request->status,
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'updated_at' => now()

        ]);

        $product->attributevalue()->sync($request->attr_value_id);

        $product->tags()->sync($request->tag_id);


        // Multiple Image Upload

        // $old_images = $product->multiImages()->get();

        $multi_images = $request->file('multi_image');

        // foreach($old_images as $old_image){

        //     unlink($old_image->image);
        // }

        // $product->multiImages()->delete();

        foreach ((array) $multi_images as $multi_image) {

            $multi_image_name = hexdec(uniqid()) . '.' . $multi_image->getClientOriginalExtension();

            Image::make($multi_image)->resize(917, 1000)->save('upload/products/gallery/' . $multi_image_name);

            $multi_image_path = 'upload/products/gallery/' . $multi_image_name;


            $product->multiImages()->create([
                // 'product_id' => $product->id,
                'image' => $multi_image_path,
                'updated_at' => now()

            ]);

        }

        return redirect()->route('show.product');

    }

    public function DeleteProductImages($id)
    {

        $ProductImages = MultiImage::findOrFail($id);

        if (File::exists($ProductImages->image)) {

            File::delete($ProductImages->image);
        }

        $ProductImages->delete();

        return back();
    }

    public function DeleteProduct($id)
    {

        $image = Product::findOrFail($id);

        unlink($image->thumb_image);

        $old_images = MultiImage::where('product_id', $id)->get();

        foreach ($old_images as $old_image) {
            unlink($old_image->image);
        }

        Product::findOrFail($id)->delete();

        return back();

    }

}