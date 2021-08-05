
@extends('kamoperation.partials.master')

@section('title')
  <title>Delivery Order | bdCalling IT Ltd</title>
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
              <li class="breadcrumb-item"><a href="{{ route('kamoperation.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('kamoperation.order.view') }}">Order</a></li>
              <li class="breadcrumb-item active">Delivery Order</li>
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
                <h3 class="card-title">Delivery Order</h3>
                <a href="{{ route('kamoperation.order.view') }}" class="btn btn-success btn-sm"><i class="fa fa-list"></i> Order List</a>
              </div>

              <!-- /.card-header -->
                 <form method="post" action="{{ route('kamoperation.order.delivery.success', $getOrder->id) }}" id="quickForm" novalidate="novalidate"> 
                  @csrf
                    <div class="card-body">
                      @include('kamoperation.partials.message')
                      <div class="row">
                        <div class="col-md-8 offset-2">
                          <div class="form-group">
                            <label for="tips">Tips</label>
                            <input type="number" name="tips" id="tips" class="form-control form-control-sm">
                          </div>
                          <div class="form-group">
                            <label for="name">Status <span style="color:red">*</span></label>
                            <select name="order_status" id="name" class="form-control form-control-sm">
                              <option value="">Select Status</option>
                              <option value="NRA" {{ ($getOrder->order_status == 'NRA')? 'selected':'' }}>NRA</option>
                              <option value="WIP" {{ ($getOrder->order_status == 'WIP')? 'selected':'' }}>WIP</option>
                              <option value="NE" {{ ($getOrder->order_status == 'NE')? 'selected':'' }}>NE</option>
                              <option value="Complete" {{ ($getOrder->order_status == 'Complete')? 'selected':'' }}>Complete</option>
                              <option value="Delivered" {{ ($getOrder->order_status == 'Delivered')? 'selected':'' }}>Delivered</option>
                              <option value="Revision" {{ ($getOrder->order_status == 'Revision')? 'selected':'' }}>Revision</option>
                              <option value="Issues" {{ ($getOrder->order_status == 'Issues')? 'selected':'' }}>Issues</option>
                              <option value="Cancalled" {{ ($getOrder->order_status == 'Cancalled')? 'selected':'' }}>Cancelled</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="team">Team <span style="color:red">*</span></label>
                            <select name="team" id="team" class="form-control select2 form-control-sm">
                              <option value="">Select Team</option>
                              @foreach($teams as $key=>$value)
                              <option value="{{ $value->id }}" {{ ($getOrder->team_id == $value->id)? 'selected': '' }}>{{ $value->team_name }}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="deli_date">Delivery Date <span style="color:red">*</span></label>
                            <input type="date" name="deli_date" class="form-control form-control-sm">
                          </div>
                          <div class="form-group">
                            <label for="remarks">Remarks</label>
                            <input type="text" name="remarks" id="remarks" value="{{ $getOrder->remarks }}" class="form-control form-control-sm">
                          </div>
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                      </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer"></div>
                  </form> 

              <div class="card-footer"></div>
            </div> <!-- .card end -->

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
      order_status: {
        required: true,
      },
      team:{
        required: true,
      },
      deli_date:{
        required: true,
      },
    },
    messages: {
      order_status: {
        required: "Please select order status",
      },
      team:{
        required: "Please select team",
      },
      deli_date:{
        required: "Please select delivery date",
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
