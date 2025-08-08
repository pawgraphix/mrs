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

    {{-- Stats Cards --}}
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
                    <span class="counter">{{ $submitted }}</span>
                    Submitted Requests
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-3">
            <div class="mini-stat clearfix bx-shadow">
                <span class="mini-stat-icon bg-info"><i class="fa fa-wrench"></i></span>
                <div class="mini-stat-info text-right text-muted">
                    <span class="counter">{{ $resolvedIssues }}</span>
                    Resolved Issues
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-3">
            <div class="mini-stat clearfix bx-shadow">
                <span class="mini-stat-icon bg-success"><i class="fa fa-archive"></i></span>
                <div class="mini-stat-info text-right text-muted">
                    <span class="counter">{{ $closedIssues }}</span>
                    Closed Issues
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-3">
            <div class="mini-stat clearfix bx-shadow">
                <span class="mini-stat-icon bg-success"><i class="fa fa-check"></i></span>
                <div class="mini-stat-info text-right text-muted">
                    <span class="counter">{{ $approvedIssues }}</span>
                    Approved Issues
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-3">
            <div class="mini-stat clearfix bx-shadow">
                <span class="mini-stat-icon bg-danger"><i class="fa fa-times"></i></span>
                <div class="mini-stat-info text-right text-muted">
                    <span class="counter">{{ $rejectedIssues }}</span>
                    Rejected Issues
                </div>
            </div>
        </div>
    </div>

@endsection
