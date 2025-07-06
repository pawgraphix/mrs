<form role="form" action="{{route('OrderCompletionStatus.edit',$item->id)}}" method="post">
    @csrf
    @method('PUT')
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myModalLabel"> Edit Order Completion Status</h4>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="form-group">
                <label for="order_id">Order</label>
                <select class="form-group" id="order_id" name="order_id" required style="width: 100%">
                    <option>---Select---</option>
                    @foreach($orders as $order)
                        <option value="{{$order->id}}" {{$order->id ==$item->order_id ? 'selected':'' }}>{{$order_id->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label for="completion_stage_id">Completion Stage</label>
                <input type="text" class="form-control" id="completion_stage_id" name="completion_stage_id"
                    value="{{$item->completion_stage_id}}">
            </div>
        </div>


    </div> <!-- End row -->
    <div class="modal-footer">
        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
    </div>
</form>
