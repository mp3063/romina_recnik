@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <hr>
        <form class="form-inline text-center" action="/plata" method="post" autocomplete="off">
            {{csrf_field()}}
            <div class="change">
                Od:
                <input class="form-control" name="0" type="date" placeholder="From Date"/>
                Do:
                <input class="form-control" name="1" type="date" placeholder="To Date"/>
                <input class="form-control" name="2" size="5" type="text" placeholder="Plata"/>
                <input class="form-control" name="3" size="3" type="text" placeholder="Odmor"/>
                <input class="form-control" name="4" type="text" placeholder="Predato karaktera"/>
                Datum kursa:
                <input class="form-control" name="5" type="date" placeholder="Datum za kurs evra"/>
                <button class="btn btn-success btn-add" type="button">
                    <span class="glyphicon glyphicon-plus"></span>
                </button>
                <br><br>
                <div class="container">
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </div>
            </div>
        </form>
        <div class="container text-center">
            @if(isset($ukupnoRadnihDana)|| isset($danaOdmora)|| isset($ukupnoKaraktera)||isset($razlika)||isset($od)|| isset($mesecnaNorma))
                <?php
                $i = 0;
                ?>
                @foreach($od as $odDatuma)
                    <?php
                    $odD = date_create($odDatuma);
                    ?>
                    <h3>{{date_format($odD,'F')." norma: ".round($mesecnaNorma[$i])." karaktera"}}</h3>
                    <?php
                    $i++
                    ?>
                @endforeach
                <h3>{{"Ukupno radnih dana: ".$ukupnoRadnihDana}}</h3>
                <h3>{{'Dana radio: ' .$danaOdmora}}</h3>
                <h3>{{"Ukupno karaktera potrebnih za ispunjenje norme: ".$ukupnoKaraktera}}</h3>
                <h3>{{"Ukupna razlika u predatim i obaveznim karakterima je: ".$razlika}}</h3>
            @endif
        </div>
    </div>
@stop
