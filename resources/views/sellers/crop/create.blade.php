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
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Crop</a></li>
                        <li class="breadcrumb-item active">Upload</li>
                    </ol>
                </div>
                <h4 class="page-title">Upload Produce</h4>
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
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Upload Produce</h4>

                    <ul class="nav nav-tabs nav-bordered mb-3">
                        <li class="nav-item">
                            <a href="#custom-styles-preview" data-toggle="tab" aria-expanded="false" class="nav-link active">
                                Preview
                            </a>
                        </li>
                    </ul> <!-- end nav-->
                    <div class="tab-content">
                        <div class="tab-pane show active" id="custom-styles-preview">
                            <form class="needs-validation" action="{{url('crops')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="validationCustom01">Upload image</label>
                                    <input class="form-control" type="file" id="formFile" name="file">

                                    
                                </div>
                                <div class="form-group mb-3">
                                    <label for="validationCustom01">Crop Name</label>
                                    <input type="text" class="form-control" id="validationCustom01"
                                        placeholder="Crop Name" name="name" required>
                                    
                                </div>
                                <div class="form-group mb-3">
                                    <label for="validationCustom01">Crop Name</label>
                                    <select class="form-select" aria-label="Default select example" name="crop_category">
                                        <option selected>Select Category</option>
                                        @if(isset($cropCat))
                                            @foreach ( $cropCat as $item)
                                                <option value="{{$item->id}}">{{$item->name}} - ( {{ $item->description}} )</option>
                                            @endforeach
                                        @endif
                                      </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="validationCustomUsername">Price Per</label>
                                    <select class="form-select" aria-label="Default select example" name="price_per">
                                        <option selected>Open this select menu</option>
                                        <option value="unit">..Unit</option>
                                        <option value="kg">..Kg</option>
                                        <option value="tonne">..Tonne</option>
                                        <option value="bag">..Bag</option>
                                      </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="validationCustom01">Price</label>
                                    <input type="number" class="form-control" id="validationCustom01"
                                        placeholder="Price" name="price" required>
                                    
                                </div>
                                <div class="form-group mb-3">
                                    <label for="validationCustom01">Quantity</label>
                                    <input type="number" class="form-control" id="validationCustom01"
                                        placeholder="Crop Name" name="quantity" required>
                                    
                                </div>
                                <button class="btn btn-primary" type="submit">Upload</button>
                            </form>                                            
                        </div> <!-- end preview-->

                    </div> <!-- end tab-content-->

                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>
    <!-- end row -->

</div>
@endsection