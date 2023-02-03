@extends('admin.layouts.app')


@section('content')

<div class="main-content">
    <div class="breadcrumb">
        <h1>Tags</h1>
    </div>
    <div class="separator-breadcrumb border-top"></div>
   
    <!-- end of row-->
    <div class="row mb-4">
        <div class="col-md-12 mb-4">
            <div class="card text-left">
                <div class="card-body">
                    <a href="{{ route('create.tag') }}" class="btn btn-lg btn-outline-success ripple m-3" style="float:right"><i class="fa fa-plus"> Add Tag</i></a>
                    <div class="table-responsive">
                        <table class="display table table-striped table-bordered table-responsive{-sm|-md|-lg|-xl}" id="zero_configuration_table" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Serial NO.</th>
                                    <th>Type <sub>(English)</sub></th>
                                    <th>Type <sub>(Hindi)</sub></th>
                                    <th>Tags <sub>(English)</sub></th>
                                    <th>Tags <sub>(Hindi)</sub></th>
                                    
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @forelse ($tags as $key =>  $tag)
                                {{-- @dd($attr_value) --}}
                                  <tr>
                                  <td>{{ $loop->iteration }}</td>

                                  <td>{{ $tag->first()->types->type_eng }} </td>
                                  <td>{{ $tag->first()->types->type_hindi }} </td>
                                  
                                  <td> {{ $tag->pluck('tag_eng')->implode(',') }}</td>
                                  <td> {{ $tag->pluck('tag_hindi')->implode(',') }}</td>
                                  <td>
                                    <a href="{{ url('tags/edit/'.$key) }}" class="btn btn-primary mb-2 ml-3" title="Edit"><i class="nav-icon i-Pen-4"></i></a>
                                    <a href="{{ url('tags/delete/'.$key) }}" class="btn btn-danger mb-2 ml-3" title="Delete"><i class="nav-icon i-Close-Window"></i></a>
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