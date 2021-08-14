
@extends('admin.partials.master')

@section('title')
  <title>Edit Department | bdCalling IT Ltd</title>
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Department</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('admin.department.view') }}">Department</a></li>
              <li class="breadcrumb-item active">Edit Department</li>
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
                <h3 class="card-title">Edit Department - {{ $getDepartment->name }}</h3>
                <a href="{{ route('admin.department.view') }}" class="btn btn-success btn-sm"><i class="fa fa-list"></i> Department List</a>
              </div>

              <!-- /.card-header -->
                 <form method="post" action="{{ route('admin.department.update', $getDepartment->id) }}" id="quickForm" novalidate="novalidate"> 
                  @csrf
                    <div class="card-body">
                      @include('admin.partials.message')
                      <div class="row">
                        <div class="col-md-8 offset-2">
                          <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" value="{{ $getDepartment->name }}" name="name" class="form-control form-control-sm" id="name" placeholder="Enter Name">
                          </div>
                          <div class="form-group">
                            <label for="department_code">Department Code</label>
                            <input type="number" value="{{ $getDepartment->department_code }}" name="department_code" id="department_code" placeholder="Department Code" class="form-control form-control-sm">
                          </div>
                          <button type="submit" class="btn btn-sm btn-primary">Update</button>
                        </div>
                      </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer"> </div>
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
      name: {
        required: true,
        maxlength:60,
      },
      department_code:{
        required: true,
        number:true,
      },
    },
    messages: {
      name: {
        required: "Please enter name",
        maxlength: "Your name must be at least 60 characters long"
      },
      department_code:{
        required: "Please enter department code",
        number: "Invalid department code",
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
