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
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="companyNameInput">Company Name</label>
                                    <input type="text" class="form-control" name="company" id="companyNameInput"
                                        placeholder="Company Name" value="{{ $company['name'] ?? '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="logoInputFile">Logo</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="logo" id="logoInputFile">
                                            <label class="custom-file-label" for="logoInputFile">Choose file</label>
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
                                    <input type="email" class="form-control" name="email" id="emailInput" placeholder="Email" value="{{ $company['email'] ?? ''  }}">
                                </div>
                                <div class="form-group">
                                    <label for="phoneInput">Phone</label>
                                    <input type="text" class="form-control" name="phone" id="phoneInput" placeholder="Phone" value="{{ $company['phone'] ?? ''  }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="addressInput">Address</label>
                                    <textarea class="form-control" rows="3" name="address" id="addressInput" placeholder="Enter Address">{{ $company['address'] ?? '' }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sinceInput">Since</label>
                                    <input type="number" min="1900" max="2099" step="1"
                                        class="form-control" name="since" id="since" placeholder="Since" value="{{ $company['since'] ?? 2016 }}">
                                </div>
                                <div class="form-group">
                                    <label for="facebookInput">Facebook</label>
                                    <input type="text" class="form-control" name="facebook" id="facebookInput" placeholder="https://facebook.com/" value="{{ $company['facebook'] ?? ''  }}"/> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="button" class="btn btn-primary" id="settingSubmit">Save Changes</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
        <script>
            $(() => {
                // function will get executed 
                // on click of submit button
                $("#settingSubmit").click(function(ev) {
                    var form = $("#settingsUpdate");
                    var url = form.attr('action');
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: form.serialize(),
                        success: function(res) {
                            console.log(res);
                            if(res['query']){
                                alert("Form Submited Successfully");
                            }
                        },
                        error: function(res) {
                            if(res['query']){
                                alert("some Error");
                            }
                        }
                    });
                });
            });
        </script>
    </section>
    <!-- /.content -->
@endsection
