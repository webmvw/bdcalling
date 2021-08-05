
@extends('superadmin.partials.master')

@section('title')
    <title>Manage Delivery Report | bdCalling IT Ltd</title>
@endsection

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Manage Delivery Report</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Delivery Report</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Main row -->
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h3 class="card-title">Delivery  List</h3>
                                <a href="{{ route('delivery.view') }}" class="btn btn-success btn-sm"><i class="fa fa-plus-circle"></i> Delivery List</a>


                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-6 col-lg-6 col-sm-6 offset-3">
                                        <table id="report" class="table table-bordered mb-5">
                                            <thead>

                                            <tr>
                                                <th>Date/Status</th>
                                                <th>Total Amount</th>
                                                <th>Total Platform charge</th>
                                                <th>Total Delivery Amount</th>
                                            </tr>

                                            </thead>
                                            <tbody>

                                            <tr>
                                                <td> {{$Convert}}</td>
                                                <td>$ {{$Total_amount}}</td>

                                                <td>$ {{$Total_Platform_charge}}</td>
                                                <td>${{$deli_amount}}</td>

                                            </tr>
                                            </tbody>

                                        </table>
                                    </div>
                                </div>


                                <span class="btn btn-success btn-sm mb-3">Report -> <strong>{{$Convert}}</strong></span>
                                <table id="#example2" class="table table-sm table-bordered table-hover table-responsive">

                                    <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Responsible</th>
                                        <th>ID No</th>
                                        <th>Account</th>
                                        <th>Amount</th>
                                        <th>Percentage</th>
                                        <th>Platform charge</th>
                                        <th>Delivery Amount</th>
                                        <th>Client User Id</th>
                                        <th>Client Name</th>
                                        <th>Client Email</th>
                                        <th>Client Linkedin</th>
                                        <th>Order Page Url</th>
                                        <th>Spreadsheed Link</th>
                                        <th>Order Status</th>
                                        <th>Delivery Date</th>
                                        <th>Remarks</th>
                                    </tr>
                                    </thead>
                                    <tbody id="getData">




                                    @foreach($result as $key=>$value)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $value->responsible_info->name }}</td>
                                            <td>{{ $value->responsible_info->id_no }}</td>
                                            <td>{{ $value->account->account_name }}</td>
                                            <td>${{ $value->amount }}</td>
                                            <td>{{ $value->percentage }}%</td>
                                            <td>${{ $value->platform_charges }}</td>
                                            <td>${{ $value->deli_amount }}</td>
                                            <td>{{ $value->client_user_id }}</td>
                                            <td>{{ $value->client_name }}</td>
                                            <td>{{ $value->client_email }}</td>
                                            <td>{{ $value->client_linkedin }}</td>
                                            <td>{{ $value->orderpage_url }}</td>
                                            <td>{{ $value->spreadsheet_link }}</td>
                                            <td>{{ $value->order_status }}</td>
                                            <td>{{ date('Y-m-d H:i:s', strtotime($value->deli_last_time)) }}</td>
                                            <td>{{ $value->remarks }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>SL</th>
                                        <th>Responsible</th>
                                        <th>ID No</th>
                                        <th>Account</th>
                                        <th>Amount</th>
                                        <th>Percentage</th>
                                        <th>Platform charge</th>
                                        <th>Delivery Amount</th>
                                        <th>Client User Id</th>
                                        <th>Client Name</th>
                                        <th>Client Email</th>
                                        <th>Client Linkedin</th>
                                        <th>Order Page Url</th>
                                        <th>Spreadsheed Link</th>
                                        <th>Order Status</th>
                                        <th>Delivery Date</th>
                                        <th>Remarks</th>
                                    </tr>

                                    </tfoot>
                                </table>

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer"></div>
                        </div>
                    </div>

                </div><!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection


@section('script')

    <script>
        $("#report").DataTable({
            dom: 'Bfrtip',
            "searching": false,
            "paging":   false,
            "ordering": false,
            "info":     false,
            buttons: [

                'print','pdf','excel'


            ]


        });
    </script>


@endsection

