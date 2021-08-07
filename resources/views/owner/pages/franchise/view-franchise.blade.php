@extends('owner.partials.master')

@section('title')
  <title>Franchise | bdCalling IT Ltd</title>
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
              <li class="breadcrumb-item"><a href="{{ route('owner.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Franchise</li>
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
                <h3 class="card-title">Franchise List</h3>
                <a href="{{ route('owner.franchise.add') }}" class="btn btn-success btn-sm"><i class="fa fa-plus-circle"></i> Add Franchise</a>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                  <table id="myTable" class="table table-bordered table-hover table-striped table-responsive">
                    <thead>
                    <tr>
                      <th>SL</th>
                      <th>Name</th>
                      <th>NID</th>
                      <th>Active Bank Account details</th>
                      <th>Account Name</th>
                      <th>Account Number</th>
                      <th>Bank Name</th>
                      <th>Branch Name</th>
                      <th>Address</th>
                      <th>Phone</th>
                      <th>Location</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach($allfranchises as $key=>$value)
                        <tr>
                          <td>{{ $key+1 }}</td>
                          <td>{{ $value->username }}</td>
                          <td>{{ $value->nid_number }}</td>
                          <td>{{ $value->active_bank_account_details }}</td>
                          <td>{{ $value->account_name }}</td>
                          <td>{{ $value->account_number }}</td>
                          <td>{{ $value->bank_name }}</td>
                          <td>{{ $value->branch_name }}</td>
                          <td>{{ $value->address }}</td>
                          <td>{{ $value->phone }}</td>
                          <td>{{ $value->location }}</td>
                          <td>
                            <a href="{{ route('owner.franchise.edit', $value->id) }}" title="Edit" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                            <a href="{{ route('owner.franchise.delete', $value->id) }}" onclick="return confirm('Are you sure to delete!');" title="Delete" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                          </td>
                        </tr>
                    @endforeach

                    </tbody>
                    <tfoot>
                    <tr>
                      <th>SL</th>
                      <th>Name</th>
                      <th>NID</th>
                      <th>Active Bank Account details</th>
                      <th>Account Name</th>
                      <th>Account Number</th>
                      <th>Bank Name</th>
                      <th>Branch Name</th>
                      <th>Address</th>
                      <th>Phone</th>
                      <th>Location</th>
                      <th>Action</th>
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

