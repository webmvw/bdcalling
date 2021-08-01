@extends('kamsales.partials.master')

@section('title')
  <title>bdCalling it ltd | Dashboard</title>
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('kamsales.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
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
              <div class="card-header">
                <h3 class="card-title">Employee Profile - {{Auth::user()->name}}</h3>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-3" style="display: flex;justify-content: center;">
                    @if(Auth::user()->image == null)
                    <img src="{{ asset('img/user.png') }}" class="img-circle elevation-2" alt="User Image" style="width:150px;height: 150px;">
                    @else
                    <img src="{{ asset('img/employee/'.Auth::user()->image) }}" class="img-circle elevation-2" alt="User Image" style="width:150px;height: 150px;">
                    @endif
                  </div>
                  <div class="col-md-9">
                    <table class="table table-striped table-bordered">
                      <tr>
                        <td>Name</td>
                        <td>{{Auth::user()->name}}</td>
                      </tr>
                      <tr>
                        <td>Gender</td>
                        <td>{{Auth::user()->gender}}</td>
                      </tr>
                      <tr>
                        <td>Religion</td>
                        <td>{{Auth::user()->religion}}</td>
                      </tr>
                      <tr>
                        <td>ID No</td>
                        <td>{{Auth::user()->id_no}}</td>
                      </tr>
                      <tr>
                        <td>Phone</td>
                        <td>{{Auth::user()->mobile}}</td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td>{{Auth::user()->email}}</td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
              <div class="card-footer"></div>
            </div>  
          </div> 
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection