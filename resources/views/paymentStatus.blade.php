@extends('layouts.master')
@section('content')
    @if($status == "successful")
        <div class="alert alert-success text-center" role="alert">
            <div class="alert alert-success" role="alert">
                Transaction Successful, return to Home
            </div>
        </div>
    @else
        <div class="alert alert-danger text-center" role="alert">
            <div class="alert alert-danger" role="alert">
                Transaction Failed, Try again Later
            </div>
        </div>
    @endif
       {{-- <div class="content-justify-center"><a href="{{url('/')}}">HOME</a></div>  --}}
    
    
   
@endsection