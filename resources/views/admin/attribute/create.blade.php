@extends('admin.layouts.app')


@section('content')

<div class="main-content">
    <div class="breadcrumb">
        <h1>Create a new attribute</h1>
    </div>
    <div class="separator-breadcrumb border-top"></div>
    <section class="widget-card">
        <form action="{{ route('store.attribute') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-4 col-xl-4 mt-3">
                
                    <h5 class="ul-widget-card__title"><span class="t-font-boldest">Attribute</span></h5>
                    <p class="card-text"><span class="t-font-bold">Write your product attribute from here.</span></p>
            
                </div>
            <div class="col-lg-8 col-xl-8 mt-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="picker1">Name <sub>(English)</sub></label>
                                    <input type="text" class="form-control" name="attr_name_eng">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="picker1">Name <sub>(Hindi)</sub></label>
                                    <input type="text" class="form-control" name="attr_name_hindi">
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- Card End -->
            </div>

            <div class="col-lg-4 col-xl-4 mt-3">
                
                <h5 class="ul-widget-card__title"><span class="t-font-boldest">Attribute Values</span></h5>
                <p class="card-text"><span class="t-font-bold">Write your product attribute values from here.</span></p>
        
            </div>
        <div class="col-lg-8 col-xl-8 mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="picker1">Value <sub>(English)</sub></label>
                                <input type="text" class="form-control" name="attr_value_eng[]">
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
                                <label for="picker1">Value <sub>(Hindi)</sub></label>
                                <input type="text" class="form-control" name="attr_value_hindi[]">
                            </div>
                        </div>
                    </div>

                    <div class="new-form2"></div>
            
                    <div class="form-group">
                        <a href="javascript:void(0)" class="add-more2 btn btn-success">Add More</a>
                    </div>
                    
                </div>
            </div> <!-- Card End -->
            <div class="mt-3">
                <input type="submit" style="float:right" class="btn btn-md btn-primary" value="Add Attribute">
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
                                    <label for="picker1">Value <sub>(English)</sub></label>\
                                    <input type="text" class="form-control" name="attr_value_eng[]">\
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

        $(document).on('click', '.remove-btn2', function () {
            $(this).closest('.row').remove();
        });
});


$(document).ready(function () {
    $(document).on('click', '.add-more2', function () {
       $('.new-form2').append('<div class="row">\
                            <div class="col-md-8">\
                                <div class="form-group">\
                                    <label for="picker1">Value <sub>(Hindi)</sub></label>\
                                    <input type="text" class="form-control" name="attr_value_hindi[]">\
                                </div>\
                            </div>\
                            <div class="col-md-2">\
                                <div class="form-group">\
                                    <br>\
                           <button type="button" class="remove-btn2 btn btn-danger">Remove</button>\
                           </div>\
                       </div>\
                    </div>');
    });
});


</script>

@endsection