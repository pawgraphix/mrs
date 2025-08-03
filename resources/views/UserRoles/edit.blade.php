<form role="form" action="{{route('UserRoles.update',$item->id)}}" method="post">
    @csrf
    @method('PUT')
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myModalLabel"> Edit Role</h4>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="form-group">
                <label for="user_id">Name</label>
                <input type="text" class="form-control" id="user_id" name="user_id" value="{{$item->id}}">
                <label for="role_id">Role</label>
                <input type="text" class="form-control" id="role_id" name="role_id" value="{{$item->id}}">
            </div>

        </div> <!-- End row -->
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
    </div>
</form>
