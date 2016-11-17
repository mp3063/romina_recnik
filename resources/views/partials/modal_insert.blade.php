<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center" id="myModalLabel">Insert</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'recnik.store', 'method' => 'post']) !!}
                {!! Form::select('id_recnika', $imena_recnika , null , ['class' => 'form-control text-capitalize']) !!}
                <br/>

                <!--- engleski Field --->
                <div class="form-group">
                    {!! Form::label('engleski', 'Engleski:') !!}
                    {!! Form::textarea('engleski', null, ['class' => 'form-control','rows'=>'4','required']) !!}
                </div>
                <!--- srpski Field --->
                <div class="form-group">
                    {!! Form::label('srpski', 'Srpski:') !!}
                    {!! Form::textarea('srpski', null, ['class' => 'form-control','rows'=>'4','required']) !!}
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>


