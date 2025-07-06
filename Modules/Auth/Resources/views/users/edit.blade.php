<form role="form" action="{{route('users.update',$item->id)}}" method="post">
    @csrf
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myModalLabel"> Edit User</h4>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" class="form-control" id="first_name" name="first_name"
                         value="{{$item->first_name}}"  placeholder="Enter First Name" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name"
                           placeholder="Enter Last Name" required>
                </div>
            </div>
        </div> <!-- End row -->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email"
                           placeholder="Enter Email" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="phone_number">Phone Number</label>
                    <input type="text" class="form-control" id="phone_number" name="phone_number"
                           placeholder="Enter Phone Number" required>
                </div>
            </div>
        </div> <!-- End row -->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select class="form-control" id="gender" name="gender">
                        <option>--- Select---</option>
                        @foreach($genders as $gender)
                            <option value="{{$gender}}" {{$gender == $item->gender ? 'selected':''}}>{{$gender}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="trade_point_id">Trade Point</label>
                    <select  class="form-control" id="trade_point_id" name="trade_point_id">
                        <option>--- Select---</option>
                        @foreach($trade_points as $trade_point)
                            <option value="{{$trade_point->id}}">{{$trade_point->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div> <!-- End row -->
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
    </div>
</form>
