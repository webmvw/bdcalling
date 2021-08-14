
@extends('owner.partials.master')

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
              <li class="breadcrumb-item"><a href="{{ route('owner.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('owner.employee.view') }}">Employee</a></li>
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
                <a href="{{ route('owner.employee.view') }}" class="btn btn-success btn-sm"><i class="fa fa-list"></i> Employee List</a>
              </div>

              <!-- /.card-header -->
                 <form method="post" action="{{ route('owner.employee.update', $getEmployee->id) }}" id="quickForm" novalidate="novalidate" enctype="multipart/form-data"> 
                  @csrf
                    <div class="card-body">
                      @include('owner.partials.message')
                      <div class="row">
                        <div class="col-md-8 offset-2">
                          <div class="form-group">
                            <label for="name">Name <span style="color:red">*</span></label>
                            <input type="text" value="{{ $getEmployee->name }}" name="name" class="form-control form-control-sm" id="name" placeholder="Enter Name">
                          </div>
                          <div class="form-group">
                            <label for="email">Email <span style="color:red">*</span></label>
                            <input type="email" value="{{ $getEmployee->email }}" name="email" class="form-control form-control-sm" id="email" placeholder="Enter Email">
                          </div>
                          <div class="form-group">
                            <label for="phone">Phone <span style="color:red">*</span></label>
                            <input type="number" value="{{ $getEmployee->mobile }}" name="phone" class="form-control form-control-sm" id="phone" placeholder="Enter Phone">
                          </div>
                          <div class="form-group">
                            <label for="nid_number">NID <span style="color:red">*</span></label>
                            <input type="text" value="{{ $getEmployee->nid_number }}" name="nid_number" class="form-control form-control-sm" id="nid_number" placeholder="Enter NID Number">
                          </div>
                          <div class="form-group">
                            <label for="address">Address <span style="color:red">*</span></label>
                            <input type="text" name="address" value="{{ $getEmployee->address }}" class="form-control form-control-sm" id="address" placeholder="Enter Address">
                          </div>
                          <div class="form-group">
                            <label for="franchise">Franchise</label>
                            <select class="form-control select2 form-control-sm" name="franchise" id="franchise">
                              <option value="">Select Franchise</option>
                              @foreach($franchises as $key=>$value)
                                <option value="{{$value->id}}" {{ ($getEmployee->franchise_id == $value->id)? 'selected': '' }}>{{$value->username}}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="address">Department <span style="color:red">*</span></label>
                            <select class="form-control select2 form-control-sm" name="department" id="department">
                              <option value="">Select Department</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="address">Designation <span style="color:red">*</span></label>
                            <select class="form-control select2 form-control-sm" name="designation" id="designation">
                              <option value="">Select Designation</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="grade">Grade <span style="color:red">*</span></label>
                            <select class="form-control select2 form-control-sm" name="grade" id="grade">
                              <option value="">Select Grade</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="gender">Gender <span style="color:red">*</span></label>
                            <select class="form-control form-control-sm" name="gender" id="gender">
                              <option value="Male" {{ ($getEmployee->gender == 'Male')? 'selected':'' }}>Male</option>
                              <option value="Female" {{ ($getEmployee->gender == 'Female')? 'selected':'' }}>Female</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="religion">Religion <span style="color:red">*</span></label>
                            <select class="form-control form-control-sm" name="religion" id="religion">
                              <option value="Islam" {{ ($getEmployee->religion == 'Islam')? 'selected':'' }}>Islam</option>
                              <option value="Hindu" {{ ($getEmployee->religion == 'Hindu')? 'selected':'' }}>Hindu</option>
                              <option value="Buddho" {{ ($getEmployee->religion == 'Buddho')? 'selected':'' }}>Buddho</option>
                              <option value="Khristan" {{ ($getEmployee->religion == 'Khristan')? 'selected':'' }}>Khristan</option>
                              <option value="Others" {{ ($getEmployee->religion == 'Others')? 'selected':'' }}>Others</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="dob">Date Of Birth <span style="color:red">*</span></label>
                            <input type="date" name="dob" value="{{ $getEmployee->dob }}" class="form-control form-control-sm" id="dob" placeholder="Date Of Birth">
                          </div>
                          <div class="form-group">
                            <label for="join_date">Joining Date <span style="color:red">*</span></label>
                            <input type="date" name="join_date" value="{{ $getEmployee->join_date }}" class="form-control form-control-sm" id="join_date" placeholder="Joining Date">
                          </div>
                          
                          <div class="form-group">
                            <label for="salary">Salary <span style="color:red">*</span></label>
                            <input type="number" name="salary" value="{{ $getEmployee->salary }}" class="form-control form-control-sm" id="salary" placeholder="Enter Salary">
                          </div>
                          <div class="form-group">
                            <label for="role">Role <span style="color:red">*</span></label>
                            <select class="form-control select2 form-control-sm" name="role" id="role">
                              <option value="">Select Role</option>
                              @foreach($roles as $key=>$value)
                                <option value="{{$value->id}}" {{ ($getEmployee->role_id == $value->id)? 'selected': '' }}>{{$value->name}}</option>
                              @endforeach
                            </select>
                          </div>
                          <br>
                          <br>
                          <span>Bank Account Details</span>
                          <hr>
                          <div class="form-group">
                            <label for="account_holder_name">Account Holder Name</label>
                            <input type="text" value="{{ $getEmployee->bank_account_holder_name }}" name="account_holder_name" id="account_holder_name" class="form-control form-control-sm" placeholder="Account Holder Name">
                          </div>
                          <div class="form-group">
                            <label for="account_number">Account Number</label>
                            <input type="text" value="{{ $getEmployee->bank_account_number }}" name="account_number" id="account_number" class="form-control form-control-sm" placeholder="Account Number">
                          </div>
                          <div class="form-group">
                            <label for="bank_name">Bank Name</label>
                            <input type="text" value="{{ $getEmployee->bank_name }}" name="bank_name" id="bank_name" class="form-control form-control-sm" placeholder="Bank Name">
                          </div>
                          <div class="form-group">
                            <label for="branch_name">Branch Name</label>
                            <input type="text" value="{{ $getEmployee->branch_name }}" name="branch_name" id="branch_name" class="form-control form-control-sm" placeholder="Branch Name">
                          </div>
                          <div class="form-group">
                            <label for="routing_number">Routing Number</label>
                            <input type="text" value="{{ $getEmployee->routing_number }}" name="routing_number" id="routing_number" class="form-control form-control-sm" placeholder="Routing Number">
                          </div>
                          <br>
                          <div class="form-group">
                            <label for="image">Image</label>
                            <div class="row">
                              <div class="col-md-4">
                                <input type="file" name="image" id="image" class="form-control form-control-sm">
                              </div>
                              <div class="col-md-8">
                                @if($getEmployee->image != null)
                                <img id="showImage" src="{{ asset('public/img/employee/'.$getEmployee->image) }}" alt="user image" style="width:80px; height: 80px;border:1px solid #0069D9;padding:1px;">
                                @else
                                <img id="showImage" src="{{ asset('public/img/user.png') }}" alt="user image" style="width:80px; height: 80px;border:1px solid #0069D9;padding:1px;">
                                @endif
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="nid_front_image">NID Front Image</label>
                            <div class="row">
                              <div class="col-md-4">
                                <input type="file" name="nid_front_image" id="nid_front_image" class="form-control form-control-sm">
                              </div>
                              <div class="col-md-8">
                                @if($getEmployee->nid_front_image != null)
                                <img id="showNid_front_image" src="{{ asset('public/img/employee/nid/'.$getEmployee->nid_front_image) }}" alt="user image" style="width:80px; height: 80px;border:1px solid #0069D9;padding:1px;">
                                @else
                                <img id="showNid_front_image" src="{{ asset('public/img/noimage.png') }}" alt="user image" style="width:80px; height: 80px;border:1px solid #0069D9;padding:1px;">
                                @endif
                                
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="nid_back_image">NID Back Image</label>
                            <div class="row">
                              <div class="col-md-4">
                                <input type="file" name="nid_back_image" id="nid_back_image" class="form-control form-control-sm">
                              </div>
                              <div class="col-md-8">
                                @if($getEmployee->nid_back_image != null)
                                <img id="showNid_front_image" src="{{ asset('public/img/employee/nid/'.$getEmployee->nid_back_image) }}" alt="user image" style="width:80px; height: 80px;border:1px solid #0069D9;padding:1px;">
                                @else
                                <img id="showNid_back_image" src="{{ asset('public/img/noimage.png') }}" alt="user image" style="width:80px; height: 80px;border:1px solid #0069D9;padding:1px;">
                                @endif
                                
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="cv">CV <span style="color:red">*</span></label>
                            <div class="row">
                              <div class="col-md-4">
                                <input type="file" name="cv" id="cv" class="form-control form-control-sm">
                              </div>
                              <div class="col-md-8">
                                @if($getEmployee->cv != null)
                                <embed src="{{ asset('public/img/employee/cv/'.$getEmployee->cv) }}" type="application/pdf" width="60%" height="400px" />
                                @endif
                              </div>
                            </div>
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




<script type="text/javascript">
      $(function(){
        $.ajaxSetup({
          headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $(document).on('change', '#franchise', function(){
          var franchise_id = $(this).val();
          $.ajax({
            url:"{{ route('owner.get_department') }}",
            type:"GET",
            data:{franchise_id:franchise_id},
            success:function(data){
              var html = '<option value="">Select Department</option>';
              $.each(data,function(key,v){
                html += '<option value="'+v.id+'">'+v.name+'</option>';
              });
              $('#department').html(html);
            }
          });
           $.ajax({
            url:"{{ route('owner.get_designation') }}",
            type:"GET",
            data:{franchise_id:franchise_id},
            success:function(data){
              var html = '<option value="">Select Designation</option>';
              $.each(data,function(key,v){
                html += '<option value="'+v.id+'">'+v.name+'</option>';
              });
              $('#designation').html(html);
            }
          });
           $.ajax({
            url:"{{ route('owner.get_grade') }}",
            type:"GET",
            data:{franchise_id:franchise_id},
            success:function(data){
              var html = '<option value="">Select Grade</option>';
              $.each(data,function(key,v){
                html += '<option value="'+v.id+'">'+v.grade_name+'</option>';
              });
              $('#grade').html(html);
            }
          });  
        });
      });
</script>






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
      nid_number:{
        required: true,
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
      franchise: {
        required: true,
      },
      salary: {
        required: true,
        number: true,
      },
      role: {
        required: true,
      },
      image: {
        extension: "jpg|png",
      },
      nid_front_image: {
        extension: "jpg|png",
      },
      nid_back_image: {
        extension: "jpg|png",
      },
      cv: {
        extension: "pdf",
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
      nid_number: {
        required: "Please enter NID number",
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
      franchise: {
        required: "Please select Franchise",
      },
      salary: {
        required: "Please enter salary",
        number: "Invalid data. only number Please",
      },
      role: {
        required: "Please select role",
      },
      image: {
        extension: "Only jpg, png format accepted",
      },
      nid_front_image: {
        extension: "Only jpg, png format accepted",
      },
      nid_back_image: {
        extension: "Only jpg, png format accepted",
      },
      cv: {
        extension: "Only PDF File accepted",
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