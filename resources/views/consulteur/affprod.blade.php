@extends('layouts.master')

@section('css')
    <!-- Ajoutez ici votre code CSS personnalisé -->
@endsection

@section('title')
    Liste des Produits
@stop

@section('page-header')
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">Liste des Produits</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">consulteur</a></li>
                <li class="breadcrumb-item active">Liste des Produits</li>
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
                                        <td>{{ $produit->marque }}</td>
                                        <td>{{ $produit->modele }}</td>
                                        <td>{{ $produit->projet ? $produit->projet->name : 'Aucun projet associé' }}</td>
                                        <td>
                                            <a href="{{ route('consulteur.echantillons', ['email' => Auth::user()->email, 'produit_id' => $produit->id]) }}">
                                                <i style="color:rgb(19, 0, 194)" class="fa fa-plus"></i>&nbsp; Afficher échantillon
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
@endsection

@section('js')
    <!-- Ajoutez ici votre code JavaScript personnalisé -->
@endsection
