@extends('kamsales.partials.master')

@section('title')
    <title>Order List | bdCalling it ltd</title>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Manage Order List</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('kamsales.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Order</li>
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
                                <h3 class="card-title">Order List</h3>
                                <a href="{{ route('order.add') }}" class="btn btn-success btn-sm"><i class="fa fa-plus-circle"></i> Add Order</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="myTable" class="table table-bordered table-hover table-responsive">
                                    <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Responsible</th>
                                        <th>ID No</th>
                                        <th>inc_data</th>
                                        <th>Account</th>
                                        <th>Amount</th>
                                        <th>Percentage</th>
                                        <th>Platform Charges </th>
                                        <th>client User Id</th>
                                        <th>Client Name</th>
                                        <th>Email Address</th>
                                        <th>Client LinkedIn</th>
                                        <th>Order Page Url</th>
                                        <th>Spreadsheet Link</th>
                                        <th>Remarks</th>
                                        <th>Delivery Amount</th>
                                        <th>Delivery DeedLine</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($kam_data as $key=>$value)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $value->responsible->name }}</td>
                                            <td>{{ $value->responsible->id_no }}</td>
                                            <td>{{ $value->inc_data }}</td>
                                            <td>{{ $value->account_table->account_name }}</td>
                                            <td>{{ $value->amount }}</td>
                                            <td>{{ $value->percentage }}%</td>
                                            <td>{{ $value->charges_platform }}</td>
                                            <td>{{ $value->client_user_id }}</td>
                                            <td>{{ $value->client_name }}</td>
                                            <td>{{ $value->email_address }}</td>
                                            <td>{{ $value->client_linkedIn }}</td>
                                            <td>{{ $value->order_page_url }}</td>
                                            <td>{{ $value->spreadsheet_link }}</td>
                                            <td>{{ $value->remarks }}</td>
                                            <td>{{ $value->deli_amount }}</td>
                                            <td>{{ $value->Deli_DeedLine }}</td>


                                        </tr>
                                    @endforeach

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>SL</th>
                                            <th>Responsible</th>
                                            <th>ID No</th>
                                            <th>inc_data</th>
                                            <th>Account</th>
                                            <th>Amount</th>
                                            <th>Percentage</th>
                                            <th> Platform Charges </th>
                                            <th>client User Id</th>
                                            <th>Client Name</th>
                                            <th>Email Address</th>
                                            <th>Client LinkedIn</th>
                                            <th>Order Page Url</th>
                                            <th>Spreadsheet Link</th>
                                            <th>Remarks</th>
                                            <th>Delivery Amount</th>
                                            <th>Delivery DeedLine</th>
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

