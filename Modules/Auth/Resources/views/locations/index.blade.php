@extends('layouts.app')
@section('page-content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-10">
                            <h3 class="panel-title">Manage Locations </h3>
                        </div>
                        <div class="col-md-2" style="text-align: right">
                            <button class="btn btn-primary waves-effect waves-light" data-toggle="modal"
                                    data-target="#create_location_modal">Add New
                            </button>
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
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($items as $key=>$item)
                                    <tr>
                                        <td style="width: 5%">{{++$key}}</td>
                                        <td>{{$item->name}}</td>
                                        <td style="width: 12%;text-align: center">
                                            <a class="edit-link btn btn-primary waves-effect waves-light m-b-5" href="{{route('locations.edit',$item->id)}}">Edit</a>
                                            | <a class="delete-link btn btn-danger waves-effect waves-light m-b-5" href="{{route('locations.destroy',$item->id)}}">Delete</a>
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

        @include('auth::locations.create')
        <!-- Edit Modal-->
        <div id="edit_location_modal" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                $('#edit_location_modal').modal({show: true});
            });
        });
    </script>
@endsection

