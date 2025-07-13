@extends('layouts.app')
@section('page-content')

    <div class="row">
        <div class="col-sm-12">
            <h4 class="pull-left page-title">Welcome !</h4>
            <ol class="breadcrumb pull-right">
                <li><a href="#">Maintenance Reporting System</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </div>
    </div>


    <div class="row">
        <div class="col-md-6 col-sm-6 col-lg-3">
            <div class="mini-stat clearfix bx-shadow">
                <span class="mini-stat-icon bg-info"><i class="ion-clipboard"></i></span>
                <div class="mini-stat-info text-right text-muted">
                    <span class="counter">{{ $totalIssues }}</span>
                    Total Issue Reported
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-3">
            <div class="mini-stat clearfix bx-shadow">
                <span class="mini-stat-icon bg-warning"><i class="fa fa-clock-o"></i></span>
                <div class="mini-stat-info text-right text-muted">
                    <span class="counter">{{ $pendingIssues }}</span>
                    Pending Issues
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-3">
            <div class="mini-stat clearfix bx-shadow">
                <span class="mini-stat-icon bg-pink"><i class="ion-loop"></i></span>
                <div class="mini-stat-info text-right text-muted">
                    <span class="counter">{{ $inProgressIssues }}</span>
                    Issues In Progress
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-3">
            <div class="mini-stat clearfix bx-shadow">
                <span class="mini-stat-icon bg-success"><i class="fa fa-check"></i></span>
                <div class="mini-stat-info text-right text-muted">
                    <span class="counter">{{ $resolvedIssues }}</span>
                    Resolved Issues
                </div>
            </div>
        </div>
    </div> <!-- End row-->

    {{-- Report New Issue Button --}}
    <div class="row m-t-20">
        <div class="col-md-12 text-center">
            <a href="{{ route('maintenance_requests.index') }}" class="btn btn-primary btn-lg">
                Report New Issue
            </a>
        </div>
    </div>

    {{-- Status Pie Chart --}}
    <div class="row m-t-30">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Issue Status Overview</div>
                <div class="panel-body">
                    <canvas id="issueStatusChart" height="180"></canvas>
                </div>
            </div>
        </div>

        {{-- Latest Notifications --}}
        <!---  <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">🔔 Latest Notifications</div>
                <div class="panel-body">
                    <ul class="list-group">

                    </ul>
                </div>
            </div>
        </div>--->
    </div>

    {{-- Recent Activity Timeline --}}
    <div class="row m-t-20">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Recent Activity Timeline</div>
                <div class="panel-body">
                    <ul class="timeline">
                        @foreach($recentActivities as $activity)
                            <li>
                                <div class="timeline-badge"><i class="ion-alert"></i></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h5 class="timeline-title">{{ $activity->title }}</h5>
                                        <p><small class="text-muted"><i class="ion-clock"></i> {{ $activity->created_at->diffForHumans() }}</small></p>
                                    </div>
                                    <div class="timeline-body">
                                        <p>{{ $activity->description }}</p>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

