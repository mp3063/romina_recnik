@extends('layouts.master')

@section('content')
    <div class="container text-center">
        <h1 class="text-success">Iz rečnika "{{ucfirst($show->recnika->recnici)}}":</h1>
        <hr/>
        <br/>
        <div class="text-center"><h2>{{$show->engleski}} - {{$show->srpski}}</h2></div>
        <a href="{{URL::route('recnik.edit',$show->id)}}" class="btn btn-success">Update</a>
        <a href="{{URL::to('/'.$show->id.'/destroy')}}" class="btn btn-danger delete">Delete</a>
    </div>
@stop
