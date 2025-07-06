<div id="create_role_modal" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" action="{{route('order.store')}}" method="post">
                @csrf
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel"> Create Order</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group">
                            <label for="cloth_type_id">Cloth Type</label>
                            <select class="form-group" id="cloth_type_id" name="cloth_type_id" required style="width: 100%">
                                <option>---Select---</option>
                                @foreach($cloth_types as $cloth_type)
                                    <option value="{{$cloth_type->id}}">{{$cloth_type->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="customer_id">Customer Name</label>
                       <select class="form-group" id="customer_id" name="customer_id" required style="width: 100%">
                           <option>---Select---</option>
                           @foreach($customers as $customer)
                               <option value="{{$customer->id}}">{{$customer->name}}</option>
                           @endforeach
                       </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" id="description" name="description"
                                   placeholder="Enter Description">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" class="form-control" id="price" name="price"
                                   placeholder="Enter Price">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="advance_payment">Advance Payment</label>
                            <input type="text" class="form-control" id="advance_payment" name="advance_payment"
                                   placeholder="Enter Advance Payment">
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
