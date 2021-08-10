
@extends('superadmin.partials.master')

@section('title')
  <title>Edit Grade | bdCalling IT Ltd</title>
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
              <li class="breadcrumb-item active">Edit Grade</li>
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
                <h3 class="card-title">Edit Grade - {{ $getGrade->grade_name }}</h3>
                <a href="{{ route('grade.view') }}" class="btn btn-success btn-sm"><i class="fa fa-list"></i> Department List</a>
              </div>

              <!-- /.card-header -->
                 <form method="post" action="{{ route('grade.update', $getGrade->id) }}" id="quickForm" novalidate="novalidate"> 
                  @csrf
                    <div class="card-body">
                      @include('superadmin.partials.message')
                      <div class="row">
                        <div class="col-md-8 offset-2">
                          <div class="form-group">
                            <label for="grade_name">Grade Name</label>
                            <input type="text" value="{{ $getGrade->grade_name }}" name="grade_name" class="form-control form-control-sm" id="grade_name" placeholder="Enter Grade Name">
                          </div>
                          <div class="form-group">
                            <label for="amount">Amount</label>
                            <input type="number" value="{{ $getGrade->amount }}" name="amount" id="amount" placeholder="Grade Amount" class="form-control form-control-sm">
                          </div>
                          <div class="form-group">
                            <label for="franchise_id">Franchise</label>
                            <select name="franchise_id" id="franchise_id" class="form-control form-control-sm select2">
                              <option value="">Select Franchise</option>
                              @foreach($franchises as $key=>$value)
                                <option value="{{ $value->id }}" {{ ($getGrade->franchise_id == $value->id)? 'selected': '' }}>{{ $value->username }}</option>
                              @endforeach
                            </select>
                          </div>
                          <button type="submit" class="btn btn-sm btn-primary">Update</button>
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
      grade_name: {
        required: true,
        maxlength:60,
      },
      amount:{
        required: true,
        number:true,
      },
      franchise_id: {
        required: true,
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
      franchise_id: {
        required: "Please select franchise",
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
