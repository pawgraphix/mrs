<form role="form" action="{{route('order.assign_tailor')}}" method="post">
    @csrf
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myModalLabel"> Assign Tailor</h4>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="form-group">
                <input type="hidden" name="id" value="{{$item->id}}">
                <label for="tailor_id">Tailor Name</label>
                <select class="form-group dd_select" id="tailor_id" name="tailor_id" required style="width: 100%">
                    <option>---Select---</option>
                    @foreach($tailors as $tailor)
                        <option value="{{$tailor->id}}">{{$tailor->full_name}}</option>
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
