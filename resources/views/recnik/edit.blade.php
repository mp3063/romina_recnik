@extends('layouts.master')

@section('content')

    <div class="container">
        <h2 class="text-center text-success">"{{ucfirst($edit->recnika->recnici)}}"</h2>
    {!! Form::model($edit, ['route' => ['recnik.update', $edit->id], 'method' => 'patch']) !!}
    <!--- engleski Field --->
        <div class="form-group">
            {!! Form::label('engleski', 'Engleski:') !!}
            {!! Form::textarea('engleski', null, ['class' => 'form-control','rows'=>'6','required']) !!}
        </div>
        <!--- srpski Field --->
        <div class="form-group">
            {!! Form::label('srpski', 'Srpski:') !!}
            {!! Form::textarea('srpski', null, ['class' => 'form-control','rows'=>'6','required']) !!}
        </div>
        {!! Form::submit('Update', ['class' => 'form-control btn btn-success']) !!}
        {!! Form::close() !!}
    </div>

@stop
