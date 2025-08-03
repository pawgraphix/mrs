<form role="form" action="{{route('maintenance_requests.update',$item->id)}}" method="post">
    @csrf
    @method('PUT')
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myModalLabel"> Edit Request</h4>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="form-group">
                <label for="asset_id">Asset Name</label>
                <select class="form-group" id="asset_id" name="asset_id" required
                        style="width: 100%">
                    <option>---Select---</option>
                    @foreach($assets as $asset)
                        <option
                            value="{{$asset->id}}" {{$asset->id ==$item->asset_id ? 'selected':'' }}>{{$asset->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="location_id">Location</label>
                <select class="form-group" id="location_id" name="location_id" required
                        style="width: 100%">
                    <option>---Select---</option>
                    @foreach($locations as $location)
                        <option
                            value="{{$location->id}}" {{$location->id ==$item->location_id ? 'selected':'' }}>{{$location->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="issue">Issue</label>
                <textarea class="form-control" id="issue" name="issue" rows="6" required>{{$item->issue}}</textarea>
            </div>
        </div>
    </div> <!-- End row -->
    <div class="modal-footer">
        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
    </div>
</form>
