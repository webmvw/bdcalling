
@extends('superadmin.partials.master')

@section('title')
  <title>Add Franchise | bdCalling IT Ltd</title>
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Franchise</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('franchise.view') }}">Franchise</a></li>
              <li class="breadcrumb-item active">Add Franchise</li>
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
                <h3 class="card-title">Add Franchise</h3>
                <a href="{{ route('franchise.view') }}" class="btn btn-success btn-sm"><i class="fa fa-list"></i> Franchise List</a>
              </div>

              <!-- /.card-header -->
                 <form method="post" action="{{ route('franchise.store') }}" id="quickForm" novalidate="novalidate"> 
                  @csrf
                    <div class="card-body">
                      @include('superadmin.partials.message')
                      <div class="row">
                        <div class="col-md-8 offset-2">
                          <div class="form-group">
                            <label for="username">Franchise Name</label>
                            <input type="text" name="username" class="form-control form-control-sm" id="username">
                          </div>
                          <div class="form-group">
                            <label for="nid_number">NID Number</label>
                            <input type="text" name="nid_number" id="nid_number" class="form-control form-control-sm">
                          </div>
                          <div class="form-group">
                            <label for="active_bank_account_details">Active Bank Account Details</label>
                            <input type="text" name="active_bank_account_details" id="active_bank_account_details" class="form-control form-control-sm">
                          </div>
                          <div class="form-group">
                            <label for="account_name">Account Name</label>
                            <input type="text" name="account_name" id="account_name" class="form-control form-control-sm">
                          </div>
                          <div class="form-group">
                            <label for="account_number">Account Number</label>
                            <input type="text" name="account_number" id="account_number" class="form-control form-control-sm">
                          </div>
                          <div class="form-group">
                            <label for="bank_name">Bank Name</label>
                            <input type="text" name="bank_name" id="bank_name" class="form-control form-control-sm">
                          </div>
                          <div class="form-group">
                            <label for="branch_name">Branch Name</label>
                            <input type="text" name="branch_name" id="branch_name" class="form-control form-control-sm">
                          </div>
                          <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" name="address" id="address" class="form-control form-control-sm">
                          </div>
                          <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="text" name="phone" id="phone" class="form-control form-control-sm">
                          </div>
                          <div class="form-group">
                            <label for="location">Location</label>
                            <input type="text" name="location" id="location" class="form-control form-control-sm">
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
      username: {
        required: true,
      },
      nid_number:{
        required: true,
      },
      active_bank_account_details:{
        required: true,
      },
      account_name:{
        required: true,
      },
      account_number:{
        required: true,
      },
      bank_name:{
        required: true,
      },
      branch_name:{
        required: true,
      },
      address:{
        required: true,
      },
      phone:{
        required: true,
      },
      location:{
        required: true,
      },
    },
    messages: {
      username: {
        required: "Please enter Franchise name",
      },
      nid_number:{
        required: "Please enter nid number",
      },
      active_bank_account_details:{
        required: "Please enter active bank account details",
      },
      account_name:{
        required: "Please enter account name",
      },
      account_number:{
        required: "Please enter account number",
      },
      bank_name:{
        required: "Please enter bank name",
      },
      branch_name:{
        required: "Please enter branch name",
      },
      address:{
        required: "Please enter address",
      },
      phone:{
        required: "Please enter phone",
      },
      location:{
        required: "Please enter location",
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
