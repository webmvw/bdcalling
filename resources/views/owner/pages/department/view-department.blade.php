@extends('owner.partials.master')

@section('title')
  <title>Department | bdCalling IT Ltd</title>
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
              <li class="breadcrumb-item"><a href="{{ route('owner.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Department</li>
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
                <h3 class="card-title">Department List</h3>
                <a href="{{ route('owner.department.add') }}" class="btn btn-success btn-sm"><i class="fa fa-plus-circle"></i> Add Department</a>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                  <form id="quickForm" action="{{ route('owner.department.search') }}" method="post" class="row">
                    @csrf
                    <div class="form-group col-md-4">
                      <label for="franchise_id">Franchise</label>
                      <select class="form-control form-control-sm select2" name="franchise_id" id="franchise_id">
                        <option value="">Select Franchise</option>
                        @foreach($franchises as $key=>$value)
                        <option value="{{ $value->id }}" {{ (@$franchise_id == $value->id)? 'selected': '' }}>{{$value->username}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="col-md-2">
                      <button class="btn btn-sm btn-info" type="submit" name="search" style="margin-top:32px">Search</button>
                    </div>
                    <div class="col-md-6"></div>
                  </form>
                  <br>
                  <hr>
                  <br>
                  @if(!@search)
                  <table id="example1" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>SL</th>
                      <th>Name</th>
                      <th>Department Code</th>
                      <th>Franchise</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach($allDepartments as $key=>$value)
                        <tr>
                          <td>{{ $key+1 }}</td>
                          <td>{{ $value->name }}</td>
                          <td>{{ $value->department_code }}</td>
                          <td>{{ $value->franchise->username }}</td>
                          <td>
                            <a href="{{ route('owner.department.edit', $value->id) }}" title="Edit" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                            <a href="{{ route('owner.department.delete', $value->id) }}" onclick="return confirm('Are you sure to delete!');" title="Delete" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                          </td>
                        </tr>
                    @endforeach

                    </tbody>
                    <tfoot>
                    <tr>
                      <th>SL</th>
                      <th>Name</th>
                      <th>Department Code</th>
                      <th>Franchise</th>
                      <th>Action</th>
                    </tr>
                    </tfoot>
                  </table>
                  @else
                  <table id="example1" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>SL</th>
                      <th>Name</th>
                      <th>Department Code</th>
                      <th>Franchise</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach($allDepartments as $key=>$value)
                        <tr>
                          <td>{{ $key+1 }}</td>
                          <td>{{ $value->name }}</td>
                          <td>{{ $value->department_code }}</td>
                          <td>{{ $value->franchise->username }}</td>
                          <td>
                            <a href="{{ route('owner.department.edit', $value->id) }}" title="Edit" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                            <a href="{{ route('owner.department.delete', $value->id) }}" onclick="return confirm('Are you sure to delete!');" title="Delete" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                          </td>
                        </tr>
                    @endforeach

                    </tbody>
                    <tfoot>
                    <tr>
                      <th>SL</th>
                      <th>Name</th>
                      <th>Department Code</th>
                      <th>Franchise</th>
                      <th>Action</th>
                    </tr>
                    </tfoot>
                  </table>
                  @endif
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
      franchise_id: {
        required: true,
      },
    },
    messages: {
      franchise_id: {
        required: "Please select Franchise",
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

