@extends('owner.partials.master')

@section('title')
  <title>Order Report | bdCalling IT Ltd</title>
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Order Report</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('owner.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Order Report</li>
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
              <div class="card-body">
                 @include('owner.partials.message')
                <form id="quickForm" action="{{ route('owner.franchiseWiseOrderReportRequest') }}" method="post">
                  @csrf
                  <div class="row">
                    <div class="col-md-3 col-lg-3">
                      <div class="form-group">
                        <label for="franchise" class="form-control-sm">Franchise</label>
                        <select class="form-control form-control-sm select2" name="franchise" id="franchise">
                          <option value="">Select Franchise</option>
                          @foreach($franchises as $key=>$value)
                          <option value="{{ $value->id }}" {{($value->id==$franchise_id)?'selected':''}}>{{ $value->username }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3 col-lg-3">
                      <div class="form-group">
                        <label for="start_date" class="form-control-sm">Start date</label>
                        <input type="date" value="{{ $start_date }}" id="start_date" name="start_date" class="form-control form-control-sm">
                      </div>
                    </div>
                    <div class="col-md-3 col-lg-3">
                      <div class="form-group">
                        <label for="end_date" class="form-control-sm">End date</label>
                        <input type="date" value="{{ $end_date }}" id="end_date" name="end_date" class="form-control form-control-sm">
                      </div>
                    </div>
                    <div class="col-md-3 col-lg-3">
                      <button type="submit" style="margin-top:39px;" class="btn btn-sm btn-success">Search</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>

            <div class="card">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title">Franchise Wise Order Report</h3>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>SL</th>
                      <th>Date</th>
                      <th>Amount</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php $total_order = 0; @endphp
                        @foreach($getReport as $key=>$value)
                        <tr>
                          <td>{{ $key+1 }}</td>
                          <td>{{ date('j M, Y', strtotime($value->inc_date)) }}</td>
                          <td>${{ $value->deli_amount }}/=</td>
                        </tr>
                          <?php
                          $amount = $value->deli_amount;
                          $total_order = $total_order+$amount;
                          ?>
                        @endforeach
                    </tbody>
                    <tfoot>
                      <tr>
                        <th style="text-align: right;" colspan="2">Grand Total</th>
                        <th style="background: #D8FDBA">${{ $total_order }}/=</th>
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


<script>
$(function () {
  $('#quickForm').validate({
    rules: {
      franchise: {
        required: true,
      },
      start_date: {
        required: true,
      },
      end_date: {
        required: true,
      },
    },
    messages: {
      franchise: {
        required: "Please select franchise",
      },
      start_date: {
        required: "Please select Start Date",
      },
      end_date: {
        required: "Please select end date",
      },
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>



@endsection

