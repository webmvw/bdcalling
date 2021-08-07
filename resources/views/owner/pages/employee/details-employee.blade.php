@extends('owner.partials.master')

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
              <li class="breadcrumb-item"><a href="{{ route('owner.dashboard') }}">Home</a></li>
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
                <h3 class="card-title">{{ $getEmployee->name }}</h3>
                <a href="{{ route('owner.employee.view') }}" class="btn btn-success btn-sm"><i class="fa fa-list"></i> Employee List</a>
              </div>
              
              <!-- /.card-header -->
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-3 text-center">
                      @if($getEmployee->image == null)
                      <img src="{{ asset('public/img/user.png') }}" style="width: 200px;height: 200px;" alt="user image">
                      @else
                      <img src="{{ asset('public/img/employee/'.$getEmployee->image) }}" style="width: 200px;height: 200px;" alt="user image">
                      @endif
                    </div>
                    <div class="col-md-9">
                      <table class="table table-sm table-striped table-bordered">
                        <tr>
                          <td><b>Name<b></td>
                          <td>{{ $getEmployee->name }}</td>
                          <td><b>Email</b></td>
                          <td>{{ $getEmployee->email }}</td>
                        </tr>
                        <tr>
                          <td><b>Phone</b></td>
                          <td>0{{ $getEmployee->mobile }}</td>
                          <td><b>Address</b></td>
                          <td>{{ $getEmployee->address }}</td>
                        </tr>
                        <tr>
                          <td><b>Gender</b></td>
                          <td>{{ $getEmployee->gender }}</td>
                          <td><b>Religion</b></td>
                          <td>{{ $getEmployee->religion }}</td>
                        </tr>
                        <tr>
                          <td><b>Designation</b></td>
                          <td>{{ $getEmployee->designation->name }}</td>
                          <td><b>Department</b></td>
                          <td>{{ $getEmployee->department->name }}</td>
                        </tr>
                        <tr>
                          <td><b>ID No</b></td>
                          <td>{{ $getEmployee->id_no }}</td>
                          <td><b>Join Date</b></td>
                          <td>{{ $getEmployee->join_date}}</td>
                        </tr>
                        <tr>
                          <td><b>Grade</b></td>
                          <td>{{ $getEmployee->grade->grade_name }}</td>
                          <td><b>Salary</b></td>
                          <td>{{ $getEmployee->salary}}/=</td>
                        </tr>
                      </table>
                    </div>
                  </div>
                  <br>
                  <br>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Employee NID Front Image</h3>
                        </div>
                        <div class="card-body">
                          @if($getEmployee->nid_front_image == null)
                          <img src="{{ asset('public/img/noimage.png') }}" style="width: 200px;height: 200px;" alt="user image">
                          @else
                          <img src="{{ asset('public/img/employee/nid/'.$getEmployee->nid_front_image) }}" style="width: 100%;height: 200px;" alt="user image">
                          @endif
                        </div>
                        <div class="card-footer"></div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Employee NID Back Image</h3>
                        </div>
                        <div class="card-body">
                          @if($getEmployee->nid_back_image == null)
                          <img src="{{ asset('public/img/noimage.png') }}" style="width: 200px;height: 200px;" alt="user image">
                          @else
                          <img src="{{ asset('public/img/employee/nid/'.$getEmployee->nid_back_image) }}" style="width: 100%;height: 200px;" alt="user image">
                          @endif
                        </div>
                        <div class="card-footer"></div>
                      </div>
                    </div>
                  </div>
                  <br>
                  <br>
                  <div class="row">
                    <div class="col-md-8 offset-2">
                      <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Employee Resume View</h3>
                        </div>
                        <div class="card-body">
                          @if($getEmployee->cv == null)
                          <img src="{{ asset('public/img/noimage.png') }}" style="width: 200px;height: 200px;" alt="user image">
                          @else
                           <embed src="{{ asset('public/img/employee/cv/'.$getEmployee->cv) }}" type="application/pdf" width="100%" height="500px" />
                          @endif
                        </div>
                        <div class="card-footer"></div>
                      </div>
                    </div>
                  </div>
                  <br>
                  <br>
                  <div class="row">
                    <div class="col-md-12">
                      <h4>Add Increment</h4>
                      <hr>
                      <form action="{{ route('owner.employee.salaryIncrement') }}" method="post" id="quickForm" novalidate="novalidate">
                        @csrf
                        <input type="hidden" name="employee_id" value="{{ $getEmployee->id }}">
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="increment_amount">Increment Amount <span style="color:red">*</span></label>
                              <input type="number" name="increment_amount" class="form-control" id="increment_amount" placeholder="Increment Amount">
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="effective_date">Effective Date <span style="color:red">*</span></label>
                              <input type="date" name="effective_date" class="form-control" id="effective_date" placeholder="Effective Date">
                            </div>
                          </div>
                          <div class="col-md-4">
                            <button type="submit" class="btn btn-primary" style="margin-top:32px">Submit</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <br>
                  <br>
                  <div class="row">
                    <div class="col-md-12">
                      <h4>Salary Increment History</h4>
                      <hr>
                      <table id="example2" class="table table-sm table-bordered table-hover">
                        <thead>
                          <tr>
                            <th>SL</th>
                            <th>Privious Salary</th>
                            <th>Present Salary</th>
                            <th>Increment Salary</th>
                            <th>Effective Date</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($incrementHistory as $key=>$value)
                          <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $value->previous_salary }}/=</td>
                            <td>{{ $value->present_salary }}/=</td>
                            <td>{{ $value->increment_salary }}/=</td>
                            <td>{{ $value->effected_date }}</td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
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
      increment_amount: {
        required: true,
        number:true,
      },
      effective_date:{
        required: true,
      },  
    },
    messages: {
      increment_amount: {
        required: "Please insert increment amount",
        maxlength: "Invalid Input. Only number allowed",
      },
      effective_date:{
        required: "Please enter Date",
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

            