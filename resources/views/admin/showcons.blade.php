@extends('layouts.master')
@section('css')
    
@section('title')
liste des consulteurs
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
liste des consulteurs
@stop
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">liste des consulteurs</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Admin</a></li>
                <li class="breadcrumb-item active">liste des consulteurs</li>
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
                                <a href="{{ route('admin.consulteur') }}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">Ajouter noveau consulteurs</a><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Nom complet</th>
                                            <th>Courriel électronique</th>
                                            <th>Adresse</th>
                                            <th>Numero de telephone</th>
                                            <th>CIN</th>
                                            <th>Operations</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($consulteurs as $consulteur)
                                            <tr>
                                            <td>{{$loop->index+1 }}</td>
                                            <td>{{$consulteur->name}}</td>
                                            <td>{{$consulteur->email}}</td>
                                            <td>{{$consulteur->adresse}}</td>
                                            <td>{{$consulteur->telephone}}</td>
                                            <td>{{$consulteur->cin}}</td>
                                                <td>
                                                            <a class="dropdown-item" href="{{ route('consulteur.update',$consulteur->id) }}"><i style="color:green" class="fa fa-edit"></i>&nbsp;   Modifier </a>
                                                          <a href="{{ route('consulteur.delete',$consulteur->id) }}"><button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_book{{ $consulteur->id }}" title="supprimer"><i class="fa fa-trash"></i>supprimer</button></a>
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
