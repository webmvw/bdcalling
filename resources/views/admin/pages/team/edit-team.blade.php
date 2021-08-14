
@extends('admin.partials.master')

@section('title')
  <title>Edit Team | bdCalling IT Ltd</title>
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Team</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('admin.team.view') }}">Team</a></li>
              <li class="breadcrumb-item active">Edit Team</li>
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
                <h3 class="card-title">Edit Team - {{ $getTeam->team_name }}</h3>
                <a href="{{ route('admin.team.view') }}" class="btn btn-success btn-sm"><i class="fa fa-list"></i> Team List</a>
              </div>

              <!-- /.card-header -->
                 <form method="post" action="{{ route('admin.team.update', $getTeam->id) }}" id="quickForm" novalidate="novalidate"> 
                  @csrf
                    <div class="card-body">
                      @include('admin.partials.message')
                      <div class="row">
                        <div class="col-md-8 offset-2">
                          <div class="form-group">
                            <label for="team_name">Name</label>
                            <input type="text" value="{{ $getTeam->team_name }}" name="team_name" class="form-control form-control-sm" id="team_name" placeholder="Enter Name">
                          </div>
                          <div class="form-group">
                            <label for="department_id">Department Code</label>
                            <select name="department_id" id="department_id" class="form-control form-control-sm select2">
                              @foreach($getDepartment as $key=>$value)
                              <option value="{{$value->id}}" {{($value->id == $getTeam->department_id) ? 'selected' : ''}}>{{$value->name}}</option>
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
      team_name: {
        required: true,
        maxlength:60,
      },
      department_id: {
        required: true,
      },
    },
    messages: {
      team_name: {
        required: "Please enter name",
        maxlength: "Your name must be at least 60 characters long"
      },
      department_id: {
        required: "Please select department"
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
