@extends('layouts.master')

@section('content')
    <form class="form-inline" action="{{URL::to('/auth/login')}}">
        <input type="hidden" value="{{csrf_token()}}"/>
        <div class="form-group">
            <input type="text" class="form-control" name="password" placeholder="Password">
        </div>
        <button class="btn btn-primary" type="submit">Search</button>
    </form>
@stop
