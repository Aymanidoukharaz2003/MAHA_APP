@extends('layouts.master')
@section('css')
    
@section('title')
liste des Echantillons
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
liste des Echantillons
@stop
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">liste des Echantillons</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Admin</a></li>
                <li class="breadcrumb-item active">liste des Echantillons</li>
            </ol>
        </div>
    </div>
</div>
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <a href="{{ route('admin.echantillon') }}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">Ajouter noveau Echantillons</a><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Nom Produit</th>
                                            <th>N°_serie</th>
                                            <th>Déscription</th>
                                            <th>Consulteur</th>
                                            <th>Terminer</th>
                                            <th>Operations</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($echantillons as $echantillon)
                                            <tr>
                                            <td>{{$loop->index+1 }}</td>
                                            <td>
                                                @if($echantillon->produit)
                                                {{ $echantillon->produit->name }}
                                                @else
                                                Aucun produit associé
                                                @endif
                                        </td>
                                            <td>{{$echantillon->nserie}}</td>
                                            <td>{{$echantillon->description}}</td>
                                            <td>{{$echantillon->consulteur}}</td>
                                            <td>
                                                @if($echantillon->terminer == 'oui')
                                                    <span style="color: green;">{{$echantillon->terminer}}</span>
                                                @else
                                                    <span style="color: red;">{{$echantillon->terminer}}</span>
                                                @endif
                                            </td>
                                                <td>
                                                          <a href="{{ route('echantillon.delete',$echantillon->id) }}"><button type="button" class="dropdown-item" data-toggle="modal" data-target="#delete_book{{ $echantillon->id }}" title="supprimer"><i style="color: red" class="fa fa-trash"></i>supprimer</button></a>
 
                                             </td>
                                            </tr>
                                
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
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
