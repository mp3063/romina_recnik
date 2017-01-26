@extends('layouts.master')

@section('content')
    <div class="container-fluid controls">
        <hr>
        <form class="form-inline text-center" action="/plata" method="post" autocomplete="off">
            {{csrf_field()}}
            <div class="entry">
                Od:
                <input class="form-control" name="0" required type="date" placeholder="From Date"/>
                Do:
                <input class="form-control" name="1" required type="date" placeholder="To Date"/>
                <input class="form-control" name="2" required size="5" type="text" placeholder="Plata"/>
                <input class="form-control" name="3" size="3" type="text" placeholder="Odmor"/>
                <input class="form-control" name="4" required type="text" placeholder="Predato karaktera"/>
                Datum kursa:
                <input class="form-control" name="5" type="date" required placeholder="Datum za kurs evra"/>
                <button class="btn btn-success btn-add" type="button">
                    <span class="glyphicon glyphicon-plus"></span>
                </button>
                <br><br>
                <div class="container">
                    <button type="submit" class="btn btn-primary btn-block">Izračunaj</button>
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
                    <h4>{{date_format($odD,'F')." norma: ".round($mesecnaNorma[$i])." karaktera"}}</h4>
                    <?php
                    $i++
                    ?>
                @endforeach
                <h4>{{"Ukupno radnih dana: ".$ukupnoRadnihDana}}</h4>
                <h4>{{'Dana radio: ' .$danaOdmora}}</h4>
                <h4>{{"Ukupno karaktera potrebnih za ispunjenje norme: ".$ukupnoKaraktera}}</h4>
                <h4>{{"Ukupna razlika u predatim i obaveznim karakterima je: ".$razlika}}</h4>
            @endif
        </div>
    </div>
@stop
