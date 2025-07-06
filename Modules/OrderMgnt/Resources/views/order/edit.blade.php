<form role="form" action="{{route('order.update',$item->id)}}" method="post">
    @csrf
    @method('PUT')
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myModalLabel"> Edit Order</h4>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="form-group">
                <label for="cloth_type_id">Cloth Type</label>
                <select class="form-group dd_select" id="cloth_type_id" name="cloth_type_id" required style="width: 100%">
                    <option>---Select---</option>
                    @foreach($cloth_types as $cloth_type)
                        <option value="{{$cloth_type->id}}" {{$cloth_type->id ==$item->cloth_type_id ? 'selected':'' }}>{{$cloth_type->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label for="customer_id">Customer Name</label>
                <select class="form-group dd_select" id="customer_id" name="customer_id" required style="width: 100%">
                    <option>---Select---</option>
                    @foreach($customers as $customer)
                        <option value="{{$customer->id}}" {{$customer->id == $item->customer_id ? 'selected':''}}>{{$customer->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" id="description" name="description"
                    value="{{$item->description}}">
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" class="form-control" id="price" name="price"
                      value="{{$item->price}}">
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label for="advance_payment">Advance Payment</label>
                <input type="text" class="form-control" id="advance_payment" name="advance_payment"
                      value="{{$item->advance_payment}}">
            </div>
        </div>

    </div> <!-- End row -->
    <div class="modal-footer">
        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
    </div>
</form>
