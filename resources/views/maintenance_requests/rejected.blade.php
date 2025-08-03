@extends('layouts.app')
@section('page-content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-10">
                            <h3 class="panel-title">Rejected Maintenance Requests </h3>
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
                                    <th>Rejected At</th>
                                    <th>Rejected By</th>
                                    <th>Reject Comment</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($items as $key=>$item)
                                    <tr>
                                        <td style="width: 5%">{{++$key}}</td>
                                        <td>{{$item->request_id}}</td>
                                        <td>{{$item->user->first_name." " .$item->user->last_name}}</td>
                                        <td>{{$item->asset->name}}</td>
                                        <td>{{$item->issue}}</td>
                                        <td>{{$item->location->name}}</td>
                                        <td>{{$item->reviewed_at}}</td>
                                        <td>{{$item->reviewer->full_name}}</td>
                                        <td>{{$item->reject_comment}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- End Row -->
@endsection


