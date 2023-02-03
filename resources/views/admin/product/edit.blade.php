@extends('admin.layouts.app')

@section('content')

<div class="main-content">
    <div class="breadcrumb">
        <h1>Add a new product</h1>
    </div>
    <div class="separator-breadcrumb border-top"></div>
    <!-- content goes here-->
    <section class="widget-card">

        <form action="{{ route('update.product', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="old_image" value="{{ $product->thumb_image }}">
            <div class="row">

                <div class="col-lg-4 col-xl-4 mt-3">

                    <h5 class="ul-widget-card__title"><span class="t-font-boldest">Featured Image</span></h5>
                    <p class="card-text"><span class="t-font-bold">Upload a product thumnail of the product from
                            here.</span></p>

                </div>

                <div class="col-lg-8 col-xl-8 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Main Thumbnail</label>
                                <input type="file" class="form-control" name="thumbnail_image" onchange="preview()">
                            </div>
                            <div class="form-group">
                                <img id="showImage" src="{{ asset ($product->thumb_image) }}" alt="image"
                                    style="width:70px; height:90px">
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Multiple Image Upload Card  --}}

                <div class="col-lg-4 col-xl-4 mt-3">

                    <h5 class="ul-widget-card__title"><span class="t-font-boldest">Gallery</span></h5>
                    <p class="card-text ">Upload multiple product images from here.</p>

                </div>

                <div class="col-lg-8 col-xl-8 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Multiple Image</label>
                                <input type="file" class="form-control" id="file" name="multi_image[]" multiple>
                            </div>
                            <div class="form-group">

                                @if ($product->multiImages)

                                <div class="row">
                                    @foreach ($product->multiImages as $image)
                                    <div class="col-md-2">
                                        <img src="{{ asset ($image->image) }}" class="mb-2 ml-1"
                                            style="width:70px; height:90px">
                                        <a href="{{ url('products/image/'.$image->id.'/delete/') }}"
                                            class="d-block ml-3">Remove</a>
                                        {{-- <button type="submit" id="{{ $image->id }}" onclick="removeImages(this.id)"
                                        class="btn btn-danger d-block mr-3">Remove</button> --}}
                                    </div>
                                    @endforeach
                                </div>
                                @else
                                <h5>No images found</h5>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>

                {{-- Category Card --}}

                <div class="col-lg-4 col-xl-4 mt-3">
                    <h5 class="ul-widget-card__title"><span class="t-font-boldest">Type & Categories</span></h5>
                    <p class="card-text"> Select your product type & categories from here.</p>

                </div>

                <div class="col-lg-8 col-xl-8 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="picker1">Types</label>
                                <select class="form-control" name="type_id">
                                    <option selected disabled>Select type</option>
                                    @foreach($types as $type)
                                    <option value="{{ $type->id }}" @if($product->type_id == $type->id) ? selected
                                        @endif>
                                        {{ $type->type_eng }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="picker1">Categories</label>
                                <select class="form-control" id="category_id" name="category_id">
                                    <option>Select category</option>
                                    @foreach ($types as $type)
                                    <optgroup label="{{ $type->type_eng }}"></optgroup>
                                    @foreach ($type['categories'] as $category)
                                    <option value="{{ $category['id'] }}" @if($product->category_id == $category->id) ?
                                        selected @endif>
                                        &nbsp;&nbsp;&nbsp; -- &nbsp;{{ $category->category_name_eng }}</option>
                                    @foreach ($category['subCategories'] as $sub_category)
                                    <option value="{{ $sub_category['id'] }}" @if($product->category_id ==
                                        $sub_category->id) ?
                                        selected @endif>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -- &nbsp;{{
                                        $sub_category->category_name_eng }}</option>
                                    @endforeach
                                    @endforeach

                                    @endforeach
                                </select>
                            </div>

                            <div class="category_filter">
                                @include('admin.filter.category_filter')
                            </div>
                            <div class="form-group">
                                <label for="picker1">Brands</label>
                                <select class="form-control" name="brand_id">
                                    @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}" @if($product->brand_id == $brand->id) ?
                                        selected @endif>{{ $brand->brand_name_eng }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="picker1">Tags</label>
                                <select class="tags form-control" name="tag_id[]" multiple="multiple">
                                    @foreach ($tags as $tag)
                                    {{-- @php
                      dd($tag->id);
                  @endphp --}}
                                    <option value="{{ $tag->id }}" @if (in_array($tag->
                                        id,$product_tags->pluck('id')->toArray())) ? selected @endif
                                        >{{ $tag->tag_eng }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product Attribute & Tags -->


                <div class="col-lg-4 col-xl-4 mt-3">
                    <h5 class="ul-widget-card__title"><span class="t-font-boldest">Attribute</span></h5>
                    <p class="card-text"> Add your product attribute from here.</p>

                </div>

                <div class="col-lg-8 col-xl-8 mt-3">
                    <div class="card">
                        <div class="card-body">
                            @foreach ($attr_values as $key => $attr_value)

                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="picker1">Attribute Name</label>
                                        {{-- <input type="text" value="{{ $key }}"> --}}
                                        <select class="attr form-control" name="attr_id[]">
                                            <option selected disabled>Select attribute</option>

                                            @foreach ($attributes as $attribute)

                                            <option value="{{ $attribute->id }}" @if ($key==$attribute->id )
                                                ? selected @endif >
                                                {{ $attribute->attr_name_eng}}
                                            </option>

                                            @endforeach
                                        </select>

                                    </div>

                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="picker1">Attribute Value</label>
                                        <select class="attr_value form-control" name="attr_value_id[]"
                                            multiple="multiple">

                                            @foreach ($attr_value as $attr_value_name)

                                            <option value="{{ $attr_value_name->id }}" @if (in_array($attr_value_name->
                                                id, $attr_selected_values->pluck('id')->toArray())) ? selected @endif>
                                                {{ $attr_value_name->attr_value_eng }}
                                            </option>

                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                            </div>

                            @endforeach
                            <div class="new-form"></div>

                            <div class="form-group">
                                <a href="javascript:void(0)" class="add-more-form btn btn-success">Add More</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product Description Card -->


                <div class="col-lg-4 col-xl-4 mt-3">
                    <h5 class="ul-widget-card__title"><span class="t-font-boldest">Description</span></h5>
                    <p class="card-text">Write your product description from here.</p>

                </div>

                <div class="col-lg-8 col-xl-8 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label class="form-label">Product Name <sub>(English)</sub></label>
                                <input class="form-control" type="text" name="product_name_eng"
                                    value="{{ $product->product_name_eng }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Product Name <sub>(Hindi)</sub></label>
                                <input class="form-control" type="text" name="product_name_hindi"
                                    value="{{ $product->product_name_hindi }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="inputEmail3">Product Code</label>
                                <input class="form-control" type="text" name="product_code"
                                    value="{{ $product->product_code }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="inputEmail3">Product Quantity</label>
                                <input class="form-control" type="text" name="product_qty"
                                    value="{{ $product->product_qty }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Short Description <sub>(English)</sub></label>
                                <textarea class="form-control" type="text"
                                    name="short_dsc_eng">{{ $product->short_dsc_eng }}</textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Short Description <sub>(Hindi)</sub></label>
                                <textarea class="form-control" type="text"
                                    name="short_dsc_hindi">{{ $product->short_dsc_hindi }}</textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Long Description <sub>(English)</sub></label>

                                <textarea id="editor" class="form-control"
                                    name="long_dsc_eng">{{ $product->long_dsc_eng }}</textarea>

                            </div>

                            <div class="form-group">
                                <label class="form-label">Long Description <sub>(Hindi)</sub></label>
                                <textarea id="editor-2" class="form-control"
                                    name="long_dsc_hindi">{{ $product->long_dsc_hindi }}</textarea>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product Price Card -->

                <div class="col-lg-4 col-xl-4 mt-3">
                    <h5 class="ul-widget-card__title"><span class="t-font-boldest">Price</span></h5>
                    <p class="card-text">Write your product price & others promotional offers from here.</p>

                </div>

                <div class="col-lg-8 col-xl-8 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Selling Price</label>
                                        <input class="form-control" type="text" name="selling_price"
                                            value="{{ $product->selling_price }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Discount Price</label>
                                        <input class="form-control" type="text" name="discount_price"
                                            value="{{ $product->discount_price }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="checkbox checkbox-danger">
                                            <input type="checkbox" name="hot_deal" value="1" {{ ($product->hot_deal ==
                                            1) ? 'checked' : '' }}>
                                            <span>Hot Deal</span><span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="checkbox checkbox-success">
                                            <input type="checkbox" name="featured" value="1" {{ ($product->featured ==
                                            1) ? 'checked' : '' }}>
                                            <span>Featured</span><span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="checkbox checkbox-primary">
                                            <input type="checkbox" name="special_deal" value="1" {{
                                                ($product->special_deal == 1) ? 'checked' : '' }}>
                                            <span>Special Deal</span><span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="checkbox checkbox-warning">
                                            <input type="checkbox" name="special_offer" value="1" {{
                                                ($product->special_offer == 1) ? 'checked' : '' }}>
                                            <span>Special Offer</span><span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product Status Card -->

                <div class="col-lg-4 col-xl-4 mt-3">

                </div>

                <div class="col-lg-8 col-xl-8 mt-3">
                    <div class="card">
                        <div class="card-body">

                            <div class="form-group">
                                <label class="radio radio-success">
                                    <input type="radio" id="publish" value="1" name="status" {{ ($product->status == 1)
                                    ? 'checked' : '' }}><span>Publish</span><span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="form-group">
                                <label class="radio radio-success">
                                    <input type="radio" id="draft" value="0" name="status" {{ ($product->status == 0) ?
                                    'checked' : '' }}><span>Draft</span><span class="checkmark"></span>
                                </label>
                            </div>

                        </div>
                    </div>
                </div>


            </div> <!-- end of row -->


            <!-- Button Card -->

            <div class="col-lg-12 col-xl-12 mt-3 mb-5">

                <div>
                    <button type="submit" style="float:right" class="btn btn-md btn-primary" name="submit">Add
                        Product</button>

                    <a href="{{ route('show.product') }}" style="float:right; margin-right:10px;"
                        class="btn btn-md btn-success">Back</a>
                </div>

            </div>

        </form>

    </section><!-- end of main-content -->
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"> </script>

<script>
    $(document).ready(function () {

            $(document).on('click', '.remove-btn', function () {
                $(this).closest('.row').remove();
            });
    });

// var row = 0;
    $(document).ready(function () {
        
        var nextRowID = 0;
        $(document).on('click', '.add-more-form', function () {
        var id = ++nextRowID;
           $('.new-form').append('<div class="row">\
                    <div class="col-md-5">\
                        <div class="form-group">\
                            <label for="picker1">Attribute</label>\
                            <select class="attr_id form-control" onchange="getval(this);" id="attr_id_'+ id +'" name="attr_id">\
                                <option selected disabled>Select attribute</option>\
                                @foreach ($attributes as $attribute)\
                                <option value="{{ $attribute->id }}">\
                                    {{ $attribute->attr_name_eng}}</option>\
                                @endforeach\
                            </select>\
                        </div>\
                    </div>\
                    <div class="col-md-5">\
                        <div class="form-group">\
                            <label for="picker1">Value</label>\
                            <select class="attr_value attr_value_id form-control" name="attr_value_id[]" multiple="multiple">\
                            </select>\
                        </div>\
                    </div>\
                    <div class="col-md-2">\
                        <div class="form-group">\
                            <br>\
                        <button type="button" class="remove-btn btn btn-danger">Remove</button>\
                        </div>\
                    </div>\
                </div>');
        });
    });

   
    function getval(that){

       let attr_id = that.value;
        // console.log($(that).closest('.attr_value_id'))
       let attr_value = $(that).closest(".row").find(".attr_value_id");
       
        // console.log(attr_value);
        $.ajaxSetup({
         headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
         });

 if(attr_id) {
     $.ajax({
         url: "{{  url('/products/attributes/ajax') }}/"+attr_id,
         type:"GET",
         dataType:"json",
         success:function(data) {
            var d = attr_value.empty();
               $.each(data, function(key, value){
                   attr_value.append('<option value="'+ value.id +'">' + value.attr_value_eng+ '</option>');
               });
         },
     });
 } else {
     alert('danger');
 }
    }



    $(document).ready(function () {

        $('.add-more-form').click(function(){
		setTimeout(function(){

			$('.attr_value').select2({
			    // placeholder: "Select a state",
			    // allowClear: true
			});
		});
	});

        $('.tags').select2();
        $('.attr_value').select2();

    });



// Attributes Ajax Function Start
$(document).ready(function() {
    
    $('select[name="attr_id"]').on('change', function(){
         var attr_id = $(this).val();

         $.ajaxSetup({
         headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
         });

 if(attr_id) {
     $.ajax({
         url: "{{  url('/products/attributes/ajax') }}/"+attr_id,
         type:"GET",
         dataType:"json",
         success:function(data) {
            var d =$('select[name="attr_value_id[]"]').empty();
               $.each(data, function(key, value){
                   $('select[name="attr_value_id[]"]').append('<option value="'+ value.id +'">' + value.attr_value_eng+ '</option>');
               });
         },
     });
 } else {
     alert('danger');
 }
});
});


// Categories fetch by group ajax function start

     $(document).ready(function() {
            
        $('select[name="type_id"]').on('change', function(){
                var type_id = $(this).val();

                $.ajaxSetup({
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

        if(type_id) {
            $.ajax({
                url: "{{  url('/products/categories/ajax') }}/"+type_id,
                type:"GET",
                dataType:"json",
                success:function(data) {
                    var d =$('select[name="category_id"]').empty();
                    $.each(data, function(key, value){
                        $('select[name="category_id"]').append('<option value="'+ value.id +'">' + value.category_name_eng+ '</option>');
                    });
                },
            });
        } else {
            alert('danger');
        }
     });
});

// Categories fetch by group ajax function end

// Brands fetch by group ajax function start

$(document).ready(function() {
            
            $('select[name="type_id"]').on('change', function(){
                    var type_id = $(this).val();
    
                    $.ajaxSetup({
                    headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
    
            if(type_id) {
                $.ajax({
                    url: "{{  url('/products/brands/ajax') }}/"+type_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                        var d =$('select[name="brand_id"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="brand_id"]').append('<option value="'+ value.id +'">' + value.brand_name_eng+ '</option>');
                        });
                    },
                });
            } else {
                alert('danger');
            }
         });
    });
// Brands fetch by group ajax function end

// Tags fetch by group ajax function start
$(document).ready(function() {
            
            $('select[name="type_id"]').on('change', function(){
                    var type_id = $(this).val();
    
                    $.ajaxSetup({
                    headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
    
            if(type_id) {
                $.ajax({
                    url: "{{  url('/products/tags/ajax') }}/"+type_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                        var d =$('select[name="tag_id[]"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="tag_id[]"]').append('<option value="'+ value.id +'">' + value.tag_eng+ '</option>');
                        });
                    },
                });
            } else {
                alert('danger');
            }
         });
    });
// Tags fetch by group ajax function end

</script>


<script type="text/javascript">
    // $(document).ready(function (e) {
//     e.preventDefault();

//     function removeImages(id) {

//     $.ajax({
//             type: "GET",
//             url: "/products/image/delete/"+id,
//             dataType: "json",
//             success: function (response) {
                
//                 //SweetAlter Message Start
//             const Toast = Swal.mixin({
//                                 toast:true,
//                                 position: 'top-end',
//                                 showConfirmButton: false,
//                                 timer: 3000
//                                 })
//                             if ($.isEmptyObject(response.error)) {

//                                 Toast.fire({
//                                     type:'success',
//                                     icon: 'success',
//                                     title:response.success
//                                 })
                                

//                             } else {
                                
//                                 Toast.fire({
//                                     type:'error',
//                                     icon: 'error',
//                                     title:response.error
//                                 })
//                             }
//                 //SweetAlter Message End
//             }
            
//         });

//         // return false;

       
//     }
// });
</script>
@endsection