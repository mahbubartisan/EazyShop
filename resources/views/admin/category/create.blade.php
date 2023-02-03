@extends('admin.layouts.app')


@section('content')

<div class="main-content">
    <div class="breadcrumb">
        <h1>Create a new category</h1>
    </div>
    <div class="separator-breadcrumb border-top"></div>
    <section class="widget-card">
        <form action="{{ route('store.category') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-4 col-xl-4 mt-3">
                
                    <h5 class="ul-widget-card__title"><span class="t-font-boldest">Category Name</span></h5>
                    <p class="card-text"><span class="t-font-bold">Write your category name from here.</span></p>
            
                </div>
            <div class="col-lg-8 col-xl-8 mt-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="picker1">Name <sub>(English)</sub></label>
                                    <input type="text" class="form-control" name="category_name_eng">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="picker1">Name <sub>(Hindi)</sub></label>
                                    <input type="text" class="form-control" name="category_name_hindi">
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- Card End -->
            </div>

            <div class="col-lg-4 col-xl-4 mt-3">
                
                <h5 class="ul-widget-card__title"><span class="t-font-boldest">Description</span></h5>
                <p class="card-text"><span class="t-font-bold">Add your category necessary information from here.</span></p>
        
            </div>
        <div class="col-lg-8 col-xl-8 mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="picker1">Category Icon</label>
                                <input type="text" class="form-control" name="category_icon">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="picker1">Types</label>
                                <select class="form-control" name="type_id">
                                    <option selected disabled>Select...</option>
                                    @foreach ($types as $type)
                                    <option value="{{ $type->id }}">{{ $type->type_eng }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="picker1">Parent Categories</label>
                                <select class="category form-control" name="parent_id">
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- Card End -->
            <div class="mt-3 mb-5">
                <input type="submit" style="float:right" class="btn btn-md btn-primary" value="Add Category">
            </div>
        </div>
        </form>
    </section>
    </div><!-- end of main-content -->
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script type="text/javascript">

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
                        url: "{{  url('/categories/ajax') }}/"+type_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data) {
                           var d =$('select[name="parent_id"]').empty();
                              $.each(data, function(key, value){
                                  $('select[name="parent_id"]').append('<option value="'+ value.id +'">' + value.category_name_eng+ '</option>');
                              });
                        },
                    });
                } else {
                    alert('danger');
                }
            });


        $(".category").select2({
            placeholder: "Select...",
            allowClear: true
        });
}); 



    </script>

@endsection