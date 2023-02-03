@extends('admin.layouts.app')


@section('content')

<div class="main-content">
    <div class="breadcrumb">
        <h1>Shippings</h1>
    </div>
    <div class="separator-breadcrumb border-top"></div>
   
    <!-- end of row-->
    <div class="row mb-4">
        <div class="col-md-12 mb-4">
            <div class="card text-left">
                <div class="card-body">
                    <a href="{{ route('create.shipping') }}" class="btn btn-md btn-outline-success ripple m-3" style="float:right"><i class="fa fa-plus"> Add Shipping</i></a>
                    <div class="table-responsive">
                        <table class="display table table-striped table-bordered table-responsive{-sm|-md|-lg|-xl}" id="zero_configuration_table" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Serial NO.</th>
                                    <th>District</th>
                                    <th>City</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                           
                            <tbody>
                                  @forelse ($district_cities as $district_city)
                                  <tr>
                                  <td>{{ $loop->iteration }}</td>
                                  <td>{{ $district_city->name }}</td>
                                  <td>{{ $district_city->city->pluck('name')->implode(',')}} </td>
                                  <td>
                                    <a href="{{ url('shippings/'.$district_city->id.'/edit/') }}" class="btn btn-primary mb-2 ml-3" title="Edit"><i class="nav-icon i-Pen-4"></i></a>
                                    <a href="{{ url('shippings/'.$district_city->id.'/delete/') }}" class="btn btn-danger mb-2 ml-3" title="Delete"><i class="nav-icon i-Close-Window"></i></a>
                                </td>
                                  

                                @empty
                                    <td>
                                        No records found...
                                    </td>
                                </tr>
                                  @endforelse
                                
                                    
                             
                            </tbody>
                          
                        </table>

                      
                    </div>
                </div>
            </div>
        </div>
     
        <!-- end of col-->
     
    </div>
    <!-- end of row-->
    <!-- end of main-content -->
</div>
    
@endsection