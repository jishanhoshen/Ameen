@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Settings</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                    <li class="breadcrumb-item active">Settings</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Website Setting</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('settingsUpdate') }}" method="post" id="settingsUpdate">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="companyNameInput">Company Name</label>
                                <input type="text" class="form-control" id="companyNameInput" placeholder="Company Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Logo</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="emailInput">Email</label>
                                <input type="email" class="form-control" id="emailInput" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="phoneInput">Phone</label>
                                <input type="text" class="form-control" id="phoneInput" placeholder="Phone">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Address</label>
                                <textarea class="form-control" rows="3" placeholder="Enter Address"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                                <label for="scinceInput">Since</label>
                                <input type="number" min="1900" max="2099" step="1" value="2016" class="form-control" id="scinceInput" placeholder="Since">
                            </div>
                            <div class="form-group">
                                <label for="facebookInput">Facebook</label>
                                <input type="text" class="form-control" id="facebookInput" placeholder="Phone">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
<script>
    
</script>
</section>
<!-- /.content -->
@endsection