@extends('layouts.master')

@section('content')
    <div class="container">
        <hr>
        <form class="form-inline text-center" action="/plata" method="post" autocomplete="off">
            {{csrf_field()}}
            <div class="change">
                <input class="form-control" name="0" type="date" placeholder="From Date"/>
                <input class="form-control" name="1" type="date" placeholder="To Date"/>
                <input class="form-control" name="2" size="3" type="text" placeholder="Plata"/>
                <input class="form-control" name="3" size="3" type="text" placeholder="Odmor"/>
                <input class="form-control" name="4" type="text" placeholder="Predato karaktera"/>
                <input class="form-control" name="5" type="date" placeholder="Datum za kurs evra"/>
                <button class="btn btn-success btn-add" type="button">
                    <span class="glyphicon glyphicon-plus"></span>
                </button>
                <br><br>
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </div>

        </form>
    </div>
@stop
