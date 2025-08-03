<div id="create_role_modal" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" action="{{route('UserRoles.store')}}" method="post">
                @csrf
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel"> Create User Role</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group">
                            <label for="user_id">Name</label>
                            <input type="text" class="form-control" id="user_id" name="user_id"
                                   placeholder="Enter Name">
                            <label for="role_id">Role</label>
                            <input type="text" class="form-control" id="role_id" name="role_id"
                                   placeholder="Enter Role">
                        </div>

                    </div> <!-- End row -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
