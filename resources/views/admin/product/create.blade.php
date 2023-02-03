@extends('admin.layouts.app')

@section('content')

<div class="main-content">
    <div class="breadcrumb">
        <h1>Add a new product</h1>
    </div>
    <div class="separator-breadcrumb border-top"></div>
    <!-- content goes here-->
    <section class="widget-card">

        <form action="{{ route('store.product') }}" method="POST" enctype="multipart/form-data">
            @csrf
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
                                <img id="showImage" src="{{ asset('ecommerce/no-image.png') }}" alt="image"
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
                                <input type="file" class="form-control" id="images" name="multi_image[]" multiple>
                            </div>
                            <div class="form-group" id="multiImages">

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
                                <select class="form-control" id="type_id" name="type_id">
                                    <option selected disabled>Select type</option>
                                    @foreach($types as $type)
                                    <option value="{{ $type->id }}">{{ $type->type_eng }}</option>
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
                                    <option value="{{ $category['id'] }}">
                                        &nbsp;&nbsp;&nbsp; -- &nbsp;{{ $category->category_name_eng }}</option>
                                    @foreach ($category['subCategories'] as $sub_category)
                                    <option value="{{ $sub_category['id'] }}">
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
                                <select class="form-control" id="brand_id" name="brand_id">
                                    <option>Select category</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="picker1">Tags</label>
                                <select class="tags form-control" id="tag_id" name="tag_id[]" multiple="multiple">
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Product Attribute & Tags --}}

                <div class="col-lg-4 col-xl-4 mt-3">
                    <h5 class="ul-widget-card__title"><span class="t-font-boldest">Attribute</span></h5>
                    <p class="card-text"> Add your product attribute from here.</p>

                </div>

                <div class="col-lg-8 col-xl-8 mt-3">
                    <div class="card">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="picker1">Attribute Name</label>
                                        <select class="attr_id form-control" id="attr_id" name="attr_id">
                                            <option selected disabled>Select attribute</option>
                                            @foreach ($attributes as $attribute)
                                            <option value="{{ $attribute->id }}">
                                                {{ $attribute->attr_name_eng}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="picker1">Attribute Value</label>
                                        <select class="attr_value form-control attr_value_id" name="attr_value_id[]"
                                            multiple="multiple">
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="new-form"></div>

                            <div class="form-group">
                                <a href="javascript:void(0)" id="add-more-form" class="btn btn-success">Add More</a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Product Description Card --}}


                <div class="col-lg-4 col-xl-4 mt-3">
                    <h5 class="ul-widget-card__title"><span class="t-font-boldest">Description</span></h5>
                    <p class="card-text">Write your product description from here.</p>

                </div>

                <div class="col-lg-8 col-xl-8 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label class="form-label">Product Name <sub>(English)</sub></label>
                                <input class="form-control" type="text" name="product_name_eng">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Product Name <sub>(Hindi)</sub></label>
                                <input class="form-control" type="text" name="product_name_hindi">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="inputEmail3">Product Code</label>
                                <input class="form-control" type="text" name="product_code">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="inputEmail3">Product Quantity</label>
                                <input class="form-control" type="text" name="product_qty">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Short Description <sub>(English)</sub></label>
                                <textarea class="form-control" type="text" name="short_dsc_eng"> </textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Short Description <sub>(Hindi)</sub></label>
                                <textarea class="form-control" type="text" name="short_dsc_hindi"> </textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Long Description <sub>(English)</sub></label>

                                <textarea id="editor" class="form-control" name="long_dsc_eng" rows="10"
                                    cols="30"></textarea>

                            </div>

                            <div class="form-group">
                                <label class="form-label">Long Description <sub>(Hindi)</sub></label>
                                <textarea id="editor-2" class="form-control" name="long_dsc_hindi" rows="10"
                                    cols="30"></textarea>

                            </div>
                        </div>
                    </div>
                </div>

                {{-- Product Price --}}

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
                                        <input class="form-control" type="text" name="selling_price">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Discount Price</label>
                                        <input class="form-control" type="text" name="discount_price">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="checkbox checkbox-danger">
                                            <input type="checkbox" name="hot_deal" value="1"><span>Hot Deal</span><span
                                                class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="checkbox checkbox-success">
                                            <input type="checkbox" name="featured" value="1"><span>Featured</span><span
                                                class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="checkbox checkbox-primary">
                                            <input type="checkbox" name="special_deal" value="1"><span>Special
                                                Deal</span><span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="checkbox checkbox-warning">
                                            <input type="checkbox" name="special_offer" value="1"><span>Special
                                                Offer</span><span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>

                            </div> {{--row end --}}

                        </div>
                    </div>
                </div>

                {{-- Product Status --}}

                <div class="col-lg-4 col-xl-4 mt-3">

                </div>

                <div class="col-lg-8 col-xl-8 mt-3">
                    <div class="card">
                        <div class="card-body">

                            <div class="form-group">
                                <label class="radio radio-success">
                                    <input type="radio" id="publish" value="1" name="status"><span>Publish</span><span
                                        class="checkmark"></span>
                                </label>
                            </div>
                            <div class="form-group">
                                <label class="radio radio-success">
                                    <input type="radio" id="draft" value="0" name="status"><span>Draft</span><span
                                        class="checkmark"></span>
                                </label>
                            </div>

                        </div>
                    </div>
                </div>

            </div> <!-- end of row -->

            {{-- Submit Button --}}

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


    $(document).ready(function () {

        var nextRowID = 0;

        $(document).on('click', '#add-more-form', function () {
            var id = ++nextRowID;
           $('.new-form').append('<div class="row">\
                    <div class="col-md-5">\
                        <div class="form-group">\
                            <label for="picker1">Attribute Name</label>\
                            <select onchange="getval(this);" class="attr_id form-control" id="attr_id_'+ id +'" name="attr_id">\
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
                            <label for="picker1">Attribute Value</label>\
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

//Attribute Add More Values Function

    function getval (that){

       let attr_id = that.value;
        // console.log($(that).closest('.attr_value_id'))
       let attr_value = $(that).closest(".row").find(".attr_value_id");
       
        // console.log(that.value);
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

        $('#add-more-form').click(function(){
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


    $('#attr_id').on('change', function(){
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
            var d =$(".attr_value_id").empty();
               $.each(data, function(key, value){
                   $(".attr_value_id").append('<option value="'+ value.id +'">' + value.attr_value_eng+ '</option>');
               });
         },
     });
 } else {
     alert('danger');
 }
});
});



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

// Category Filters
$(document).ready(function() {
        $('#category_id').on('change', function () {
            
            var category_id = $(this).val();

           // alert(category_id);

             $.ajaxSetup({
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });

            $.ajax({
                type: 'POST',
                url: 'category-filter',
                data: {category_id:category_id},
                success: function (data) {
                    $('.category_filter').html(data);
                }
            });
        });
    
   });
</script>

@endsection