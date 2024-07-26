@extends('admin.layout.app')
@section('title','Revenue')
<div class="ec-page-wrapper">

    <!-- CONTENT WRAPPER -->
    <div class="ec-content-wrapper">
        <div class="content">
            <div class="breadcrumb-wrapper breadcrumb-contacts">
                <div>
                    <h1>Revenue List</h1>
                    <p class="breadcrumbs"><span><a href="index.html">Home</a></span>
                        <span><i class="mdi mdi-chevron-right"></i></span>Revenue Month
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="ec-vendor-list card card-default">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="responsive-data-table" class="table">
                                    <thead>
                                        <tr>
                                            <th>Month</th>
                                            <th>Revenue</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($monthRevenue as $revenue)
                                        <tr>
                                            <td>{{ $revenue->month }}</td>
                                            <td>{{ number_format($revenue->total, 2) }}</td>
                                            <td><a href="{{ route('admin.revenue.day', ['year' => $revenue->year, 'month' => $revenue->month]) }}">Xem chi tiết</a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End Content -->
    </div> <!-- End Content Wrapper -->

    <!-- Footer -->
    <footer class="footer mt-auto">
        <div class="copyright bg-white">
            <p>
                Copyright &copy; <span id="ec-year"></span><a class="text-primary"
                    href="https://themeforest.net/user/ashishmaraviya" target="_blank"> Ekka Admin
                    Dashboard</a>. All Rights Reserved.
            </p>
        </div>
    </footer>
</div>
@section('content')

@endsection