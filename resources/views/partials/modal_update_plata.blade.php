<!-- Modal -->
<div class="modal fade" id="update_plate_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center" id="myModalLabel">Update</h4>
            </div>
            <form class="form-inline text-center" action="" autocomplete="off">
                <div class="modal-body">
                    {{method_field('patch')}}

                    {{csrf_field()}}

                    From<input class="form-control" name="datum_od" required type="date" placeholder="From Date"/>


                    To<input class="form-control" name="datum_do" required type="date" placeholder="To Date"/><br><br>

                    <input class="form-control" name="plata_iznos" required type="text" placeholder="Plata"/>

                    <input class="form-control" name="odmor" type="text" placeholder="Odmor"/>

                    <input class="form-control" name="predato_karaktera" required type="text" placeholder="Predato karaktera"/><br><br>


                    Datum kursa
                    <br><input class="form-control" name="datum_kursa" type="date" required placeholder="Datum za kurs evra"/>


                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>

                </div>
            </form>
        </div>
    </div>
</div>




