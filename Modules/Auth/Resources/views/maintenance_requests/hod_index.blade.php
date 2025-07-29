@extends('layouts.app')
@section('page-content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-10">
                            <h3 class="panel-title">Manage Maintenance Requests </h3>
                        </div>
                        <div class="col-md-2" style="text-align: right">
                            <!-- Buttons Goes Here-->
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
                                    <th>Request Id</th>
                                    <th>Reporter Name</th>
                                    <th>Asset Name</th>
                                    <th>Issue</th>
                                    <th>Location</th>
                                    <th>Reported Time</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($items as $key=>$item)
                                    <tr>
                                        <td style="width: 5%">{{++$key}}</td>
                                        <td style="width: 11%">{{$item->request_id}}</td>
                                        <td style="width: 12%">{{$item->user->first_name." " .$item->user->last_name}}</td>
                                        <td style="width: 12%">{{$item->asset->name}}</td>
                                        <td>{{$item->issue}}</td>
                                        <td>{{$item->location->name}}</td>
                                        <td style="width: 12%">{{$item->reported_at}}</td>
                                        <td style="width: 14%;text-align: center">
                                            <a class="approve-link btn btn-success btn-sm waves-effect waves-light m-b-5" type="button"
                                               href="{{route('maintenance_requests.approve',$item->id)}}">Approve</a> |
                                            <a class="reject-link btn btn-danger btn-sm waves-effect waves-light m-b-5" type="button" href="{{route('maintenance_requests.reject-form',$item->id)}}">Reject</a>
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

        <!-- Edit Modal-->
        <div id="reject_modal" class="modal fade" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content modal-reject">

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

    </div> <!-- End Row -->
@endsection

@section('Scripts')
    <script>
        $('.reject-link').on('click', function (e) {
            e.preventDefault();
            const dataURL = $(this).attr('href');
            $('.modal-reject').load(dataURL, function () {
                $('#reject_modal').modal({show: true});
            });
        });
    </script>
@endsection

