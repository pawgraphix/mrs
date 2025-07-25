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
                            <button class="btn btn-primary waves-effect waves-light" data-toggle="modal"
                                    data-target="#create_maintenance_requests_modal">Add New
                            </button>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <table id="datatable" class="table table-striped table-condensed table-bordered">
                                <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Reporter Name</th>
                                    <th>Asset Name</th>
                                    <th>Issue</th>
                                    <th>Location</th>
                                    <th>Status</th>
                                    <th>Reported Time</th>
                                    <th>Resolved Time</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($items as $key=>$item)
                                    <tr>
                                        <td style="width: 5%">{{++$key}}</td>
                                        <td>{{$item->user->first_name." " .$item->user->last_name}}</td>
                                        <td>{{$item->asset->name}}</td>
                                        <td>{{$item->issue}}</td>
                                        <td>{{$item->location->name}}</td>
                                        <td>{{$item->status}}</td>
                                        <td>{{$item->reported_at}}</td>
                                        <td>{{$item->resolved_at}}</td>
                                        <td style="width: 16%;text-align: center">
                                            @if(!$item->submitted_at)
                                                <a class="edit-link" href="{{route('maintenance_requests.edit',$item->id)}}">Edit</a>
                                                | <a class="delete-link" href="{{route('maintenance_requests.destroy',$item->id)}}">Delete</a>  |
                                                <a class="submit-link" href="{{route('maintenance_requests.submit',$item->id)}}">Submit</a>
                                            @endif
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

        @include('auth::maintenance_requests.create')
        <!-- Edit Modal-->
        <div id="edit_maintenance_requests_modal" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                $('#edit_maintenance_requests_modal').modal({show: true});
            });
        });
    </script>
@endsection

