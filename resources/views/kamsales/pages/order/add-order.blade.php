
@extends('kamsales.partials.master')

@section('title')
    <title>Add Order | bdCalling IT Ltd</title>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Manage Order</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('kamsales.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('order.view') }}">Order</a></li>
                            <li class="breadcrumb-item active">Add Order</li>
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
                                <h3 class="card-title">Add Order</h3>
                                <a href="{{route('order.view')}}" class="btn btn-success btn-sm"><i class="fa fa-list"></i> Order List</a>
                            </div>

                            <!-- /.card-header -->
                            <div class="row">
                                <div class="col-md-8 offset-2">


                            <form method="post" action="{{ route('order.store') }}" id="quickForm" novalidate="novalidate">
                                @csrf
                                <div class="card-body">
                                    @include('kamsales.partials.message')
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="account_name">Responsible</label>
                                                <input type="text" name="responsible" class="form-control form-control-sm" readonly value="{{ Auth::user()->name }}" id="responsible" placeholder="Enter Account Name">
                                                <input type="hidden" name="kam_id" value="{{ Auth::user()->id }}" id="kam_id" >
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inc_date">Inc_Date</label>
                                                <input type="text" name="inc_date" class="form-control form-control-sm" readonly id="inc_date" value="{{$date}}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="account">Account </label>

                                                <select name="account" id="account" class="form-control form-control-sm">
                                                    <option value=""> Select Account</option>
                                                    @foreach($account as $value)
                                                    <option value="{{$value->id}}"> {{$value->account_name}}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="amount">Amount </label>
                                                <input type="number" name="amount" class="form-control form-control-sm" id="amount" placeholder="Enter Amount ">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="percentage">Percentage (Default 20%)</label>
                                                <input type="number" name="percentage" class="form-control form-control-sm" value="20%" id="percentage" placeholder="Enter Percentage 20% ">

                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="client_user_id">Client User Id </label>
                                                <input type="text" name="client_user_id" class="form-control form-control-sm" id="client_user_id" placeholder="Enter Client User Id ">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="client_name">Client Name </label>
                                                <input type="text" name="client_name" class="form-control form-control-sm" id="client_name" placeholder="Enter Client Name ">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="email_address">Email Address </label>
                                                <input type="text" name="email_address" class="form-control form-control-sm" id="email_address" placeholder="Enter Email Address ">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="client_linkedIn">Client LinkedIn </label>
                                                <input type="text" name="client_linkedIn" class="form-control form-control-sm" id="client_linkedIn" placeholder="Enter Client LinkedIn ">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="order_page_url">Order Page Url </label>
                                                <input type="text" name="order_page_url" class="form-control form-control-sm" id="order_page_url" placeholder="Enter Order Page Url ">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="spreadsheet_link">Spreadsheet Link </label>
                                                <input type="text" name="spreadsheet_link" class="form-control form-control-sm" id="spreadsheet_link" placeholder="Enter Spreadsheet Link ">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="remarks">Remarks </label>
                                                <input type="text" name="remarks" class="form-control form-control-sm" id="remarks" placeholder="Enter Remarks ">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="deli_deedline">Delivery DeedLine </label>
                                                <input type="datetime-local" name="deli_deedline" class="form-control form-control-sm" id="deli_deedline" placeholder="Enter Delivery DeedLine ">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                                </div>
                            </div>
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
                    account: {
                        required: true,
                    },
                    amount: {
                        required: true,
                    },
                    client_user_id: {
                        required:true,
                    },
                    order_page_url:{
                        required: true,
                    },
                    deli_deedline: {
                        required: true,
                    },
                    client_name:{
                        required:true
                    },
                },
                messages: {
                    account: {
                        required: "Please enter account name",
                    },
                    amount: {
                        required: "Please enter Amount",
                    },
                    client_user_id: {
                        required:"Please enter client user id",
                    },
                    order_page_url:{
                        required: "Please enter order page url",
                    },
                    deli_deedline: {
                        required: "Please enter Delivery DeedLine"
                    },
                    client_name: {
                        required: "Please enter Client Name"
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
