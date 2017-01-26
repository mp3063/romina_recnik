@extends('layouts.master')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-8 col-lg-8">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Od datuma</th>
                        <th>Do datuma</th>
                        <th>Plata iznos</th>
                        <th>Odmor dana</th>
                        <th>Predato</th>
                        <th>Datum kursa</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($proracunPlate as $plata)
                        <tr>
                            <td>{{Carbon\Carbon::parse($plata->datum_od)->format('d. M. Y.')}}</td>
                            <td>{{Carbon\Carbon::parse($plata->datum_do)->format('d. M. Y.')}}</td>
                            <td>{{$plata->plata_iznos .' din'}}</td>
                            <td>{{$plata->odmor}}</td>
                            <td>{{$plata->predato_karaktera}}</td>
                            <td>{{Carbon\Carbon::parse($plata->datum_kursa)->format('d. M. Y.')}}</td>
                            <td>
                                <a href="#" id-value="{{$plata->id}}" data-toggle="modal" data-target="#update_plate_modal" class="label label-warning update-modal">Update</a>
                            </td>
                            <td>
                                <a id="deleteModal" href="/plata-baza-delete/{{$plata->id}}" class="label label-danger delete">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <a href="#" data-toggle="modal" class="btn btn-primary btn-block" data-target="#izracunavanje_plate_modal">New Entry</a>
            </div>

            <div class="col-sm-12 col-md-4 col-lg-4">
                <table class="table proracun">
                    <thead>
                    <tr>
                        <th>Norma</th>
                        <th>Razlika</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($proracunPlate as $plata)
                        <tr>
                            <td class="norma">{{$plata->norma}}</td>
                            <td class="razlika">{{$plata->predato_karaktera - $plata->norma}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <div class="container text-center sum">

    </div>
    @include('partials.modal_izracunavanje_plate')
    @include('partials.modal_update_plata')
@stop
