@extends('admin.layouts.app')


@section('content')

<div class="main-content">
    <div class="breadcrumb">
        <h1>Edit attribute</h1>
    </div>
    <div class="separator-breadcrumb border-top"></div>
    <section class="widget-card">
     
        <form action="{{ route('update.tag', $tags->first()->type_id) }}" method="POST">
            @csrf

            {{-- @dd($attr_values->first()) --}}
           
            <div class="row">
                <div class="mt-3 col-lg-4 col-xl-4">
                
                    <h5 class="ul-widget-card__title"><span class="t-font-boldest">Type</span></h5>
                    <p class="card-text"><span class="t-font-bold">Write your product type from here.</span></p>
            
                </div>
            <div class="mt-3 col-lg-8 col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="picker1">Name <sub>(English)</sub></label>
                                    <input type="text" class="form-control" name="type_eng"
                                    value="{{ $tags->first()->types->type_eng }}">
                                    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="picker1">Name <sub>(Hindi)</sub></label>
                                    <input type="text" class="form-control" name="type_hindi"
                                    value="{{ $tags->first()->types->type_hindi }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- Card End -->
            </div>

            <div class="mt-3 col-lg-4 col-xl-4">
                
                <h5 class="ul-widget-card__title"><span class="t-font-boldest">Tag</span></h5>
                <p class="card-text"><span class="t-font-bold">Write your product tags from here.</span></p>
        
            </div>
        <div class="mt-3 col-lg-8 col-xl-8">
            <div class="card">
                <div class="card-body">
                    @foreach ($tags as $tag)
                        
                    <input type="hidden" name="type_id" value="{{ $tag->first()->type_id }}">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="picker1">Tag <sub>(English)</sub></label>
                                <input type="text" class="form-control" name="tag_eng[]"
                                value="{{ $tag->tag_eng  }}">
                            </div>
                        </div>

                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="picker1">Tag <sub>(Hindi)</sub></label>
                                <input type="text" class="form-control" name="tag_hindi[]"
                                value="{{ $tag->tag_hindi  }}">
                            </div>
                        </div>
                       
                        <div class="col-md-2">
                            <div class="form-group">
                                <br>
                                <button type="button" class="remove-btn btn btn-danger">Remove</button>
                            </div>
                        </div>
                     </div>

                    @endforeach
                    <div class="new-form"></div>
            
                    <div class="form-group">
                        <a href="javascript:void(0)" class="add-more btn btn-success">Add More</a>
                    </div>
                </div>
            </div> <!-- Card End -->
            <div class="mt-3 mb-5">
                <input type="submit" style="float:right" class="btn btn-lg btn-primary" value="Update Tag">
            </div>
        </div>
        </form>
    </section>
    </div><!-- end of main-content -->
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"> </script>

<script>

    $(document).ready(function () {

        $(document).on('click', '.remove-btn', function () {
            $(this).closest('.row').remove();
        });
});

$(document).ready(function () {
    $(document).on('click', '.add-more', function () {
       $('.new-form').append('<div class="row">\
                            <div class="col-md-5">\
                                <div class="form-group">\
                                    <label for="picker1">Value <sub>(English)</sub></label>\
                                    <input type="text" class="form-control" name="tag_eng[]">\
                                </div>\
                            </div>\
                            <div class="col-md-5">\
                            <div class="form-group">\
                                <label for="picker1">Value <sub>(Hindi)</sub></label>\
                                <input type="text" class="form-control" name="tag_hindi[]">\
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

</script>

@endsection