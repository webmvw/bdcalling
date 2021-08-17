@extends('superadmin.partials.master')

@section('title')
  <title>bdCalling it ltd | Dashboard</title>
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>150</h3>

                <p>New Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Bounce Rate</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">


          <div class="col-md-6 col-lg-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Today Order Report</h3>
              </div>
              <div class="card-body">
                <table id="myTable" class="table table-striped table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>SL</th>
                      <th>Franchise</th>
                      <th>Total Order</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                    $grand_total_order = 0;
                    $all_franchise = App\Models\Franchise::all();
                    @endphp
                    @foreach($all_franchise as $key=>$value)
                    <tr>
                      <td>{{ $key+1 }}</td>
                      <td>{{ $value->username }}</td>
                      <td>
                        <?php
                        $franchise_id = $value->id;
                        $today = new DateTime(date('Y-m-d'));
                        $total_order = App\Models\OrderDeliver::where('franchise_id', $franchise_id)->where('inc_date', $today)->sum('amount');
                        echo '$'.$total_order.'/=';
                        $grand_total_order = $grand_total_order+$total_order;
                        ?>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                      <th style="text-align: right;" colspan="2">Total</th>
                      <th style="background: #D8FDBA">${{ $grand_total_order }}/=</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <div class="card-footer"></div>
            </div>
          </div>

          <div class="col-md-6 col-lg-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Today Delivery Report</h3>
              </div>
              <div class="card-body">
                <table id="myTable2" class="table table-striped table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>SL</th>
                      <th>Franchise</th>
                      <th>Total Delivery</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                    $grand_total_delivery = 0;
                    $all_franchise = App\Models\Franchise::all();
                    @endphp
                    @foreach($all_franchise as $key=>$value)
                    <tr>
                      <td>{{ $key+1 }}</td>
                      <td>{{ $value->username }}</td>
                      <td>
                        <?php
                        $franchise_id = $value->id;
                        $today = new DateTime(date('Y-m-d'));
                        $total_order = App\Models\OrderDeliver::where('franchise_id', $franchise_id)->where('deli_date', $today)->sum('deli_amount');
                        echo '$'.$total_order;
                        $grand_total_delivery = $grand_total_delivery+$total_order;
                        ?>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                      <th style="text-align: right;" colspan="2">Total</th>
                      <th style="background: #D8FDBA">${{ $grand_total_delivery }}/=</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <div class="card-footer"></div>
            </div>
          </div>


        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection