
@extends('kamsales.partials.master')

@section('title')
  <title>Add Order | bdCalling IT Ltd</title>
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
              <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('order.view') }}">Order</a></li>
              <li class="breadcrumb-item active">Add Order</li>
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
                <h3 class="card-title">Add Order</h3>
                <a href="{{ route('order.view') }}" class="btn btn-success btn-sm"><i class="fa fa-list"></i> Order List</a>
              </div>

              <!-- /.card-header -->
                 <form method="post" action="{{ route('order.store') }}" id="quickForm" novalidate="novalidate" enctype="multipart/form-data"> 
                  @csrf
                    <div class="card-body">
                      @include('kamsales.partials.message')
                      <div class="row">
                        <div class="col-md-8 offset-2">
                          <div class="form-group">
                            <label for="responsible">Responsible</label>
                            <input type="text" value="{{Auth::user()->name}}" class="form-control form-control-sm" id="responsible" readonly style="background: #D8FDBA">
                          </div>
                          <div class="form-group">
                            <label for="inc_date">Inc Date</label>
                            <input type="date" value="{{ $date }}" name="inc_date" class="form-control form-control-sm" id="inc_date" readonly style="background: #D8FDBA">
                          </div>
                          <div class="form-group">
                            <label for="account">Account <span style="color:red">*</span></label>
                            <select class="form-control select2 form-control-sm" name="account" id="account">
                              <option value="">Select Account</option>
                              @foreach($accounts as $key=>$value)
                                <option value="{{$value->id}}">{{$value->account_name}}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="amount">Amount <span style="color:red">*</span></label>
                            <input type="number" name="amount" class="form-control form-control-sm" id="amount">
                          </div>
                          <div class="form-group">
                            <label for="percentage">Percentage (defailt: 20%)</label>
                            <input type="number" name="percentage" class="form-control form-control-sm" id="percentage">
                          </div>
                          <div class="form-group">
                            <label for="client_user_id">Client User Id <span style="color:red">*</span></label>
                            <input type="text" name="client_user_id" class="form-control form-control-sm" id="client_user_id">
                          </div>
                          <div class="form-group">
                            <label for="client_name">Client Name <span style="color:red">*</span></label>
                            <input type="text" name="client_name" class="form-control form-control-sm" id="client_name">
                          </div>
                          <div class="form-group">
                            <label for="client_email">Client Email </label>
                            <input type="email" name="client_email" class="form-control form-control-sm" id="client_email">
                          </div>
                          <div class="form-group">
                            <label for="client_linkedin">Client Linkedin </label>
                            <input type="text" name="client_linkedin" class="form-control form-control-sm" id="client_linkedin">
                          </div>
                          <div class="form-group">
                            <label for="order_page_url">Order Page URL <span style="color:red">*</span></label>
                            <input type="text" name="order_page_url" class="form-control form-control-sm" id="order_page_url">
                          </div>
                          <div class="form-group">
                            <label for="spreadsheet_link">Spreadsheet Link </label>
                            <input type="text" name="spreadsheet_link" class="form-control form-control-sm" id="spreadsheet_link">
                          </div>
                          <div class="form-group">
                            <label for="department">Department <span style="color:red">*</span></label>
                            <select class="form-control select2 form-control-sm" name="department" id="department">
                              <option value="">Select Department</option>
                              @foreach($departments as $key=>$value)
                                <option value="{{$value->id}}">{{$value->name}}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="team">Team <span style="color:red">*</span></label>
                            <select class="form-control select2 form-control-sm" name="team" id="team">
                              <option value="">Select Team</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="deli_last_date">Delivery Last Date <span style="color:red">*</span></label>
                            <input type="datetime-local" name="deli_last_date" class="form-control form-control-sm" id="deli_last_date">
                          </div>
                          <div class="form-group">
                            <label for="remarks">Remarks </label>
                            <input type="text" name="remarks" class="form-control form-control-sm" id="remarks">
                          </div>
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                      </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      
                    </div>
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



<script type="text/javascript">
      $(function(){

        $.ajaxSetup({
          headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        $(document).on('change', '#department', function(){
          var department_id = $(this).val();
          $.ajax({
            url:"{{ route('get_team') }}",
            type:"GET",
            data:{department_id:department_id},
            success:function(data){
              var html = '<option value="">Select Team</option>';
              $.each(data,function(key,v){
                html += '<option value="'+v.id+'">'+v.team_name+'</option>';
              });
              $('#team').html(html);
            }
          });  
        });

      });
</script>





<script>
$(function () {
  $('#quickForm').validate({
    rules: {
      account: {
        required: true,
      },
      amount: {
        required: true,
        number: true,
      },
      client_user_id: {
        required: true,
      },
      client_name: {
        required: true,
      },
      order_page_url: {
        required: true,
      },
      department: {
        required: true,
      },
      deli_last_date: {
        required: true,
      },
    },
    messages: {
      account: {
        required: "Please select account",
      },
      amount: {
        required: "Please enter amount",
        number: "Invalid input",
      },
      client_user_id: {
        required: "Please enter client user id",
      },
      client_name: {
        required: "Please enter client name",
      },
      order_page_url: {
        required: "Please enter order page url",
      },
      department: {
        required: "Please select Department",
      },
      deli_last_date: {
        required: "Please enter delivery last date",
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