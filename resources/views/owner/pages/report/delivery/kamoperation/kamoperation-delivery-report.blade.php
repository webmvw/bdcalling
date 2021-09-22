@extends('owner.partials.master')

@section('title')
  <title>KAM Operation Delivery Report | bdCalling IT Ltd</title>
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
              <li class="breadcrumb-item active">Kam Operation Delivery Report</li>
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
                <form id="quickForm" action="{{ route('owner.kamoperationDeliveryReportRequest') }}" method="post">
                  @csrf
                  <div class="row">
                    <div class="col-md-3 col-lg-3">
                      <div class="form-group">
                        <label for="franchise" class="form-control-sm">Franchise</label>
                        <select class="form-control form-control-sm select2" name="franchise" id="franchise">
                          <option value="">Select Franchise</option>
                          <option value="all" {{($select_franchise == 'all')?'selected':''}}>All</option>
                          @foreach($franchises as $key=>$value)
                          <option value="{{ $value->id }}">{{ $value->username }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3 col-lg-3">
                      <div class="form-group">
                        <label for="year" class="form-control-sm">Year</label>
                        <select class="form-control form-control-sm select2" id="year" name="year">
                          <option value="">Select Year</option>
                          @for($i=$first_year; $i<=$last_year; $i++)
                          <option value="{{$i}}" {{($year == $i)? 'selected':''}}>{{$i}}</option>
                          @endfor
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3 col-lg-3">
                      <div class="form-group">
                        <label for="month" class="form-control-sm">Month</label>
                        <select class="form-control form-control-sm select2" name="month" id="month">
                          <option value="">Select Month</option>
                          <option value="01" {{($month == '01')?'selected':''}}>January</option>
                          <option value="02" {{($month == '02')?'selected':''}}>February</option>
                          <option value="03" {{($month == '03')?'selected':''}}>March</option>
                          <option value="04" {{($month == '04')?'selected':''}}>April</option>
                          <option value="05" {{($month == '05')?'selected':''}}>May</option>
                          <option value="06" {{($month == '06')?'selected':''}}>June</option>
                          <option value="07" {{($month == '07')?'selected':''}}>July</option>
                          <option value="08" {{($month == '08')?'selected':''}}>August</option>
                          <option value="09" {{($month == '09')?'selected':''}}>September</option>
                          <option value="10" {{($month == '10')?'selected':''}}>October</option>
                          <option value="11" {{($month == '11')?'selected':''}}>November</option>
                          <option value="12" {{($month == '12')?'selected':''}}>December</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3 col-lg-3">
                      <button type="submit" name="search" style="margin-top:39px;" class="btn btn-sm btn-success">Search</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>

            <div class="card">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title">KAM Operation Delivery Report</h3>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                  <table class="table table-hover table-stripped table-sm table-bordered table-responsive">
                    
                    
                    <thead id="ttal" class="table-success">
                      <tr class="throw">
                        <th></th>
                        <th>Total</th>
                        <th class="totalDeliveryAmount"></th>
                        @foreach($getKamOperationDelivery as $key=>$value)
                        <th class="deliveryAmount"></th>
                        @endforeach
                      </tr>
                    </thead>

                    <thead class="table-info">
                      <tr>
                        <th>Franchise</th>
                        <th>Name</th>
                        <th>Total</th>
                        @foreach($getKamOperationDelivery as $key=>$value)
                        <th>{{ date('d/m/y', strtotime($value->deli_date)) }}</th>
                        @endforeach
                      </tr>
                    </thead>

                    <tbody id="table">
                      
                      <?php 
                      $getKamOperations = App\Models\OrderDeliver::select('delivered_by', 'franchise_id')->whereYear('deli_date', $year)->whereMonth('deli_date', $month)->where('order_status', 'Delivered')->groupBy('franchise_id')->groupBy('delivered_by')->with('delivered_by_info', 'franchise')->get();
                      ?>

                      @foreach($getKamOperations as $key=>$value)
                      <tr class="tablerow">
                        <td>{{ $value->franchise->username }}</td>
                        <td>{{ $value->delivered_by_info->name }}</td>
                        <td class="totalDeliveryAmount"></td>

                        <?php $delivered_by_id = $value->delivered_by; ?>
                        @foreach($getKamOperationDelivery as $key=>$value)
                          <td class="deliveryAmount">
                            <?php
                            $fix_day = $value->deli_date;
                            $getKamOperationDeliveryAmount = App\Models\OrderDeliver::select(DB::raw('sum(deli_amount) as deli_amount'), 'deli_date')->whereYear('deli_date', $year)->whereMonth('deli_date', $month)->where('delivered_by', $delivered_by_id)->where('deli_date', $fix_day)->where('order_status', 'Delivered')->groupBy('deli_date')->count();
                            if($getKamOperationDeliveryAmount == '0'){
                              echo "0";
                            }else{
                              $getKamOperationDeliveryAmount_with_this_date = App\Models\OrderDeliver::select(DB::raw('sum(deli_amount) as deli_amount'), 'deli_date')->whereYear('deli_date', $year)->whereMonth('deli_date', $month)->where('delivered_by', $delivered_by_id)->where('deli_date', $fix_day)->where('order_status', 'Delivered')->groupBy('deli_date')->get();
                               foreach($getKamOperationDeliveryAmount_with_this_date as $key=>$value){
                                  echo $value->deli_amount;
                               } 
                            }
                            ?>
                          </td>
                        @endforeach
                      </tr>
                      @endforeach

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



<script>
  var table = document.querySelector("#table");
  var total_t = document.querySelector("#ttal");

  var col_sum = [];

  for(var i=0; i<table.rows.length; i++){
    for(var p=0; p< table.rows[i].cells.length; p++){
      if(p < 2){
          continue;
      }

      else if(col_sum[p] == undefined ){
          col_sum[p] = 0;
          col_sum[p] = col_sum[p] + parseFloat(table.rows[i].cells[p].innerHTML);
          total_t.rows[0].cells[p].innerHTML = col_sum[p];
      }
      
      else{
          col_sum[p] = col_sum[p] + parseFloat(table.rows[i].cells[p].innerHTML);
          total_t.rows[0].cells[p].innerHTML = col_sum[p];
      }
    }
  }
</script>


<script type="text/javascript">
  $(document).ready(function(){
    $('.tablerow').each(function(){
      var totalorderamount = 0;
      $(this).find('.deliveryAmount').each(function(){
        var orderamount = $(this).text();
        if(orderamount.length !== 0){
          totalorderamount += parseFloat(orderamount);
        }
      });
      $(this).find('.totalDeliveryAmount').html("$"+totalorderamount);
    });
    $('.throw').each(function(){
      var totalorderamount = 0;
      $(this).find('.deliveryAmount').each(function(){
        var orderamount = $(this).text();
        if(orderamount.length !== 0){
          totalorderamount += parseFloat(orderamount);
        }
      });
      $(this).find('.totalDeliveryAmount').html("$"+totalorderamount);
    });
  });
</script>



<script>
$(function () {
  $('#quickForm').validate({
    rules: {
      franchise: {
        required: true,
      },
      year: {
        required: true,
      },
      month: {
        required: true,
      },
    },
    messages: {
      franchise: {
        required: "Please select franchise",
      },
      year: {
        required: "Please select Year",
      },
      month: {
        required: "Please select Month",
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

