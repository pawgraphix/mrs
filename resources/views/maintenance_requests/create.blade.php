<div id="create_maintenance_requests_modal" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" action="{{route('maintenance_requests.store')}}" method="post">
                @csrf
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel"> Create Request</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                            <div class="form-group">
                                <label for="asset_id">Asset Name</label>
                                <select class="form-group" id="asset_id" name="asset_id" required
                                        style="width: 100%">
                                    <option>---Select---</option>
                                    @foreach($assets as $asset)
                                        <option value="{{$asset->id}}">{{$asset->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        <div class="form-group">
                            <label for="location_id">Location</label>
                            <select class="form-group" id="location_id" name="location_id" required
                                    style="width: 100%">
                                <option>---Select---</option>
                                @foreach($locations as $location)
                                    <option value="{{$location->id}}">{{$location->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="issue">Issue</label>
                            <textarea class="form-control" id="issue" name="issue"
                                      placeholder="Enter Maintenance Request" rows="6" required></textarea>
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
