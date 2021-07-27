@extends('admin.partials.master')

@section('title')
  <title>Manage Kam | BdCalling it ltd</title>
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Kam</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Kam</li>
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
                <h3 class="card-title">Kam List</h3>
                <a href="{{ route('kam.add') }}" class="btn btn-success btn-sm"><i class="fa fa-plus-circle"></i> Add Kam</a>
              </div>
              
              <!-- /.card-header -->
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>SL</th>
                      <th>Image</th>
                      <th>Name</th>
                      <th>ID No</th>
                      <th>Phone</th>
                      <th>Email</th>
                      @if(Auth::user()->role_id == 1)
                      <th>code</th>
                      @endif
                      <th width="10%">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach($allData as $key=>$value)
                        <tr>
                          <td>{{ $key+1 }}</td>
                          <td>
                            @if($value->image == null)
                            <img src="{{ asset('img/user.png') }}" style="width: 50px;height: 50px;" alt="user image">
                            @else
                            <img src="{{ asset('img/kam/'.$value->image) }}" style="width: 60px;height: 60px;" alt="user image">
                            @endif
                          </td>
                          <td>{{ $value->name }}</td>
                          <td>{{ $value->id_no }}</td>
                          <td>{{ $value->mobile }}</td>
                          <td>{{ $value->email }}</td>
                          @if(Auth::user()->role_id == 1)
                          <td>{{ $value->code }}</td>
                          @endif
                          <td>
                            <a href="{{ route('kam.edit', $value->id) }}" title="Edit" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                            <a href="{{ route('kam.delete', $value->id) }}" title="Delete" onclick="return confirm('Are you sure to delete it!!?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
                        <th>Phone</th>
                        <th>Email</th>
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

