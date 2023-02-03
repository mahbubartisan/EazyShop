@extends('admin.layouts.app')


@section('content')

<div class="main-content">
    <div class="breadcrumb">
        <h1>Create a new brand</h1>
    </div>
    <div class="separator-breadcrumb border-top"></div>
    <section class="widget-card">
        <form action="{{ route('update.category', $category->id) }}" method="POST">
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
                                    <input type="text" class="form-control" name="category_name_eng"
                                    value="{{ $category->category_name_eng }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="picker1">Name <sub>(Hindi)</sub></label>
                                    <input type="text" class="form-control" name="category_name_hindi"
                                    value="{{ $category->category_name_hindi}}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- Card End -->
            </div>

            <div class="col-lg-4 col-xl-4 mt-3">
                
                <h5 class="ul-widget-card__title"><span class="t-font-boldest">Description</span></h5>
                <p class="card-text"><span class="t-font-bold">Write your category information from here.</span></p>
        
            </div>
        <div class="col-lg-8 col-xl-8 mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="picker1">Category Icon</label>
                                <input type="text" class="form-control" name="category_icon"
                                value="{{ $category->category_icon }}">
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
                                        
                                    <option value="{{ $type->id }}" @if($category->type_id == $type->id) ?
                                        
                                        selected @endif>{{ $type->type_eng }}</option>
                                   @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="picker1">Parent Category</label>
                                <select class="form-control" name="parent_id">
                                    <option selected disabled>Select...</option>

                               
                                    @foreach ($parent_categories as $parent_category)
                                        
                                    <option value="{{ $parent_category->id }}" @if($category->parent_id == $parent_category->id) ?
                                        
                                        selected @endif>{{ $parent_category->category_name_eng }}</option>
                                   @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- Card End -->
            <div class="mt-3 mb-5">
                <input type="submit" style="float:right" class="btn btn-md btn-primary" value="Update Category">
            </div>
        </div>
        </form>
    </section>
    </div><!-- end of main-content -->
</div>
@endsection

