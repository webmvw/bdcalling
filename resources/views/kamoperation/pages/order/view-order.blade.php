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
              </div>

              <!-- /.card-header -->
                <div class="card-body">
                  <table id="myTable" class="table table-sm table-bordered table-hover table-responsive">
                    <thead>
                    <tr>
                      <th>SL</th>
                      <th>Inc. Date</th>
                      <th>Responsible</th>
                      <th>Account</th>
                      <th>Amount</th>
                      <th>Platform charge</th>
                      <th>Delivery Amount</th>
                      <th>Client Name</th>
                      <th>Spreadsheet Link</th>
                      <th>Order Status</th>
                      <th>Team</th>
                      <th>Department</th>
                      <th>Delivery Date</th>
                      <th>Coundown</th>
                      <th>Remarks</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach($allData as $key=>$value)
                        <tr>
                          <td>{{ $key+1 }}</td>
                          <td>{{ date('M j, Y', strtotime($value->inc_date)) }}</td>
                          <td>{{ $value->responsible_info->name }}</td>
                          <td>{{ $value->account->account_name }}</td>
                          <td>${{ $value->amount }}</td>
                          <td>${{ $value->platform_charges }}</td>
                          <td>${{ $value->deli_amount }}</td>
                          <td>{{ $value->client_name }}</td>
                          <td>{{ $value->spreadsheet_link }}</td>
                          <td>{{ $value->order_status }}</td>
                          <td>
                            @if($value->team_id != null)
                            {{ $value->team->team_name }}
                            @endif
                          </td>
                          <td>
                            @if($value->department_id != null)
                            {{ $value->department->name }}
                            @endif
                          </td>
                          <td>{{ date('M j, Y', strtotime($value->deli_last_time)) }}</td>
                          <td>
                            <?php
                            $deli_dateline = new DateTime($value->deli_last_time);
                            $today = new DateTime(date('Y-m-d'));

                            $interval = $today->diff($deli_dateline);
                            if($value->order_status == "Delivered"){
                              echo "done project";
                            }elseif($value->order_status == "Revision"){
                              echo "Urgent Revision";
                            }elseif($value->order_status == "Cancalled"){
                              echo "Cancalled";
                            }else{
                              $day = $interval->format("%R%a");
                              if($day <= 2 and $day >= 1){
                                echo $interval->format("%a days ").$interval->h.":".$interval->i.":".$interval->s;
                              }if($day <= 0){
                                echo "<span style='color:red'>Late Order</span>";
                              }elseif($day <= 0 and $value->order_status == "Revision"){
                                echo "<span style='color:red'>Revision and Late Order</span>";
                              }else{
                                echo $day = $interval->format("%a days");
                              }
                            }
                            ?>
                          </td>
                           <td>{{ $value->remarks }}</td>
                          <td>
                            <a href="{{ route('kamoperation.order.delivery', $value->id) }}" class="btn btn-sm btn-success">Delivery</a>
                            <a href="{{ route('kamoperation.order.status', $value->id) }}" class="btn btn-sm btn-warning">Status</a>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>SL</th>
                        <th>Inc. Date</th>
                        <th>Responsible</th>
                        <th>Account</th>
                        <th>Amount</th>
                        <th>Platform charge</th>
                        <th>Delivery Amount</th>
                        <th>Client Name</th>
                        <th>Spreadsheet Link</th>
                        <th>Order Status</th>
                        <th>Team</th>
                        <th>Department</th>
                        <th>Delivery Date</th>
                        <th>Coundown</th>
                        <th>Remarks</th>
                        <th>Action</th>
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

