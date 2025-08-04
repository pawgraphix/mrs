@extends('layouts.app')
@section('page-content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-10">
                            <h3 class="panel-title">Manage Users </h3>
                        </div>
                        <div class="col-md-2" style="text-align: right">
                            <button class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#create_user_modal">Add New</button>
                           <!-- <button class="btn btn-primary waves-effect waves-light" onclick="notify()">test Notify</button>-->
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Full Name</th>
                                    <th>Phone Number</th>
                                    <th>Email</th>
                                    <th>Gender</th>
                                    <th>Role</th>
                                    <th>Department</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($items as $key=>$item)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$item->full_name}}</td>
                                        <td>{{$item->phone_number}}</td>
                                        <td>{{$item->email}}</td>
                                        <td>{{$item->gender}}</td>
                                        <td>{{$item->role->name}}</td>
                                        <td>{{$item->department->name}}</td>
                                        <td style="width: 10%;text-align: center">
                                            <a class="edit-link btn-sm btn-primary waves-effect waves-light m-b-5" href="{{route('users.edit',$item->id)}}">Edit</a>
                                            | <a class="delete-link btn-sm btn-danger waves-effect waves-light m-b-5" href="{{route('users.destroy',$item->id)}}">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('users.create')

        <!-- Edit Modal-->
        <div id="edit_user_modal" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content modal-edit">

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->


    </div> <!-- End Row -->
@endsection
@section('Scripts')
    <script>
        $('.edit-link').on('click', function (e) {
            e.preventDefault();
            const dataURL = $(this).attr('href');
            $('.modal-edit').load(dataURL, function () {
                $('#edit_user_modal').modal({show: true});
            });
        });

            document.addEventListener('DOMContentLoaded', function () {
            function showError(input, message) {
                let error = input.nextElementSibling;
                if (!error || !error.classList.contains('input-error-msg')) {
                    error = document.createElement('small');
                    error.classList.add('input-error-msg');
                    error.style.color = 'red';
                    input.parentNode.appendChild(error);
                }
                error.innerText = message;
                error.style.display = 'block';
                input.classList.add('input-error');
            }

            function clearError(input) {
            input.classList.remove('input-error');
            const error = input.parentNode.querySelector('.input-error-msg');
            if (error) {
            error.innerText = '';
            error.style.display = 'none';
        }
        }

            function validateEmailFormat(input) {
            const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!re.test(input.value)) {
            showError(input, 'Enter a valid email');
            return false;
        } else {
            clearError(input);
            return true;
        }
        }

            function checkEmailExistence(input) {
            if (!validateEmailFormat(input)) return;

            fetch("{{ url('/check-email') }}", {
            method: 'POST',
            headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
            body: JSON.stringify({ email: input.value })
        })
            .then(res => res.json())
            .then(data => {
            if (data.exists) {
            showError(input, 'Email is already taken');
        } else {
            clearError(input);
        }
        })
            .catch(() => {
            showError(input, 'Error checking email');
        });
        }

            function validateName(input, label) {
            const val = input.value.trim();
            if (!val) {
            showError(input, `${label} is required`);
        } else if (!/^[a-zA-Z\s']+$/.test(val)) {
            showError(input, `${label} must contain letters only`);
        } else {
            clearError(input);
        }
        }

            function validatePhone(input) {
            const val = input.value.trim();
            if (!val) {
            showError(input, 'Phone number is required');
        } else if (!/^(\+\d{12}|0\d{9})$/.test(val)) {
            showError(input, 'Phone number must start with + followed by 12 digits or 0 followed by 9 digits and must contain numbers');
        } else {
            clearError(input);
        }
        }

            // Select inputs
            const emailInput = document.querySelector('#create_user_modal input[name="email"]');
            const firstName = document.querySelector('#create_user_modal input[name="first_name"]');
            const lastName = document.querySelector('#create_user_modal input[name="last_name"]');
            const phone = document.querySelector('#create_user_modal input[name="phone_number"]');

            if (emailInput) {
            emailInput.addEventListener('input', () => {
            validateEmailFormat(emailInput);
            checkEmailExistence(emailInput);
        });
        }

            if (firstName) {
            firstName.addEventListener('input', () => validateName(firstName, 'First name'));
        }

            if (lastName) {
            lastName.addEventListener('input', () => validateName(lastName, 'Last name'));
        }

            if (phone) {
            phone.addEventListener('input', () => validatePhone(phone));
        }
        });
    </script>
@endsection
