@extends('admin.layouts.app')

@section('content')

<div class="main-content">
    <div class="breadcrumb">
        <h1>Add a new product</h1>
    </div>
    <div class="separator-breadcrumb border-top"></div>
    <!-- content goes here-->
    <section class="widget-card">

        <form action="{{ route('store.slider') }}" method="POST" enctype="multipart/form-data">
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
                                <label for="exampleInputEmail1">Slider Imag</label>
                                <input type="file" class="form-control" name="image" onchange="preview()">
                            </div>
                            <div class="form-group">
                                <img id="showImage" src="{{ asset('ecommerce/no-image.png') }}" alt="image"
                                    style="width:150px; height:90px">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-xl-4 mt-3">

                    <h5 class="ul-widget-card__title"><span class="t-font-boldest">Description</span></h5>
                    <p class="card-text"><span class="t-font-bold">Add your slider other details from here.</span></p>

                </div>

                <div class="col-lg-8 col-xl-8 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Slider Title</label>
                                <input type="text" class="form-control" name="title">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Slider Description</label>
                                <textarea type="text" class="form-control" rows="5" cols="15"
                                    name="description"> </textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-xl-4 mt-3">

                </div>

                <div class="col-lg-8 col-xl-8 mt-3">
                    <div class="card">
                        <div class="card-body">

                            <div class="form-group">
                                <label class="radio radio-success">
                                    <input type="radio" value="1" name="status"><span>ACTIVE</span><span
                                        class="checkmark"></span>
                                </label>
                            </div>
                            <div class="form-group">
                                <label class="radio radio-success">
                                    <input type="radio" value="0" name="status"><span>INACTIVE</span><span
                                        class="checkmark"></span>
                                </label>
                            </div>

                        </div>
                    </div>
                </div>


                <div class="col-lg-12 col-xl-12 mt-3 mb-5">

                    <div>
                        <button type="submit" style="float:right" class="btn btn-md btn-primary" name="submit">Add
                            Slider</button>

                        <a href="{{ route('show.slider') }}" style="float:right; margin-right:10px;"
                            class="btn btn-md btn-success">Back</a>
                    </div>

                </div>

        </form>

    </section><!-- end of main-content -->
</div>



@endsection