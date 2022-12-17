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
                        <li class="breadcrumb-item active">Category</li>
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
                <div class="card-header ">
                    <h3 class="card-title">Category list</h3>
                    <div class="float-right">
                        <button type="button" class="btn btn-block btn-primary" data-toggle="modal"
                            data-target="#add-category-modal">
                            Add category
                        </button>
                    </div>
                    <div class="modal fade" id="add-category-modal" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Add New Category</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <form action="{{ route('storecategory') }}" method="post" id="getCategory"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="categoryName">Category Name</label>
                                            <input type="text" class="form-control" name="name" id="categoryName"
                                                placeholder="Category">
                                        </div>
                                        <div class="form-group">
                                            <label for="categoryDesc">Category Description</label>
                                            <textarea type="text" class="form-control" name="desc" id="categoryDesc"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="categoryInputFile">Category Image</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="image[]" multiple
                                                        accept="image/*" id="categoryInputFile">
                                                    <label class="custom-file-label" for="categoryInputFile">Choose
                                                        file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="status"
                                                id="categoryStatus">
                                            <label class="form-check-label" for="categoryStatus">Deactive</label>
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="categorylist" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>id</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
                <!-- /.card-header -->
            </div>
            <!-- /.card -->
        </div>
        <script>
            $(function() {
                var table = $('#categorylist').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('category') }}",
                    columns: [{
                            data: 'id',
                            name: 'id'
                        },
                        {
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'desc',
                            name: 'desc'
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        },
                    ]
                });

                $("form#getCategory").submit(function(e) {
                    e.preventDefault();
                    var formData = new FormData(this);
                    var form = $(this);
                    var actionUrl = form.attr("action");
                    var Method = form.attr("method");
                    $.ajax({
                        url: actionUrl,
                        type: Method,
                        data: formData,
                        success: function(data) {
                            $("#categorylist").DataTable().ajax.reload();
                            $("form#getCategory")[0].reset();
                            $("#add-category-modal").modal("toggle");
                            $(document).Toasts("create", {
                                class: "bg-success fade",
                                title: "Added",
                                subtitle: "category",
                                body: "Your category is added."
                            });
                        },
                        cache: false,
                        contentType: false,
                        processData: false
                    });
                });
            });
        </script>
    </section>
    <!-- /.content -->
@endsection
