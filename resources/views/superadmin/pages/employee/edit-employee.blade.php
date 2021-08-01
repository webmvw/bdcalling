
@extends('superadmin.partials.master')

@section('title')
  <title>Edit Employee | bdCalling IT Ltd</title>
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
              <li class="breadcrumb-item"><a href="{{ route('employee.view') }}">Employee</a></li>
              <li class="breadcrumb-item active">Edit Employee</li>
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
                <h3 class="card-title">Edit Employee - {{ $getEmployee->name }}</h3>
                <a href="{{ route('employee.view') }}" class="btn btn-success btn-sm"><i class="fa fa-list"></i> Employee List</a>
              </div>

              <!-- /.card-header -->
                 <form method="post" action="{{ route('employee.update', $getEmployee->id) }}" id="quickForm" novalidate="novalidate" enctype="multipart/form-data"> 
                  @csrf
                    <div class="card-body">
                      @include('superadmin.partials.message')
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="name">Name <span style="color:red">*</span></label>
                            <input type="text" value="{{ $getEmployee->name }}" name="name" class="form-control" id="name" placeholder="Enter Name">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="email">Email <span style="color:red">*</span></label>
                            <input type="email" value="{{ $getEmployee->email }}" name="email" class="form-control" id="email" placeholder="Enter Email">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="phone">Phone <span style="color:red">*</span></label>
                            <input type="number" value="{{ $getEmployee->mobile }}" name="phone" class="form-control" id="phone" placeholder="Enter Phone">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="address">Address <span style="color:red">*</span></label>
                            <input type="text" name="address" value="{{ $getEmployee->address }}" class="form-control" id="address" placeholder="Enter Address">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="address">Department <span style="color:red">*</span></label>
                            <select class="form-control select2" name="department" id="department">
                              <option value="">Select Department</option>
                              @foreach($department as $key=>$value)
                                <option value="{{$value->id}}" {{ ($getEmployee->department_id == $value->id)? 'selected': '' }}>{{$value->name}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="address">Designation <span style="color:red">*</span></label>
                            <select class="form-control select2" name="designation" id="designation">
                              <option value="">Select Designation</option>
                              @foreach($designation as $key=>$value)
                                <option value="{{$value->id}}" {{ ($getEmployee->designation_id == $value->id)? 'selected': '' }}>{{$value->name}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="gender">Gender <span style="color:red">*</span></label>
                            <select class="form-control" name="gender" id="gender">
                              <option value="Male" {{ ($getEmployee->gender == 'Male')? 'selected':'' }}>Male</option>
                              <option value="Female" {{ ($getEmployee->gender == 'Female')? 'selected':'' }}>Female</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="religion">Religion <span style="color:red">*</span></label>
                            <select class="form-control" name="religion" id="religion">
                              <option value="Islam" {{ ($getEmployee->religion == 'Islam')? 'selected':'' }}>Islam</option>
                              <option value="Hindu" {{ ($getEmployee->religion == 'Hindu')? 'selected':'' }}>Hindu</option>
                              <option value="Buddho" {{ ($getEmployee->religion == 'Buddho')? 'selected':'' }}>Buddho</option>
                              <option value="Khristan" {{ ($getEmployee->religion == 'Khristan')? 'selected':'' }}>Khristan</option>
                              <option value="Others" {{ ($getEmployee->religion == 'Others')? 'selected':'' }}>Others</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="dob">Date Of Birth <span style="color:red">*</span></label>
                            <input type="date" name="dob" value="{{ $getEmployee->dob }}" class="form-control" id="dob" placeholder="Date Of Birth">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="join_date">Joining Date <span style="color:red">*</span></label>
                            <input type="date" name="join_date" value="{{ $getEmployee->join_date }}" class="form-control" id="join_date" placeholder="Joining Date">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="grade">Grade <span style="color:red">*</span></label>
                            <select class="form-control select2" name="grade" id="grade">
                              <option value="">Select Grade</option>
                              @foreach($grades as $key=>$value)
                                <option value="{{$value->id}}" {{ ($getEmployee->grade_id == $value->id)? 'selected': '' }}>{{$value->grade_name}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="salary">Salary <span style="color:red">*</span></label>
                            <input type="number" name="salary" value="{{ $getEmployee->salary }}" class="form-control" id="salary" placeholder="Enter Salary">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" name="image" id="image" class="form-control">
                          </div>
                        </div>
                        <div class="col-md-4">
                          @if($getEmployee->image != null)
                          <img id="showImage" src="{{ asset('img/employee/'.$getEmployee->image) }}" alt="user image" style="width:80px; height: 80px;border:1px solid #0069D9;padding:1px;">
                          @else
                          <img id="showImage" src="{{ asset('img/user.png') }}" alt="user image" style="width:80px; height: 80px;border:1px solid #0069D9;padding:1px;">
                          @endif
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
      name: {
        required: true,
        maxlength:60,
      },
      email: {
        required: true,
        email: true,
      },
      phone: {
        required: true,
        number:true,
      },
      address: {
        required: true,
      },
      department: {
        required: true,
      },
      designation: {
        required: true,
      },
      gender: {
        required: true,
      },
      religion: {
        required: true,
      },
      dob: {
        required: true,
      },
      join_date: {
        required: true,
      },
      grade: {
        required: true,
      },
      salary: {
        required: true,
        number: true,
      },
    },
    messages: {
      name: {
        required: "Please enter session name",
        maxlength: "Your session name must be at least 60 characters long",
      },
      email: {
        required: "Please enter email address",
        email: "Invalid email address",
      },
      phone: {
        required: "Please enter phone number",
        number: "Invalid Phone number",
      },
      address: {
        required: "Please enter address",
      },
      department: {
        required: "Please select department",
      },
      designation: {
        required: "Please select designation",
      },
      gender: {
        required: "Please select gender",
      },
      religion: {
        required: "Please select religion",
      },
      dob: {
        required: "Please select date",
      },
      join_date: {
        required: "PLease select Date",
      },
      grade: {
        required: "Please select grade",
      },
      salary: {
        required: "Please enter salary",
        number: "Invalid data. only number Please",
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