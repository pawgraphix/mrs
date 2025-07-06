<form role="form" action="{{route('customer.update',$item->id)}}" method="post">
    @csrf
    @method('PUT')
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myModalLabel"> Edit Customer</h4>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="form-group small">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name"
                       value="{{$item->name}}">
            </div>
        </div>
        <div class="row">
            <div class="form-group small">
                <label for="phone_number">Phone Number</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number"
                       value="{{$item->phone_number}}">
            </div>
        </div>
        <div class="row">
            <div class="form-group small">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email"
                       value="{{$item->email}}">
            </div>
        </div>

    </div> <!-- End row -->
    <div class="modal-footer">
        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
    </div>
</form>
