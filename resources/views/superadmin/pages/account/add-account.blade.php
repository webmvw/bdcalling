
@extends('superadmin.partials.master')

@section('title')
  <title>Add Account | bdCalling IT Ltd</title>
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Account</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('account.view') }}">Account</a></li>
              <li class="breadcrumb-item active">Add Account</li>
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
                <h3 class="card-title">Add Account</h3>
                <a href="{{ route('account.view') }}" class="btn btn-success btn-sm"><i class="fa fa-list"></i> Account List</a>
              </div>

              <!-- /.card-header -->
                 <form method="post" action="{{ route('account.store') }}" id="quickForm" novalidate="novalidate"> 
                  @csrf
                    <div class="card-body">
                      @include('superadmin.partials.message')
                      <div class="row">
                        <div class="col-md-8 offset-2">
                          <div class="form-group">
                            <label for="account_name">Account Name <span style="color:red">*</span></label>
                            <input type="text" name="account_name" class="form-control form-control-sm" id="account_name" placeholder="Enter Account Name">
                          </div>
                          <div class="form-group">
                            <label for="source">Source <span style="color:red">*</span></label>
                            <input type="text" name="source" class="form-control form-control-sm" id="source" placeholder="Ex. upwork">
                          </div>
                          <div class="form-group">
                            <label for="account_link">Account Link <span style="color:red">*</span></label>
                            <input type="text" name="account_link" class="form-control form-control-sm" id="account_link" placeholder="Enter Account Link">
                          </div>
                          <div class="form-group">
                            <label for="franchise">Franchise <span style="color:red">*</span></label>
                            <select class="form-control select2 form-control-sm" name="franchise" id="franchise">
                              <option value="">Select Franchise</option>
                              @foreach($franchises as $key=>$value)
                                <option value="{{$value->id}}">{{$value->username}}</option>
                              @endforeach
                            </select>
                          </div>
                          <button type="submit" class="btn btn-sm btn-primary">Submit</button>
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
      account_name: {
        required: true,
      },
      source: {
        required: true,
      },
      account_link: {
        required: true,
      },
      franchise: {
        required: true,
      },
    },
    messages: {
      account_name: {
        required: "Please enter account name"
      },
      source: {
        required: "Please enter source name"
      },
      account_link: {
        required: "Please enter account link"
      },
      franchise: {
        required: "Please select Franchise"
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
