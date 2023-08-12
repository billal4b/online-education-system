@extends('backend.layouts.template')
@section('main-content')  
    <div class="row">
        <!--flash Message-->
        @include('flash-message')
        <!-- Item -->
        <div class="col-lg-3 col-md-6 col-xs-6">
            <div class="dashboard-stat color-1">
                <div class="dashboard-stat-content"><h4>{{ $activeUser }}</h4> <span>Active Users</span></div>
                <div class="dashboard-stat-icon"><i class="im im-icon-Checked-User"></i></div>
            </div>
        </div>
        <!-- Item -->
        <div class="col-lg-3 col-md-6 col-xs-6">
            <div class="dashboard-stat color-2">
                <div class="dashboard-stat-content"><h4>{{ $totalUser }}</h4> <span>Total User</span></div>
                <div class="dashboard-stat-icon"><i class="im im-icon-Mens"></i></div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-xs-6">
            <div class="dashboard-stat color-3">
                <div class="dashboard-stat-content"><h4>{{ $totalBlog }}</h4> <span>Blog</span></div>
                <div class="dashboard-stat-icon"><i class="im im-icon-Newspaper-2"></i></div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-xs-6">
            <div class="dashboard-stat color-4">
                <div class="dashboard-stat-content"><h4>{{ $totalNotice }}</h4> <span>Notice</span></div>
                <div class="dashboard-stat-icon"><i class="im im-icon-Notepad"></i></div>
            </div>
        </div>
    </div>
@endsection
    