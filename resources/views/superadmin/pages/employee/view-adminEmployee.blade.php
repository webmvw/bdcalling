@extends('superadmin.partials.master')

@section('title')
  <title>Manage Employee | bdCalling IT Ltd</title>
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Employee</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Employee</li>
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
                <h3 class="card-title">All Admin List</h3>
                <a href="{{ route('employee.add') }}" class="btn btn-success btn-sm"><i class="fa fa-plus-circle"></i> Add Employee</a>
              </div>
              
              <!-- /.card-header -->
                <div class="card-body">
                  <table id="myTable" class="table table-sm table-bordered table-hover table-responsive">
                    <thead>
                    <tr>
                      <th>SL</th>
                      <th>Image</th>
                      <th>Name</th>
                      <th>ID No</th>
                      <th>Role</th>
                      <th>Designation</th>
                      <th>Department</th>
                      <th>Phone</th>
                      <th>Email</th>
                      <th>Address</th>
                      @if(Auth::user()->role_id == 1)
                      <th>code</th>
                      @endif
                      <th style="width:12% !important">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach($allData as $key=>$value)
                        <tr>
                          <td>{{ $key+1 }}</td>
                          <td>
                            @if($value->image == null)
                            <img src="{{ asset('public/img/user.png') }}" style="width: 50px;height: 50px;" alt="user image">
                            @else
                            <img src="{{ asset('public/img/employee/'.$value->image) }}" style="width: 60px;height: 60px;" alt="user image">
                            @endif
                          </td>
                          <td>{{ $value->name }}</td>
                          <td>{{ $value->id_no }}</td>
                          <td>{{ $value->role->name }}</td>
                          <td>{{ $value->designation->name }}</td>
                          <td>{{ $value->department->name }}</td>
                          <td>0{{ $value->mobile }}</td>
                          <td>{{ $value->email }}</td>
                          <td>{{ $value->address }}</td>
                          @if(Auth::user()->role_id == 1)
                          <td>{{ $value->code }}</td>
                          @endif
                          <td>
                            <a href="{{ route('employee.show', $value->id) }}" title="View" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                            @php
                            $checkincrement = App\Models\EmployeeSalaryLog::where('employee_id', $value->id)->OrderBy('id', 'desc')->first();
                            $incrementValue = $checkincrement->increment_salary;
                            @endphp
                            @if($incrementValue == 0)
                            <a href="{{ route('employee.edit', $value->id) }}" title="Edit" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                            @endif
                          </td>
                        </tr>
                    @endforeach

                    </tbody>
                    <tfoot>
                      <tr>
                        <th>SL</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>ID No</th>
                        <th>Role</th>
                        <th>Designation</th>
                        <th>Department</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Address</th>
                        @if(Auth::user()->role_id == 1)
                        <th>code</th>
                        @endif
                        <th width="10%">Action</th>
                      </tr>
                    </tfoot>
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

@endsection

            