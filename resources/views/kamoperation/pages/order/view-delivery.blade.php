@extends('kamoperation.partials.master')

@section('title')
  <title>Manage Order | bdCalling IT Ltd</title>
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Order</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('kamsales.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('kamoperation.order.view') }}">Order</a></li>
              <li class="breadcrumb-item active">Complete Order List</li>

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
                <h3 class="card-title">Complete Order List</h3>
              </div>
              
              <!-- /.card-header -->
                <div class="card-body">
                  <table id="myTable" class="table table-sm table-bordered table-hover table-responsive">
                    <thead>
                    <tr>
                      <th>SL</th>
                      <th>Responsible</th>
                      <th>Account</th>
                      <th>Amount</th>
                      <th>Percentage</th>
                      <th>Platform charge</th>
                      <th>Tips</th>
                      <th>Delivery Amount</th>
                      <th>Client User Id</th>
                      <th>Client Name</th>
                      <th>Client Email</th>
                      <th>Client Linkedin</th>
                      <th>Order Page Url</th>
                      <th>Spreadsheed Link</th>
                      <th>Order Status</th>
                      <th>Delivery Date</th>
                      <th>Team</th>
                      <th>Department</th>
                      <th>Delivered By</th>
                      <th>Remarks</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach($allData as $key=>$value)
                        <tr>
                          <td>{{ $key+1 }}</td>
                          <td>{{ $value->responsible_info->name }}</td>
                          <td>{{ $value->account->account_name }}</td>
                          <td>${{ $value->amount }}</td>
                          <td>{{ $value->percentage }}%</td>
                          <td>${{ $value->platform_charges }}</td>
                          @if($value->tips == null)
                          <td>{{ $value->tips }}</td>
                          @else
                          <td>${{ $value->tips }}</td>
                          @endif                          
                          <td>${{ $value->deli_amount }}</td>
                          <td>{{ $value->client_user_id }}</td>
                          <td>{{ $value->client_name }}</td>
                          <td>{{ $value->client_email }}</td>
                          <td>{{ $value->client_linkedin }}</td>
                          <td>{{ $value->orderpage_url }}</td>
                          <td>{{ $value->spreadsheet_link }}</td>
                          <td>{{ $value->order_status }}</td>
                          <td>{{ date('M j, Y', strtotime($value->deli_date)) }}</td>
                          <td>{{ $value->team->team_name }}</td>
                          <td>{{ $value->department->name }}</td>
                          <td>{{ $value->delivered_by_info->name }}</td>
                          <td>{{ $value->remarks }}</td>
                        </tr>
                      @endforeach
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>SL</th>
                        <th>Responsible</th>
                        <th>Account</th>
                        <th>Amount</th>
                        <th>Percentage</th>
                        <th>Platform charge</th>
                        <th>Tips</th>
                        <th>Delivery Amount</th>
                        <th>Client User Id</th>
                        <th>Client Name</th>
                        <th>Client Email</th>
                        <th>Client Linkedin</th>
                        <th>Order Page Url</th>
                        <th>Spreadsheed Link</th>
                        <th>Order Status</th>
                        <th>Delivery Date</th>
                        <th>Team</th>
                        <th>Department</th>
                        <th>Delivered By</th>
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

            