@extends('admin.layouts.app')


@section('content')

<div class="main-content">
    <div class="breadcrumb">
        <h1>Categories</h1>
    </div>
    <div class="separator-breadcrumb border-top"></div>
   
    <!-- end of row-->
    <div class="row mb-4">
        <div class="col-md-12 mb-4">
            <div class="card text-left">
                <div class="card-body">
                    <a href="{{ route('create.coupon') }}" class="btn btn-md btn-outline-success ripple m-3" style="float:right"><i class="fa fa-plus"> Add Coupon</i></a>
                    <div class="table-responsive">
                        <table class="display table table-striped table-bordered table-responsive{-sm|-md|-lg|-xl}" id="zero_configuration_table" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Serial NO.</th>
                                    <th>Name</th>
                                    <th>Amount(%)</th>
                                    <th>Validity</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                  @forelse ($coupons as $coupon)
                                  <tr>
                                  <td>{{ $loop->iteration }}</td>

                                  <td>{{ $coupon->name }} </td>
                                  <td>{{ $coupon->amount }}% </td>
                                  <td> {{Carbon\Carbon::parse($coupon->validity)->format('D, d F Y')}}</td>
                                  <td>@if ($coupon->validity >= now()->format('Y-m-d') && $coupon->status == 1 )
                                      
                                   <span class="badge badge-pill badge-warning m-2 p-2">VALID</span> 
                                  @else
                                  <span class="badge badge-pill badge-warning m-2 p-2">EXPIRED</span> 
                                  @endif
                                </td>
                                  <td>
                                    <a href="{{ url('coupons/'.$coupon->id.'/edit/') }}" class="btn btn-primary mb-2 ml-3" title="Edit"><i class="nav-icon i-Pen-4"></i></a>
                                    <a href="{{ url('coupons/'.$coupon->id.'/delete/') }}" class="btn btn-danger mb-2 ml-3" title="Delete"><i class="nav-icon i-Close-Window"></i></a>
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