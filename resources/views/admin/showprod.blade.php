@extends('layouts.master')
@section('css')
    
@section('title')
    Liste des Produits
@stop
@endsection

@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')
        Liste des Produits
    @stop
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">Liste des Produits</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">Admin</a></li>
                    <li class="breadcrumb-item active">Liste des Produits</li>
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
                                <a href="{{ route('admin.produit') }}" class="btn btn-success btn-sm" role="button" aria-pressed="true">Ajouter nouveau Produits</a><br><br>
                                <form action="{{ route('produit.filtrer') }}" method="GET" class="form-inline float-sm-right">
                                    <div class="form-group mx-sm-3 mb-2">
                                        <label for="projet" class="sr-only">Rechercher par projet :</label>
                                        <select class="form-control btn btn-success btn-sm" id="projet" name="projet">
                                            <option value="">Tous les projets</option>
                                            @foreach($projets as $projet)
                                                <option value="{{ $projet->id }}">{{ $projet->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-sm mb-2">Rechercher</button>
                                </form>
                                <div class="form-group mx-sm-3 mb-2">
                                      
                                </div>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50" style="text-align: center">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>Nom Produit</th>
                                                <th>Quantite</th>
                                                <th>Marque</th>
                                                <th>Model</th>
                                                <th>Projet</th>
                                                <th>Operations</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($produits as $produit)
                                                <tr>
                                                    <td>{{ $loop->index+1 }}</td>
                                                    <td>{{ $produit->name }}</td>
                                                    <td>{{ $produit->quantite }}</td>
                                                    <td>{{ $produit->modele }}</td>
                                                    <td>{{ $produit->marque }}</td>
                                                    <td>
                                                        @if($produit->projet)
                                                            {{ $produit->projet->name }}
                                                        @else
                                                            Aucun projet associé
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <!-- Bouton pour modifier -->
                                                        <a class="dropdown-item" href="{{ route('produit.update', $produit->id) }}">
                                                            <i style="color:green" class="fa fa-edit"></i>&nbsp; Modifier
                                                        </a>
                                                        <!-- Bouton pour supprimer -->
                                                        <a href="{{ route('produit.delete', $produit->id) }}">
                                                            <button type="button" class="dropdown-item" data-toggle="modal" data-target="#delete_book{{ $produit->id }}" title="Supprimer">
                                                                <i style="color: red" class="fa fa-trash"></i> Supprimer
                                                            </button>
                                                        </a>
                                                        <div>
                                                            <!-- Bouton pour rediriger vers la route echantillon.update -->
                                                            <a href="{{ route('echantillon.afficher', ['produit_id' => $produit->id]) }}" class="dropdown-item">
                                                                <i style="color:rgb(19, 0, 194)" class="fa fa-plus"></i>&nbsp; Afficher échantillon
                                                            </a>
                                                            <a class="dropdown-item" href="{{route('generer.pdf', ['projetId' => $projet->id, 'produitId' => $produit->id])}}"><i  style="color:rgb(240, 186, 10)" class="fa-solid fa-file-arrow-down"></i> Export PDF</a>

                                                        </div>
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
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection

@section('js')
    @toastr_js
    @toastr_render
@endsection
