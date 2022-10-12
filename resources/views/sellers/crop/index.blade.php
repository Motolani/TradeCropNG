@extends('sellers.layouts.master')
@section('content')
<!-- Start Content-->
<div class="container-fluid">
    
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Seller</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Crops</a></li>
                        <li class="breadcrumb-item active">Uploaded Lists</li>
                    </ol>
                </div>
                <h4 class="page-title">Uploaded Lists</h4>
            </div>
        </div>
    </div>     
    <!-- end page title --> 
    
    @if (session('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif
    @if(count($errors) > 0)
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
                {{ $error }}
            </div>
        @endforeach
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">List of Uploaded Crops</h4>

                    <ul class="nav nav-tabs nav-bordered mb-3">
                        <li class="nav-item">
                            <a href="#basic-datatable-preview" data-toggle="tab" aria-expanded="false" class="nav-link active">
                                Preview
                            </a>
                        </li>
                    </ul> <!-- end nav-->
                    <div class="tab-content">
                        <div class="tab-pane show active" id="basic-datatable-preview">
                            <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>price_per</th>
                                        <th>price</th>
                                        <th>quantity</th>
                                        <th>created_at</th>
                                    </tr>
                                </thead>
                            
                            
                                <tbody>
                                @if (isset($crops))
                                    @foreach ( $crops as $item)
                                        <tr>
                                            <td><img src="{{ asset('storage/uploads/'.$item->img) }}" alt="img" width="20%"> </td>
                                            
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->category_name}}</td>
                                            <td>{{$item->price_per}}</td>
                                            <td>{{$item->price}}</td>
                                            <td>{{$item->quantity}}</td>
                                            <td>{{$item->created_at}}</td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>                                           
                        </div> <!-- end preview-->

                    </div> <!-- end tab-content-->

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
    <!-- end row-->

</div>
@endsection