@extends('layouts.master')

@section('content')
    <div class="container text-center">

        <div class="btn-group categories">

            @if($imena)
                <a class="btn btn-danger" data-filter="*">Show all</a>
                @foreach($imena as $ime)
                    <a class="btn btn-danger" data-filter=".{{$ime->recnici}}">{{ucfirst($ime->recnici)}}</a>
                @endforeach
            @else
                <h2>Nema pronadjenih rezultata</h2>
            @endif
        </div>
        <br/>

        <div id="work-div">
            {{--@unless(is_null($search))--}}
            @foreach($search as $ime)
                <a href="recnik/{{$ime->id}}" class="btn btn-default btn-block {{$ime->recnika->recnici}}">{{$ime->engleski}} - {{$ime->srpski}}</a>
            @endforeach
            {{--@endunless--}}
        </div>
    </div>
@stop


