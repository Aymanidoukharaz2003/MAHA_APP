@extends('layouts.master')
@section('css')

@section('title')
    Tableu De Bord
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> Tableau De Bord</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Admin</a></li>
                <li class="breadcrumb-item active">Tableau de bord</li>
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
                <!-- divs artistiques -->
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <div class="clearfix">
                                    <div class="float-left">
                                        <span class="text-warning">
                                            <i class="fas fa-chalkboard-teacher highlight-icon" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                    <div class="float-right text-right">
                                        <p class="card-text text-dark">Nombre de personnels</p>
                                        <h4>{{\App\Models\Personnel::count()}}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <div class="clearfix">
                                    <div class="float-left">
                                        <span class="text-success">
                                            <i class="fas fa-user-tie highlight-icon" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                    <div class="float-right text-right">
                                        <p class="card-text text-dark">Nombre de consulteurs</p>
                                        <h4>{{\App\Models\Consulteur::count()}}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <div class="clearfix">
                                    <div class="float-left">
                                        <span class="text-primary">
                                            <i class="fas fa-chalkboard highlight-icon" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                    <div class="float-right text-right">
                                        <p class="card-text text-dark">Nombre de projets</p>
                                        <h4>{{\App\Models\Projet::count()}}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                 <!-- Orders Status widgets-->


            <div class="row">

                <div  style="height: 400px;" class="col-xl-12 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="tab nav-border" style="position: relative;">
                                <div class="d-block d-md-flex justify-content-between">
                                    <div class="d-block w-100">
                                        <h5 style="font-family: 'Cairo', sans-serif" class="card-title">Dernieres insertions</h5>
                                    </div>
                                    <div class="d-block d-md-flex nav-tabs-custom">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">

                                            <li class="nav-item">
                                                <a class="nav-link active show" id="students-tab" data-toggle="tab"
                                                   href="#students" role="tab" aria-controls="students"
                                                   aria-selected="true"> Personnel</a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link" id="teachers-tab" data-toggle="tab" href="#teachers"
                                                   role="tab" aria-controls="teachers" aria-selected="false">consulteurs
                                                </a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link" id="parents-tab" data-toggle="tab" href="#parents"
                                                   role="tab" aria-controls="parents" aria-selected="false"> Projets
                                                </a>
                                            </li>


                                        </ul>
                                    </div>
                                </div>
                                <div class="tab-content" id="myTabContent">
                                    <!-- divs artistiques -->
                                    <div class="tab-pane fade active show" id="students" role="tabpanel" aria-labelledby="students-tab">
                                        <div class="table-responsive mt-15">
                                            <table style="text-align: center" class="table center-aligned-table table-hover mb-0">
                                                <thead>
                                                <tr  class="table-info text-danger">
                                                    <th>id</th>
                                                    <th>Nom complet</th>
                                                    <th>Courriel électronique</th>
                                                    <th>Adresse</th>
                                                    <th>Numero de telephone</th>
                                                    <th>CIN</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @forelse(\App\Models\Personnel::latest()->take(5)->get() as $personnel)
                                                    <tr>
                                                        <td>{{$loop->index+1 }}</td>
                                                        <td>{{$personnel->name}}</td>
                                                        <td>{{$personnel->email}}</td>
                                                        <td>{{$personnel->adresse}}</td>
                                                        <td>{{$personnel->telephone}}</td>
                                                        <td>{{$personnel->cin}}</td>
                                                        @empty
                                                            <td class="alert-danger" colspan="8">Aucune donnée trouvée</td>
                                                    </tr>
                                                @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    {{--teachers Table--}}
                                    <div class="tab-pane fade" id="teachers" role="tabpanel" aria-labelledby="teachers-tab">
                                        <div class="table-responsive mt-15">
                                            <table style="text-align: center" class="table center-aligned-table table-hover mb-0">
                                                <thead>
                                                <tr  class="table-info text-danger">
                                                    <th>id</th>
                                                    <th>Nom complet</th>
                                                    <th>Courriel électronique</th>
                                                    <th>Adresse</th>
                                                    <th>Numero de telephone</th>
                                                    <th>CIN</th>
                                                </tr>
                                                </thead>

                                                @forelse(\App\Models\Consulteur::latest()->take(5)->get() as $consulteur)
                                                    <tbody>
                                                    <tr>
                                                        <td>{{$loop->index+1 }}</td>
                                                        <td>{{$consulteur->name}}</td>
                                                        <td>{{$consulteur->email}}</td>
                                                        <td>{{$consulteur->adresse}}</td>
                                                        <td>{{$consulteur->telephone}}</td>
                                                        <td>{{$consulteur->cin}}</td>
                                                        @empty
                                                            <td class="alert-danger" colspan="8"> Aucune donnée trouvée</td>
                                                    </tr>
                                                    </tbody>
                                                @endforelse
                                            </table>
                                        </div>
                                    </div>

                                    {{--parents Table--}}
                                    <div class="tab-pane fade" id="parents" role="tabpanel" aria-labelledby="parents-tab">
                                        <div class="table-responsive mt-15">
                                            <table style="text-align: center" class="table center-aligned-table table-hover mb-0">
                                                <thead>
                                                <tr  class="table-info text-danger">
                                                    <th>id</th>
                                                    <th>Nom Projet</th>
                                                    <th>Statu</th>
                                                    <th>Date</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @forelse(\App\Models\Projet::latest()->take(5)->get() as $projet)
                                                    <tr>
                                                        <td>{{$loop->index+1 }}</td>
                                                        <td>{{$projet->name}}</td>
                                                        <td>{{$projet->statu}}</td>
                                                        <td>{{$projet->date}}</td>
                                                        @empty
                                                            <td class="alert-danger" colspan="8"> Aucune donnée trouvée</td>
                                                    </tr>
                                                @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                 <!-- Orders Status widgets-->


            <div class="row">

                <div  style="height: 400px;" class="col-xl-12 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                        </div>
                    </div>
                </div>
            </div>
<!-- row closed -->
@endsection
@section('js')

@endsection
