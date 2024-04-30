@extends('layouts.master')
@section('css')
@toastr_css
@section('title')
    Ajouter consulteur
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">Ajouter consulteur</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Admin</a></li>
                <li class="breadcrumb-item active">Ajouter consulteur</li>
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

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="post"  action="{{ route('consulteur.store') }}" autocomplete="off" enctype="multipart/form-data">
                @csrf
                <h6 style="font-family: 'Cairo', sans-serif;color: blue">Informations personnelle</h6><br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nom complet : <span class="text-danger">*</span></label>
                                <input  type="text" name="name"  class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Courriel électronique: </label>
                                <input type="email"  name="email" class="form-control" >
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Mot de passe:</label>
                                <input  type="password" name="password" class="form-control" >
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Adresse : <span class="text-danger">*</span></label>
                                <input  type="text" name="adresse" class="form-control" >
                            </div>
                        </div>

                        <div class="col-md-3">
                          
                        </div>


                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Numero du Telephone:</label>
                                <input class="form-control" type="text"   name="telephone">
                            </div>
                            <div class="form-group">
                                <label>CIN:</label>
                                <input class="form-control" type="text"  name="cin" >
                            </div>
                        </div>

                    </div>
                <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">Ajouter</button>
            </form>

            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render

@endsection

