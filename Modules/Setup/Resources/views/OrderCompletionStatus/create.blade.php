<div id="create_role_modal" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" action="{{route('completion-status.store')}}" method="post">
                @csrf
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel"> Create Orders Completion Status</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="order_id" value="{{$order->id}}">
                        <div class="form-group">
                            <label for="completion_stage_id">Completion Stage </label>
                       <select class="form-group" id="completion_stage_id" name="completion_stage_id" required style="width: 100%">
                           <option>---Select---</option>
                           @foreach($completion_stages as $completion_stage)
                               <option value="{{$completion_stage->id}}">{{$completion_stage->name}}</option>
                           @endforeach
                       </select>
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
