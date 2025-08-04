@extends('layouts.app')
@section('page-content')

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row" style="padding: 5px">
                            <form method="POST" action="{{route('rp-maintenance')}}" autocomplete="off">
                                @csrf
                                <div class="row">

                                    <div class="form-group col-md-3">
                                        <label for="department_id">Department</label>
                                        <select class="form-group" id="department_id" name="department_id" required
                                                style="width: 100%">
                                            <option>---Select---</option>
                                            <option value="{{null}}">All Departments</option>
                                            @foreach($departments as $department)
                                                <option value="{{$department->id}}">{{$department->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="status">Status</label>
                                        <select class="form-group" id="status" name="status" style="width: 100%">
                                            <option value="{{null}}">---Select---</option>
                                            @foreach($status as $st)
                                                <option value="{{$st}}">{{$st}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <button type="submit" class="btn btn-primary" style="margin-top: 3vh"><i class="fa fa-search"></i> Search</button>
                                    </div>

{{--                                    <div class="col-xs-2 col-sm-2 col-md-2">--}}
{{--                                        <div class="mb-10">--}}
{{--                                            <div class="btn-group">--}}
{{--                                                <button type="submit" class="btn btn-primary"><i--}}
{{--                                                            class="fa fa-search"></i> Search--}}
{{--                                                </button>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @if($is_post_back)
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-10">
                                <h3 class="panel-title">Maintenance Report </h3>
                            </div>
                            <div class="col-md-2" style="text-align: right">
                                <a href="{{route('rp-maintenance-excel')}}" class="btn btn-primary waves-effect waves-light"><i class="fa fa-download"></i> Excel</a>
                                <a href="{{route('rp-maintenance-pdf')}}" class="btn btn-primary waves-effect waves-light"><i class="fa fa-download"></i> PDF</a>
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
                                        {{--                                    <th>Reporter Name</th>--}}
                                        <th style="width: 10%;text-align: center">Asset Name</th>
                                        <th>Location</th>
                                        <th>Issue</th>
                                        <th>Status</th>
                                        <th style="width: 12%;text-align: center">Reported Time</th>
                                        <th style="width: 12%;text-align: center">Resolved Time</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($items as $key=>$item)
                                        <tr>
                                            <td style="width: 5%">{{++$key}}</td>
                                            {{--                                        <td>{{$item->user->full_name}}</td>--}}
                                            <td>{{$item->asset->name}}</td>
                                            <td>{{$item->location->name}}</td>
                                            <td>{{$item->issue}}</td>
                                            <td>{{$item->status}}</td>
                                            <td>{{$item->reported_at}}</td>
                                            {{--                                        <td>{{$item->resolved_at}}</td>--}}

                                            @if($item->resolved_at)
                                                <td>{{$item->resolved_at}}</td>
                                            @else
                                                <td>Not yet Resolved</td>
                                            @endif
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    @endif
@endsection

