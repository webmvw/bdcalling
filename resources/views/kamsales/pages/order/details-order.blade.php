@extends('kamsales.partials.master')

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
                <h3 class="card-title">Order Details</h3>
                <a href="{{ route('order.view') }}" class="btn btn-success btn-sm"><i class="fa fa-plus-circle"></i> Order List</a>
              </div>

              <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-sm table-striped table-bordered table-hover table-responsive">
                    <tbody>
                      <tr>
                        <td>Responsible</td>
                        <td>{{ $getOrder->responsible_info->name }}</td>
                      </tr>
                      <tr>
                        <td>Account</td>
                        <td>{{ $getOrder->account->account_name }}</td>
                      </tr>
                      <tr>
                        <td>Ammount</td>
                        <td>${{ $getOrder->amount }}</td>
                      </tr>
                      <tr>
                        <td>Inc Date</td>
                        <td>{{ date('M j, Y', strtotime($getOrder->inc_date)) }}</td>
                      </tr>
                      <tr>
                        <td>Percentage</td>
                        <td>{{ $getOrder->percentage }}%</td>
                      </tr>
                      <tr>
                        <td>Plateform Charge</td>
                        <td>${{ $getOrder->platform_charges }}</td>
                      </tr>
                      <tr>
                        <td>Delivery Amount</td>
                        <td>${{ $getOrder->deli_amount }}</td>
                      </tr>
                      <tr>
                        <td>Delivery Last Date</td>
                        <td>{{ date('M j, Y', strtotime($getOrder->deli_last_time)) }}</td>
                      </tr>
                      <tr>
                        <td>Client Name</td>
                        <td>{{ $getOrder->client_name }}</td>
                      </tr>
                      <tr>
                        <td>Client User Id</td>
                        <td>{{ $getOrder->client_user_id }}</td>
                      </tr>
                      <tr>
                        <td>Client Email</td>
                        <td>{{ $getOrder->client_email }}</td>
                      </tr>
                      <tr>
                        <td>Client Linkedin Profile</td>
                        <td>{{ $getOrder->client_linkedin }}</td>
                      </tr>
                      <tr>
                        <td>Order Page Url</td>
                        <td>{{ $getOrder->orderpage_url }}</td>
                      </tr>
                      <tr>
                        <td>Spreadsheet Link</td>
                        <td>{{ $getOrder->spreadsheet_link }}</td>
                      </tr>
                      <tr>
                        <td>Status</td>
                        <td>{{ $getOrder->order_status }}</td>
                      </tr>
                      <tr>
                        <td>Team</td>
                        <td>
                          @if($getOrder->team_id != null)
                          {{ $getOrder->team->team_name }}
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <td>Department</td>
                        <td>
                          @if($getOrder->department_id != null)
                          {{ $getOrder->department->name }}
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <td>Coundown time</td>
                        <td>
                            <?php
                            $deli_dateline = new DateTime($getOrder->deli_last_time);
                            $today = new DateTime(date('Y-m-d'));

                            $interval = $today->diff($deli_dateline);
                            if($getOrder->order_status == "Delivered"){
                              echo "done project";
                            }elseif($getOrder->order_status == "Revision"){
                              echo "Urgent Revision";
                            }elseif($getOrder->order_status == "Cancalled"){
                              echo "Cancalled";
                            }else{
                              $day = $interval->format("%R%a");
                              if($day <= 2 and $day >= 1){
                                echo $interval->format("%a days ").$interval->h.":".$interval->i.":".$interval->s;
                              }elseif($day <= 0){
                                echo "<span style='color:red'>Late Order</span>";
                              }elseif($day <= 0 and $getOrder->order_status == "Revision"){
                                echo "<span style='color:red'>Revision and Late Order</span>";
                              }else{
                                echo $day = $interval->format("%a days");
                              }
                            }
                            ?>
                          </td>
                      </tr>
                      <tr>
                        <td>Remarks</td>
                        <td>{{ $getOrder->remarks }}</td>
                      </tr>
                    </tbody>
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

