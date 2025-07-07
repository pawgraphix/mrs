<div id="create_assets_modal" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" action="{{route('room-assets.store')}}" method="post">
                @csrf
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel"> Create Asset</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                   placeholder="Enter Asset Name" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Location</label>
                            <input type="text" class="form-control" id="location" name="location"
                                   placeholder="Enter Location Name" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="name">Registration Number</label>
                            <input type="text" class="form-control" id="registration_number" name="registration_number"
                                   placeholder="Enter Registration Number" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Year Of Purchase</label>
                            <input type="text" class="form-control" id="year_of_purchase" name="year_of_purchase"
                                   placeholder="Enter Year Of Purchase" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <label for="department_id">Department</label>
                            <select class="form-group" id="department_id" name="department_id" required
                                    style="width: 100%">
                                <option>---Select---</option>
                                @foreach($departments as $department)
                                    <option value="{{$department->id}}">{{$department->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="asset_category_id">Category</label>
                            <select class="form-group" id="asset_category_id" name="asset_category_id" required
                                    style="width: 100%">
                                <option>---Select---</option>
                                @foreach($asset_categories as $asset_category)
                                    <option value="{{$asset_category->id}}">{{$asset_category->name}}</option>
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
