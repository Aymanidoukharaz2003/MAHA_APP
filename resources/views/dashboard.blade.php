@extends('layouts.master')
@section('css')

@section('title')
    Tableau de bord
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> Tableau de bord</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Consulteur</a></li>
                <li class="breadcrumb-item active">Tableau de bord</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <section style="background-color: #eee;">
                    <div class="container py-5">
                        <div class="row justify-content-center">
                                <div class="col-md-8 col-lg-6 col-xl-4">
                                    <a href="">
                                        <div class="card text-black">
                                            <img src="{{URL::asset('assets/images/profile-avatar.jpg')}}"/>
                                            <div class="card-body">
                                                <div class="text-center">
                                                    <h5 style="font-family: 'Cairo', sans-serif"
                                                        class="card-title">{{ auth()->user()->name }}</h5>
                                                    <p class="text-muted mb-4">{{ auth()->user()->email }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            
                        </div>
                    </div>
                </section>
    
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
