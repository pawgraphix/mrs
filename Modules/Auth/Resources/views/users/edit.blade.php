<form role="form" action="{{route('users.update',$item->id)}}" method="post">
    @csrf
    @method('PUT')
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
                           value="{{$item->first_name}}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name"
                           value="{{$item->last_name}}">
                </div>
            </div>
        </div> <!-- End row -->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="phone_number">Phone Number</label>
                    <input type="text" class="form-control" id="phone_number" name="phone_number"
                           value="{{$item->phone_number}}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="gender">Department</label>
                    <select class="form-control" id="department_id" name="department_id">
                        <option>--- Select---</option>
                        @foreach($departments as $department)
                            <option
                                value="{{$department->id}}" {{$department->id ==$item->department_id ? 'selected':'' }}>{{$department->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div> <!-- End row -->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select class="form-control" id="gender" name="gender">
                        <option disabled selected>--- Select ---</option>
                        @foreach($genders as $gender)
                            <option
                                value="{{ $gender }}" {{ $item->gender == $gender ? 'selected' : '' }}>{{ $gender }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="role_id">Role</label>
                    <select class="form-control" id="role_id" name="role_id">
                        <option disabled selected>--- Select ---</option>
                        @foreach($roles as $role)
                            <option
                                value="{{$role->id}}" {{$role->id ==$item->role_id ? 'selected':'' }}>{{$role->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div> <!-- End row -->
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email"
                           value="{{$item->email}}">
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
    </div>
</form>
