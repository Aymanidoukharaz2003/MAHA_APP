@extends('layouts.master')

@section('css')
    @toastr_css
@endsection

@section('title')
    Ajouter Echantillon
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">Ajouter Echantillon</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">Admin</a></li>
                    <li class="breadcrumb-item active">Ajouter Echantillon</li>
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

                    <form method="post"  action="{{ route('echantillon.store') }}" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        <h6 style="font-family: 'Cairo', sans-serif;color: blue">Informations Echantillon</h6><br>
                      <tr>
                        <div class="form-group">
                            <label for="projet_id">Projet :</label>
                            <select class="form-control" id="projet_id" name="projet_id" required>
                                <option value="">Sélectionner un projet</option>
                                @foreach ($projets as $projet)
                                    <option value="{{ $projet->id }}">{{ $projet->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="produit_id">Produit :</label>
                            <select class="form-control" id="produit_id" name="produit_id[]" required>
                                <option value="">Sélectionner un produit</option>
                            </select>
                        </div>

                        <div class="table-responsive">
                            <table id="sample-table" class="table">
                                <tbody>
                                    <tr>
                                        <td style="width: 50%;">
                                            <div class="form-group">
                                                <label for="nserie">Numéro de série :</label>
                                                <input type="text" class="form-control" name="nserie[]" required>
                                            </div>
                                        </td>
                                        <td style="width: 50%;">
                                            <div class="form-group">
                                                <label for="description">Description :</label>
                                                <textarea type="text" class="form-control" name="description[]" required></textarea>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <label for="terminer">Terminer: </label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="terminer" id="oui" value="oui" >
                                                    <label class="form-check-label" for="oui" style="color: green">Oui</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="terminer" id="non" value="non" checked>
                                                    <label class="form-check-label" for="non" style="color: red">Non</label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tr>
                                    <input type="hidden" name="user_name" value="{{ auth()->user()->name }}">
                                    <input type="hidden" name="consulteur" value="**">

                                </tbody>
                            </table>
                        </div>

                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            

            

            // Function to fetch products based on selected project
            $('#projet_id').change(function() {
                var projetId = $(this).val();
                if (projetId) {
                    $.ajax({
                        url: '{{ route("admin.fetch.products.by.project") }}',
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            projet_id: projetId
                        },
                        success: function(data) {
                            $('#produit_id').html(data);
                        }
                    });
                } else {
                    $('#produit_id').html('<option value="">Sélectionner un produit</option>');
                }
            });
        });
    </script>
    @toastr_js
    @toastr_render
@endsection
