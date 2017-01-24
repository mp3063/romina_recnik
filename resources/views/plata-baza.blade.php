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
                            <th>{{Carbon\Carbon::parse($plata->datum_od)->format('d. M. Y.')}}</th>
                            <th>{{Carbon\Carbon::parse($plata->datum_do)->format('d. M. Y.')}}</th>
                            <th>{{$plata->plata_iznos .' din'}}</th>
                            <th>{{$plata->odmor}}</th>
                            <th>{{$plata->predato_karaktera}}</th>
                            <th>{{Carbon\Carbon::parse($plata->datum_kursa)->format('d. M. Y.')}}</th>
                            <th>
                                <a href="#" data-toggle="modal" data-target="#update_plate_modal" class="btn btn-sm btn-warning">Update</a>
                            </th>
                            <th>
                                <a id="deleteModal" href="/plata-baza-delete/{{$plata->id}}" class="btn btn-sm btn-danger">Delete</a>
                            </th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <a href="#" data-toggle="modal" class="btn btn-primary btn-block" data-target="#izracunavanje_plate_modal">New Entry</a>
            </div>
        </div>
    </div>
    @include('partials.modal_izracunavanje_plate')
    @include('partials.modal_update_plata')
@stop
