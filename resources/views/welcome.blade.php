@extends('layouts.master')

@section('content')
    <div class="container text-center">
        @foreach($imena as $row)
            <div class="text-center text-success">
                <h1>{{ucfirst($row->recnici)}}</h1>
                <hr/>
            </div>

            @foreach($row->sadrzaj->take(10) as $col)
                {{ucfirst($col->engleski)}} - {{ucfirst($col->srpski)}}<br/>
            @endforeach
                                            .........
        @endforeach
    </div>
@stop


