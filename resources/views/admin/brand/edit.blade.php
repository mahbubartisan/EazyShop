@extends('admin.layouts.app')


@section('content')

<div class="main-content">
    <div class="breadcrumb">
        <h1>Create a new brand</h1>
    </div>
    <div class="separator-breadcrumb border-top"></div>
    <section class="widget-card">
        <form action="{{ route('update.brand', $brands->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="old_image" value="{{ $brands->brand_image }}">
            <div class="row">
                <div class="mt-3 col-lg-4 col-xl-4">

                    <h5 class="ul-widget-card__title"><span class="t-font-boldest">Brand Image</span></h5>
                    <p class="card-text"><span class="t-font-bold">Upload your brand image from here.</span></p>

                </div>
                <div class="mt-3 col-lg-8 col-xl-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label for="picker1">Image</label>
                                        <input type="file" class="form-control" name="brand_image" onchange="preview()">
                                        @error('brand_image')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <img src="{{ asset($brands->brand_image) }}" style="height: 70px; weight:70px"
                                            alt="image" id="showImage">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- Card End -->
                </div>

                <div class="mt-3 col-lg-4 col-xl-4">

                    <h5 class="ul-widget-card__title"><span class="t-font-boldest">Description</span></h5>
                    <p class="card-text"><span class="t-font-bold">Write your brand description from here.</span></p>

                </div>
                <div class="mt-3 col-lg-8 col-xl-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="picker1">Name <sub>(English)</sub></label>
                                        <input type="text" class="form-control @error('brand_name_eng')
                                            border-danger
                                        @enderror" name="brand_name_eng"
                                            value=" {{ $brands->brand_name_eng }}">
                                        @error('brand_name_eng')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="picker1">Name <sub>(Hindi)</sub></label>
                                        <input type="text" class="form-control @error('brand_name_hindi')
                                            border-danger
                                        @enderror" name="brand_name_hindi"
                                            value="{{ $brands->brand_name_hindi }}">
                                        @error('brand_name_hindi')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="picker1">Types</label>
                                        <select class="form-control" name="type_id">
                                            <option selected disabled>Select type</option>
                                            @foreach ($types as $type)
                                            <option value="{{ $type->id }}" @if($brands->type_id == $type->id) ?

                                                selected @endif>{{ $type->type_eng }}</option>
                                            @endforeach
                                        </select>
                                        @error('type_id')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- Card End -->
                    <div class="mt-3 mb-5">
                        <input type="submit" style="float:right" class="btn btn-md btn-primary" value="Update Brand">
                    </div>
                </div>
        </form>
    </section>
</div><!-- end of main-content -->
</div>
@endsection