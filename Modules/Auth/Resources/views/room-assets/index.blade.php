@extends('layouts.app')
@section('page-content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-10">
                            <h3 class="panel-title">Manage Assets </h3>
                        </div>
                        <div class="col-md-2" style="text-align: right">
                            <button class="btn btn-primary waves-effect waves-light" data-toggle="modal"
                                    data-target="#create_assets_modal">Add New
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
                                    <th>Location</th>
                                    <th>Registration No.</th>
                                    <th>Purchased Year</th>
                                    <th>Department</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($items as $key=>$item)
                                    <tr>
                                        <td style="width: 5%">{{++$key}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->location->name}}</td>
                                        <td>{{$item->registration_number}}</td>
                                        <td>{{$item->year_of_purchase}}</td>
                                        <td>{{$item->department->name}}</td>
                                        <td>{{$item->assetCategory->name}}</td>
                                        <td style="width: 12%;text-align: center">
                                            <a class="edit-link btn btn-primary waves-effect waves-light m-b-5" href="{{route('room-assets.edit',$item->id)}}">Edit</a>
                                            | <a class="delete-link btn btn-danger waves-effect waves-light m-b-5" href="{{route('room-assets.destroy',$item->id)}}">Delete</a>
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

        @include('auth::room-assets.create')
        <!-- Edit Modal-->
        <div id="edit_modal" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                $('#edit_modal').modal({show: true});
            });
        });

        // $('#edit_modal').on('shown.bs.modal',function(){
        //     $('.dd_select').select2();
        // });
        $('#edit_modal').on('shown.bs.modal', function (e) {
            $('select').select2();
        });
    </script>
@endsection

