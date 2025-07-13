@extends('layouts.app')
@section('page-content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-10">
                            <h3 class="panel-title">Approved Maintenance Requests </h3>
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
                                    <th>Reporter Name</th>
                                    <th>Asset Name</th>
                                    <th>Issue</th>
                                    <th>Location</th>
                                    <th>Approved At</th>
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
                                        <td>{{$item->reported_at}}</td>
                                        <td style="width: 12%;text-align: center">
                                            @if(!$item->resolved_at)
                                                <a class="approve-link" href="{{route('maintenance_requests.resolve',$item->id)}}">Mark Resolved</a>
                                            @else
                                                <span>No Action</span>
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

        {{--        @include('auth::maintenance_requests.create')--}}
        <!-- Edit Modal-->
        <div id="edit_maintenance_requests_modal" class="modal fade" role="dialog" aria-labelledby="myModalLabel"
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
                $('#edit_maintenance_requests_modal').modal({show: true});
            });
        });
    </script>
@endsection

