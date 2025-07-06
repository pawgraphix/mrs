@extends('layouts.app')
@section('page-content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-9">
                            <h3 class="panel-title">{{$order->description}} - Completion Status</h3>
                        </div>
                        <div class="col-md-3" style="text-align: right">
                            <a class="btn btn-primary waves-effect waves-light" href="{{route('order.index')}}"> <i
                                        class="fa fa-backward"></i> Go Back
                            </a>
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
                                    <th>Completion Stage</th>
                                    <th>Completion Percent</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($items as $key=>$item)
                                    <tr>
                                        <td style="width: 5%">{{++$key}}</td>
                                        <td>{{$item->completionStage->name}}</td>
                                        <td style="text-align: right">{{number_format($item->completionStage->percentage_weight)." %"}}</td>
                                        <td>
                                            <a class="edit-link" href="{{route('completion-status.edit',$item->id)}}">Edit</a>
                                            | <a class="delete-link"
                                                 href="{{route('completion-status.destroy',$item->id)}}">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td></td>
                                    <td>Total</td>
                                    @php
                                        $totalPercent = \Modules\Setup\Entities\OrderCompletionStatus::getCompletionPercent($order->id);
                                    @endphp
                                    <td style="text-align: right">{{number_format($totalPercent)." %"}}</td>
                                    <td></td>
                                </tr>
                                </tfoot>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('setup::OrderCompletionStatus.create')

        <!-- Edit Modal-->
        <div id="edit_OrderCompletionStatus_modal" class="modal fade" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
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
                $('#edit_OrderCompletionStatus_modal').modal({show: true});
            });
        });

        $('#completion_stage_id').select2();

    </script>
@endsection
