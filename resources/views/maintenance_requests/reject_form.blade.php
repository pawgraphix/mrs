<form role="form" action="{{route('maintenance_requests.reject')}}" method="post">
    @csrf
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myModalLabel"> Reject Request</h4>
    </div>
    <div class="modal-body">
        <div class="row">
            <input type="hidden" name="id" value="{{$item->id}}">
            <div class="form-group">
                <label for="reject_comment">Reject Comment</label>
                <textarea class="form-control" id="reject_comment" name="reject_comment" rows="3" required></textarea>
            </div>
        </div>
    </div> <!-- End row -->
    <div class="modal-footer">
        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
    </div>
</form>
