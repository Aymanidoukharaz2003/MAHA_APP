@extends('layouts.master')
@section('css')
@toastr_css
@section('title')
    Modifier Produit
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">Modifier Produit</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Admin</a></li>
                <li class="breadcrumb-item active">Modifier Produit</li>
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

                <form method="post"  action="{{ route('produit.modifier') }}" autocomplete="off" enctype="multipart/form-data">
                @csrf
                <input type="text" name="id" style="display: none;" value="{{ $produit->id}}">

                <h6 style="font-family: 'Cairo', sans-serif;color: blue">Informations Produit</h6><br>
                <div class="form-group">
                    <label for="name">Nom du produit</label>
                    <input type="text" class="form-control" id="name" name="name" required value="{{$produit->name}}">
                </div>

                <div class="form-group">
                    <label for="quantite">Quantité</label>
                    <input type="number" class="form-control" id="quantite" name="quantite" required value="{{$produit->quantite}}">
                </div>

                <div class="form-group">
                    <label for="marque">Marque</label>
                    <input type="text" class="form-control" id="marque" name="marque" required value="{{$produit->marque}}">
                </div>

                <div class="form-group">
                    <label for="modele">Modèle</label>
                    <input type="text" class="form-control" id="modele" name="modele" required value="{{$produit->modele}}">
                </div>

                <div class="form-group">
                    <label for="projet_id">Sélectionner le projet</label>
                    <select class="form-control" id="projet_id" name="projet_id" required>
                        @foreach ($projets as $projet)
                        <option value="{{ $projet->id }}" {{ $produit->projet_id == $projet->id ? 'selected' : '' }}>
                            {{ $projet->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for=""></label>
                    
                </div>
                <input type="hidden" name="user_name" value="{{ auth()->user()->name }}">

                <button type="submit" class="btn btn-primary">Modifier le produit</button>
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

