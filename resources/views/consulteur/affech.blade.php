@extends('layouts.master')

@section('css')
    <!-- Ajoutez ici votre code CSS personnalisé -->
@endsection

@section('title')
    Liste des Echantillons
@stop

@section('page-header')
    <!-- En-tête de page -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">Liste des Echantillons</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">consulteur</a></li>
                    <li class="breadcrumb-item active">Liste des Echantillons</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <!-- Contenu de la page -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <!-- Ajoutez votre contenu ici -->
                    <div class="table-responsive">
                        <table id="datatable" class="table table-hover table-sm table-bordered p-0" data-page-length="50" style="text-align: center">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Nom Produit</th>
                                    <th>N°_serie</th>
                                    <th>Déscription</th>
                                    <th>Terminer</th>
                                    <th>Operations</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($echantillons as $echantillon)
                                    <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td>
                                            @if($echantillon->produit)
                                                {{ $echantillon->produit->name }}
                                            @else
                                                Aucun produit associé
                                            @endif
                                        </td>
                                        <td>{{ $echantillon->nserie }}</td>
                                        <td>{{ $echantillon->description }}</td>
                                        <td>
                                            @if($echantillon->terminer == 'oui')
                                                <span style="color: green;">{{$echantillon->terminer}}</span>
                                            @else
                                                <span style="color: red;">{{$echantillon->terminer}}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a class="dropdown-item" href="{{ route('echantillon.terminer', $echantillon->id) }}">
                                                <i style="color: green" class="fa-solid fa-check"></i>&nbsp; Terminer
                                            </a>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection

@section('js')
    <!-- Ajoutez ici votre code JavaScript personnalisé -->
    @toastr_js
    @toastr_render
@endsection
