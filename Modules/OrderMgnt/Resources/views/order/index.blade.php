@extends('layouts.app')
@section('page-content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-10">
                            <h3 class="panel-title">Manage Orders </h3>
                        </div>
                        <div class="col-md-2" style="text-align: right">
                            <button class="btn btn-primary waves-effect waves-light" data-toggle="modal"
                                    data-target="#create_role_modal">Add New
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
                                    <th>Customer Name</th>
                                    <th>Cloth Type</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Advance Payment</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($items as $key=>$item)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$item->customer->name}}</td>
                                        <td>{{$item->clothType->name}}</td>
                                        <td>{{$item->description}}</td>
                                        <td>{{$item->price}}</td>
                                        <td>{{$item->advance_payment}}</td>
                                        <td>
                                            <a class="edit-link" href="{{route('order.edit',$item->id)}}">Edit</a>|
                                            <a class="delete-link" href="{{route('order.destroy',$item->id)}}">Delete</a>
                                            | <a href="{{route('completion-status.index',$item->id)}}">Status</a>
                                            | <a href="{{route('order.approve',$item->id)}}">Approve</a>
                                            | <a class="assign" href="{{route('order.assign_tailor-view',$item->id)}}">Assign</a>
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

        @include('ordermgnt::order.create')

        <!-- Edit Modal-->
        <div id="edit_order_modal" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content modal-edit">

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <!-- Assign Role Modal-->
        <div id="assign_order_modal" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content modal-assign">

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
                $('#edit_order_modal').modal({show: true});
            });
        });

        $('.assign').on('click', function (e) {
            e.preventDefault();
            const dataURL = $(this).attr('href');
            $('.modal-assign').load(dataURL, function () {
                $('#assign_order_modal').modal({show: true});
            });
        });

        $('#edit_order_modal').on('shown.bs.modal', function () {
            $('.dd_select').select2();
        })

       $('#assign_order_modal').on('shown.bs.modal', function () {
            $('.dd_select').select2();
        })

        $('#cloth_type_id').select2();
        $('#customer_id').select2();

    </script>
@endsection
