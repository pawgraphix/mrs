<form role="form" action="{{route('tailor.update',$item->id)}}" method="post">
    @csrf
    @method('PUT')
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myModalLabel"> Edit Tailor</h4>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" class="form-control" id="first_name" name="first_name"
                    value="{{$item->first_name}}"   placeholder="Enter First Name" required>
            </div>
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name"
                      value="{{$item->last_name}}" placeholder="Enter Last Name" required>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label for="gender">Gender</label>
                <select class="form-control" id="gender" name="gender" required>
                    <option value="">Select</option>
                    @foreach($genders as $gender)
                        <option value="{{$gender}}" {{$gender == $item->gender ? 'selected':''}}>{{$gender}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="phone_number">Phone Number</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number"
                     value="{{$item->phone_number}}"  placeholder="Enter Phone Number" required>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email"
                    value="{{$item->email}}"   placeholder="Enter Email" required>
            </div>
            <div class="form-group">
                <label for="physical_location">Physical Location</label>
                <input type="text" class="form-control" id="physical_location" name="physical_location"
                    value="{{$item->physical_location}}"  placeholder="Enter Physical Location" required>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
    </div>
</form>
