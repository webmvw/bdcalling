
@extends('superadmin.partials.master')

@section('title')
  <title>Edit Account | bdCalling IT Ltd</title>
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Account</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('account.view') }}">Account</a></li>
              <li class="breadcrumb-item active">Edit Account</li>
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
                <h3 class="card-title">Edit Account - {{ $account->name }}</h3>
                <a href="{{ route('account.view') }}" class="btn btn-success btn-sm"><i class="fa fa-list"></i> Account List</a>
              </div>

              <!-- /.card-header -->
                 <form method="post" action="{{ route('account.update', $account->id) }}" id="quickForm" novalidate="novalidate"> 
                  @csrf
                    <div class="card-body">
                      @include('superadmin.partials.message')
                      <div class="row">
                      <div class="col-md-4">
                          <div class="form-group">
                            <label for="account_name">Account Name</label>
                            <input type="text" name="account_name" value="{{ $account->account_name }}" class="form-control" id="account_name" placeholder="Enter Account Name">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="source">Source</label>
                            <input type="text" name="source" value="{{ $account->source }}" class="form-control" id="source" placeholder="Ex. upwork">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="account_link">Account Link</label>
                            <input type="text" name="account_link" value="{{ $account->account_link }}" class="form-control" id="account_link" placeholder="Enter Account Link">
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Update</button>
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
      account_name: {
        required: true,
      },
      source: {
        required: true,
      },
      account_link: {
        required: true,
      },
    },
    messages: {
      account_name: {
        required: "Please enter account name"
      },
      source: {
        required: "Please enter source name"
      },
      account_link: {
        required: "Please enter account link"
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
