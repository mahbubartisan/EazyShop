<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AttributeValue;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Filter;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Slider;
use App\Models\Tag;
use App\Models\Type;
use Illuminate\Http\Request;

class HomeController extends Controller {
    public function Homepage() {
        // return
        // Product::with('tags')->get();

        $data['types'] = Type::latest()->get();
        $data['sliders'] = Slider::where('status', 1)->limit(3)->get();
        // return
        $data['products'] = Product::where('status', 1)->limit(6)->get();
        $data['featured_products'] = Product::where('featured', 1)->limit(6)->get();
        $data['hot_deal_products'] = Product::where('hot_deal', 1)->where('discount_price', '!=', NULL)
            ->limit(3)->get();
        $data['special_offer_products'] = Product::where('special_offer', 1)->limit(6)->get();
        $data['special_deal_products'] = Product::where('special_deal', 1)->limit(6)->get();
        // return
        $data['brand_products'] = Brand::skip(0)->first();

        if (isset($data['brand_products']) && !empty($data['brand_products'])) {

            $data['brand_wise_products'] = Product::where('brand_id', $data['brand_products']->id)->limit(6)->get();
        }


        $data['categories'] = Category::whereNotNull('parent_id')->get();

        // Top Selling Products

        // return
        $data['topSellingProducts'] = OrderItem::with('product')->select('product_id', 'quantity')
            ->selectRaw('product_id, SUM(quantity) as total')
            ->groupBy('product_id')
            ->orderBy('total', 'DESC')
            ->take(8)
            ->get();

        return view('frontend.index', $data);
    }

    public function ProductDetail($id) {
        // // return
        // $data['attributes'] = Attribute::with('attributeValue')->get();
        // // return
        // $data['attr_values'] = AttributeValue::with('attributes')->get();
        // return
        $product = Product::with('multiImages', 'attributevalue')->findOrFail($id);
        // return
        $data['product_attributes'] = $product->attributevalue()->get()->groupBy('attribute_id');
        $data['related_products'] = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $id)->get();
        $data['hot_deal_products'] = Product::where('hot_deal', 1)->where('discount_price', '!=', NULL)
            ->where('category_id', $product->category_id)->get();
        // $data['multi_images'] = MultiImage::where('product_id', $id)->get();
        $data['category'] = Category::where('id', $product->category_id)->get();

        return view('frontend.product.product_detail', $data, compact('product'));
    }

    public function TagWiseProduct($tag_id) {

        $tag = Tag::where('id', $tag_id)->first();

        $data['products'] = Product::where('status', 1)
            ->whereHas('tags', function ($query) use ($tag) {
                $query->whereIn('tag_id', $tag);
            })->get();

        return view('frontend.product.tag_wise_product', $data);
    }

    public function CategoryWiseProduct($type_slug, $cat_slug) {

        $category = Category::with('parents')->where('category_slug_eng', $cat_slug)->first();

        $data['cat_wise_products'] = Product::where('status', 1)->where('category_id', $category->id)->get();

        return view('frontend.product.category_wise_product', $data, compact('category'));

    }

    public function ChildCategoryWiseProduct($type_slug, $parent_slug, $child_slug, Request $request) {

        if ($request->ajax()) {

            $data = $request->all();

            $url = $data['url'];

            // echo"<pre>"; print_r($data); die;

            $category = Category::where('category_slug_eng', $child_slug)->first();

            $products = Product::where('status', 1)->where('category_id', $category->id)->paginate(20);

            if (isset($data['sort']) && !empty($data['sort'])) {

                if ($data['sort'] == 'newest') {
                    $products = Product::where('status', 1)
                        ->where('category_id', $category->id)
                        ->orderBy('created_at', 'DESC')
                        ->get();
                } elseif ($data['sort'] == 'price_lowest') {
                    $products = Product::where('status', 1)
                        ->where('category_id', $category->id)
                        ->orderBy('discount_price', 'ASC')
                        ->get();
                } elseif ($data['sort'] == 'price_highest') {
                    $products = Product::where('status', 1)
                        ->where('category_id', $category->id)
                        ->orderBy('discount_price', 'DESC')
                        ->get();
                } elseif ($data['sort'] == 'a_to_z') {
                    $products = Product::where('status', 1)
                        ->where('category_id', $category->id)
                        ->orderBy('product_name_eng', 'ASC')
                        ->get();
                } elseif ($data['sort'] == 'z_to_a') {
                    $products = Product::where('status', 1)
                        ->where('category_id', $category->id)
                        ->orderBy('product_name_eng', 'DESC')
                        ->get();
                }

            }

            if (isset($data['brand']) && !empty($data['brand'])) {

                $products = Product::where('status', 1)->where('category_id', $category->id)->whereIn('brand_id', $data['brand'])->get();

            }

            if (isset($data['price']) && !empty($data['price'])) {

                //  echo"<pre>"; print_r($data['price']); die;
                foreach ($data['price'] as $key => $price) {

                    $priceArr = explode('-', $price);

                    $productID[] = Product::select('id')->whereBetween('discount_price', [$priceArr[0], $priceArr[1]])
                        ->pluck('id')->toArray();
                }

                $productID = call_user_func_array('array_merge', $productID);

                $products = $products->whereIn('id', $productID);

            }

            if (isset($data['attr_value']) && !empty($data['attr_value'])) {

                $products = Product::where('category_id', $category->id)
                    ->where('status', 1)
                    ->whereHas('attributevalue', function ($query) use ($data) {
                        $query->whereIn('attr_value_id', $data['attr_value']);
                    })->get();

                // echo"<pre>"; print_r($products);die;

            }

            $filters = Filter::with('filterValue')->where('status', 1)->get();

            foreach ($filters as $key => $filter) {

                if (
                    isset($filter['filter_column']) && isset($data[$filter['filter_column']])
                    && !empty($filter['filter_column']) && !empty($data[$filter['filter_column']])
                ) {

                    // echo "<pre>"; print_r($data[$filter['filter_column']]);die();

                    $products = Product::where('category_id', $category->id)
                        ->where('status', 1)
                        ->whereIn($filter['filter_column'], $data[$filter['filter_column']])->get();

                }

            }

            return view('frontend.product.ajax_product_filter', compact('products', 'category', 'url'));

        } else {
            $url = $child_slug;
        }

        $category = Category::with('parents')->where('category_slug_eng', $child_slug)->first();

        $products = Product::where('status', 1)->where('category_id', $category->id)->paginate(20);

        $productID = Product::select('id')->where('category_id', $category->id)
            ->pluck('id')->toArray();

        $brandID = Product::select('brand_id')->whereIn('id', $productID)->get()->toArray();

        $brands = Brand::select('id', 'brand_name_eng')->whereIn('id', $brandID)->get()->toArray();

        $product_attributes = AttributeValue::with('attributes')->get()->groupBy('attribute_id');
        //    return

        //  $product_attributes = Product::where(['status' => 1, 'category_id' => $category->id])
        // ->with('attributevalue')->get();

        // $product_attributes = Product::where(['status' => 1, 'category_id' => $category->id])->with('attributevalue')->get();

        $filters = Filter::with('filterValue')->where('status', 1)->get();

        return view('frontend.product.child_category_wise_product', compact('products', 'category', 'url', 'brands', 'product_attributes', 'filters'));

    }

    public function SearchProduct(Request $request) {

        $request->validate(['search' => 'required']);
        $SearchProduct = $request->search;

        $products = Product::where('product_name_eng', 'LIKE', "%$SearchProduct%")->get();

        return view('frontend.product.search', compact('products', 'SearchProduct'));

    }

    public function AjaxProductSearch(Request $request) {

        $request->validate(['search' => 'required']);
        $SearchProduct = $request->search;
        $products = Product::where('product_name_eng', 'LIKE', "%$SearchProduct%")
        // ->orWhere('selling_price', 'LIKE', "%$SearchProduct%")
            ->select('product_name_eng', 'thumb_image', 'selling_price', 'id')
            ->limit(5)
            ->get();

        return view('frontend.product.product_search', compact('products'));

    }

}