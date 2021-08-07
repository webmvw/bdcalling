
@extends('owner.partials.master')

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
                            <li class="breadcrumb-item"><a href="{{ route('owner.dashboard') }}">Home</a></li>
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
                                <a href="{{ route('owner.delivery.view') }}" class="btn btn-success btn-sm"><i class="fa fa-plus-circle"></i> Delivery List</a>


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

                                <table id="example1" class="table table-sm table-bordered table-hover table-responsive">
                                    <thead>
                                    <tr>
                                      <th>SL</th>
                                      <th>Responsible</th>
                                      <th>ID No</th>
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
                                      <th>Delivered By</th>
                                      <th>Remarks</th>
                                      <th>Coundown Timer</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($result as $key=>$value)
                                        <tr>
                                          <td>{{ $key+1 }}</td>
                                          <td>{{ $value->responsible_info->name }}</td>
                                          <td>{{ $value->responsible_info->id_no }}</td>
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
                                          <td>{{ date('Y-m-d H:i:s', strtotime($value->deli_last_time)) }}</td>
                                          <td>{{ $value->team->team_name }}</td>
                                          <td>{{ $value->delivered_by_info->name }}</td>
                                          <td>{{ $value->remarks }}</td>
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
                                        <th>Delivered By</th>
                                        <th>Remarks</th>
                                        <th>Coundown Timer</th>
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
