@extends('layouts.master')
@section('css')
@toastr_css
@section('title')
    Modifier Projet
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">Modifier Projet</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Admin</a></li>
                <li class="breadcrumb-item active">Modifier Projet</li>
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

                <form method="post"  action="{{ route('projet.modifier') }}" autocomplete="off" enctype="multipart/form-data">
                @csrf
                <input type="text" name="id" style="display: none;" value="{{ $projet->id}}">

                <h6 style="font-family: 'Cairo', sans-serif;color: blue">Informations Projet</h6><br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nom de Projet : <span class="text-danger">*</span></label>
                                <input  type="text" name="name"  class="form-control" value="{{$projet->name}}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Statu: </label>
                                <div class="form-check">
        <input class="form-check-input" type="radio" name="statu" id="actif" value="actif" checked>
        <label class="form-check-label" for="actif">Actif</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="statu" id="inactif" value="inactif">
        <label class="form-check-label" for="inactif">Inactif</label>
    </div>
</div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Adresse : <span class="text-danger">*</span></label>
                                <input  type="text" name="date" id="datepicker-action" data-date-format="yyyy-mm-dd" class="form-control" value="{{$projet->date}}" >
                            </div>
                            <div class="form-group">
                                <label for="personnel_id">Personnel:</label>
                                <select name="personnel_id[]" id="personnel_id" class="form-control" multiple>                                    @foreach($personnels as $personnel)
                                        <option value="{{ $personnel->id }}">{{ $personnel->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="consulteur_id">Consulteur:</label>
                                <select name="consulteur_id[]" id="consulteur_id" class="form-control"multiple>
                                    @foreach($consulteurs as $consulteur)
                                        <option value="{{ $consulteur->id }}">{{ $consulteur->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                        </div>

                        <div class="col-md-3">
                          
                        </div>
                    </div>
                <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">Modifier</button>
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

