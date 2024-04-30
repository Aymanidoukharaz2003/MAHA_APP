@extends('layouts.master')
@section('css')
@toastr_css
@section('title')
    Modifier Echantillon
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">Modifier Echantillon</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Admin</a></li>
                <li class="breadcrumb-item active">Modifier Echantillon</li>
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

                <form method="post"  action="{{ route('echantillon.modifier') }}" autocomplete="off" enctype="multipart/form-data">
                @csrf
                <input type="text" name="id" style="display: none;" value="{{ $echantillon->id}}">

                <h6 style="font-family: 'Cairo', sans-serif;color: blue">Informations Echantillon</h6><br>
                <div class="form-group">
                    <label for="nserie">Numéro de série :</label>
                    <input type="text" class="form-control" id="nserie" name="nserie[]" required value="{{ $echantillon->nserie }}">
                </div>
                <div class="form-group">
                    <label for="produit_id">Produit :</label>
                    <select class="form-control" id="produit_id" name="produit_id" required>
                        @foreach ($produits as $produit)
                            <option value="{{ $produit->id }}"{{ $echantillon->produit_id == $produit->id ? 'selected' : '' }}>{{ $produit->name }}</option>
                        @endforeach
                    </select>
                    <div class="form-group">
                        <label for="nserie">Déscription :</label>
                        <input type="text" class="form-control" name="description[]" required value="{{$echantillon->description}}">
                    </div>
                </div>
                <div class="form-group">
                    <input type="hidden" name="user_name" value="{{ auth()->user()->name }}">
                </div>
                
                <div class="form-group">
                    <label for=""></label>
                    
                </div>

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

