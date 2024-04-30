@extends('layouts.master')
@section('css')

@section('title')
liste des projets
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
liste des projets
@stop
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">liste des projets</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Admin</a></li>
                <li class="breadcrumb-item active">liste des projets</li>
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
                                <a href="{{ route('admin.projet') }}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">Ajouter noveau projets</a><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Nom Projet</th>
                                            <th>Statu</th>
                                            <th>Date</th>
                                            <th>Operations</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($projets as $projet)
                                            <tr>
                                            <td>{{$loop->index+1 }}</td>
                                            <td>{{$projet->name}}</td>
                                            <td>{{$projet->statu}}</td>
                                            <td>{{$projet->date}}</td>
                                                <td>
                                                          <a class="dropdown-item" href="{{ route('projet.update',$projet->id) }}"><i style="color:green" class="fa fa-edit"></i>&nbsp;   Modifier </a>
                                                          <a href="{{ route('projet.delete',$projet->id) }}"><button type="button" class="dropdown-item" data-toggle="modal" data-target="#delete_book{{ $projet->id }}" title="supprimer"><i style="color:rgb(226, 22, 22)" class="fa fa-trash"></i> Supprimer</button></a>
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
