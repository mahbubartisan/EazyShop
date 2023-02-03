@extends('admin.layouts.app')


@section('content')

<div class="main-content">
    <div class="breadcrumb">
        <h1>Create new tags</h1>
    </div>
    <div class="separator-breadcrumb border-top"></div>
    <section class="widget-card">
        <form action="{{ route('store.tag') }}" method="POST">
            @csrf
            <div class="row">
                <div class="mt-3 col-lg-4 col-xl-4">
                
                    <h5 class="ul-widget-card__title"><span class="t-font-boldest">Type</span></h5>
                    <p class="card-text"><span class="t-font-bold">Write your product type from here.</span></p>
            
                </div>
            <div class="mt-3 col-lg-8 col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="picker1">Types</label>
                                    <select class="form-control" name="type_id">
                                        <option selected disabled>Select type</option>
                                        @foreach ($types as $type)
                                            <option value="{{ $type->id }}">{{ $type->type_eng }}</option>
                                        @endforeach  
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- Card End -->
            </div>

            <div class="mt-3 col-lg-4 col-xl-4">
                
                <h5 class="ul-widget-card__title"><span class="t-font-boldest">Tags</span></h5>
                <p class="card-text"><span class="t-font-bold">Write your product tags from here.</span></p>
        
            </div>
        <div class="mt-3 col-lg-8 col-xl-8">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="tag_eng">Name <sub>(English)</sub></label>
                                <input type="text" class="form-control" name="tag_eng[]">
                                @error('tag_eng')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="new-form"></div>
            
                    <div class="form-group">
                        <a href="javascript:void(0)" class="add-more btn btn-success">Add More</a>
                    </div>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="tag_hindi">Name <sub>(Hindi)</sub></label>
                                <input type="text" class="form-control" name="tag_hindi[]">
                                @error('tag_hindi')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="new-form-2"></div>
            
                    <div class="form-group">
                        <a href="javascript:void(0)" class="add-more-2 btn btn-success">Add More</a>
                    </div>
                </div>
            </div> <!-- Card End -->
            <div class="mt-3 mb-5">
                <input type="submit" style="float:right" class="btn btn-lg btn-primary" value="Add Tag">
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
                            <div class="col-md-8">\
                                <div class="form-group">\
                                    <label for="tag_eng">Name <sub>(English)</sub></label>\
                                    <input type="text" class="form-control" name="tag_eng[]">\
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


$(document).ready(function () {

        $(document).on('click', '.remove-btn-2', function () {
            $(this).closest('.row').remove();
        });
});


$(document).ready(function () {
    $(document).on('click', '.add-more-2', function () {
       $('.new-form-2').append('<div class="row">\
                            <div class="col-md-8">\
                                <div class="form-group">\
                                    <label for="tag_hindi">Name <sub>(Hindi)</sub></label>\
                                    <input type="text" class="form-control" name="tag_hindi[]">\
                                </div>\
                            </div>\
                            <div class="col-md-2">\
                                <div class="form-group">\
                                    <br>\
                           <button type="button" class="remove-btn-2 btn btn-danger">Remove</button>\
                           </div>\
                       </div>\
                    </div>');
    });
});


</script>

@endsection