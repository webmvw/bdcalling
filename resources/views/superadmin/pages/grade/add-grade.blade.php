
@extends('superadmin.partials.master')

@section('title')
  <title>Add Grade | BdCalling it ltd</title>
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Grade</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('grade.view') }}">Grade</a></li>
              <li class="breadcrumb-item active">Add Grade</li>
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
                <h3 class="card-title">Add Grade</h3>
                <a href="{{ route('grade.view') }}" class="btn btn-success btn-sm"><i class="fa fa-list"></i> Grade List</a>
              </div>

              <!-- /.card-header -->
                 <form method="post" action="{{ route('grade.store') }}" id="quickForm" novalidate="novalidate"> 
                  @csrf
                    <div class="card-body">
                      @include('superadmin.partials.message')
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="grade_name">Grade Name</label>
                            <input type="text" name="grade_name" class="form-control" id="grade_name" placeholder="Enter Grade Name">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="amount">Amount</label>
                            <input type="number" name="amount" id="amount" placeholder="Grade Amount" class="form-control">
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
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

<script>
$(function () {
  $('#quickForm').validate({
    rules: {
      grade_name: {
        required: true,
        maxlength:60,
      },
      amount:{
        required: true,
        number:true,
      },
    },
    messages: {
      grade_name: {
        required: "Please enter Grade Name",
        maxlength: "Your name must be at least 60 characters long"
      },
      amount:{
        required: "Please enter grade amount",
        number: "Invalid amount. only number allowed",
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
