
@extends('superadmin.partials.master')

@section('title')
  <title>Add Team | bdCalling IT Ltd</title>
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
              <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('team.view') }}">Team</a></li>
              <li class="breadcrumb-item active">Add Team</li>
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
                <h3 class="card-title">Add Team</h3>
                <a href="{{ route('team.view') }}" class="btn btn-success btn-sm"><i class="fa fa-list"></i> Team List</a>
              </div>

              <!-- /.card-header -->
                 <form method="post" action="{{ route('team.store') }}" id="quickForm" novalidate="novalidate"> 
                  @csrf
                    <div class="card-body">
                      @include('superadmin.partials.message')
                      <div class="row">
                         <div class="col-md-8 offset-2">
                          <div class="form-group">
                            <label for="team_name">Team Name</label>
                            <input type="text" name="team_name" class="form-control form-control-sm" id="team_name" placeholder="Enter Name">
                          </div>
                          <div class="form-group">
                            <label for="franchise">Franchise <span style="color:red">*</span></label>
                            <select class="form-control select2 form-control-sm" name="franchise" id="franchise">
                              <option value="">Select Franchise</option>
                              @foreach($franchises as $key=>$value)
                                <option value="{{$value->id}}">{{$value->username}}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="department_code">Department </label>
                              <select name="department_id" id="department_code" class="select2 form-control form-control-sm">
                                <option value="">Select Department</option>
                              </select>
                          </div>
                          
                          <button type="submit" class="btn btn-sm btn-primary">Submit</button>
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
            url:"{{ route('get_department') }}",
            type:"GET",
            data:{franchise_id:franchise_id},
            success:function(data){
              var html = '<option value="">Select Department</option>';
              $.each(data,function(key,v){
                html += '<option value="'+v.id+'">'+v.name+'</option>';
              });
              $('#department_code').html(html);
            }
          }); 
        });
      });
</script>





<script>
$(function () {
  $('#quickForm').validate({
    rules: {
      team_name: {
        required: true,
        maxlength:60,
      },
      department_id:{
        required: true,
      },
      franchise: {
        required: true,
      },
    },
    messages: {
      team_name: {
        required: "Please enter name",
        maxlength: "Your name must be at least 60 characters long"
      },
      department_id:{
        required: "Please select Department",
      },
      franchise: {
        required: "Please select franchise"
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
