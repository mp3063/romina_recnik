<!-- Modal -->
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center" id="myModalLabel">Ime recnika</h4>
            </div>
            <div class="modal-body">
            {!! Form::open(['url' => '/ime_recnika', 'method' => 'post']) !!}

            <!--- ime_recnika Field --->
                <div class="form-group">
                    {!! Form::label('ime_recnika', 'Ime recnika:') !!}
                    {!! Form::text('ime_recnika', null, ['class' => 'form-control','required']) !!}
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
