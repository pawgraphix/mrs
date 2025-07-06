<div id="create_role_modal" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" action="{{route('completion-stage.store')}}" method="post">
                @csrf
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel"> Create Completion Stage</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="cloth_type_id" value="{{$cloth_type->id}}">
                    <div class="row">
                        <div class="form-group">
                            <label for="name">Name </label>
                            <input type="text" class="form-control" id="name" name="name"
                                   placeholder="Enter Description" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <label for="percentage_weight">Percentage Weight </label>
                            <input type="text" class="form-control" id="percentage_weight" name="percentage_weight" placeholder="Enter Description">
                        </div>
                    </div>

                    </div> <!-- End row -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
