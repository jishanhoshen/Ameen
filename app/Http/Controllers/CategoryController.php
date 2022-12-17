<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Category::select('*')->where('status', 1)->orderBy('id', 'asc')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '
                    <button type="button" class="edit btn btn-primary btn-sm" data-toggle="modal"
                    data-target="#edit-category-modal' . $row->id . '">
                    Edit
                    </button>
                    <div class="modal fade" id="edit-category-modal' . $row->id . '" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Edit Category</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <form action="' . route("editcategory") . '" method="post" id="editcategory' . $row->id . '" enctype="multipart/form-data">
                                    ' . csrf_field() . '
                                    <input type="hidden" name="id" value="' . $row->id . '"/>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="categoryName">Category Name</label>
                                            <input type="text" class="form-control" name="name" id="categoryName"
                                                placeholder="Category" value="' . $row->name . '">
                                        </div>
                                        <div class="form-group">
                                            <label for="categoryDesc">Category Description</label>
                                            <textarea type="text" class="form-control" name="desc" id="categoryDesc">' . $row->desc . '</textarea>
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
                                                id="categoryStatus" ' . ($row->status == 0 ? 'value="on"' : "") . '>
                                            <label class="form-check-label" for="categoryStatus">Deactive</label>
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                                <script>
                                $("form#editcategory' . $row->id . '").submit(function(e) {
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
                                            console.log(data);
                                            $("#categorylist").DataTable().ajax.reload();
                                            $("form#editcategory' . $row->id . '")[0].reset();
                                            $("#edit-category-modal' . $row->id . '").modal("toggle");
                                            $(document).Toasts("create", {
                                                class: "bg-success fade",
                                                title: "Updated",
                                                subtitle: "category",
                                                body: "Your category is updated."
                                            });
                                        },
                                        cache: false,
                                        contentType: false,
                                        processData: false
                                    });
                                });
                                </script>
                            </div>
                        </div>
                    </div>

                    <form action="' . route('destroycategory') . '" id="categoryDelete' . $row->id . '" method="post" class="d-inline">
                        ' . csrf_field() . '
                        <input type="hidden" name="id" value="' . $row->id . '"/>
                        <button class="delete btn btn-warning btn-sm" type="submit">Hide</button>
                    </form>
                    <script>
                        $("#categoryDelete' . $row->id . '").submit(function(e){
                            e.preventDefault();
                            var form = $(this);
                            var actionUrl = form.attr("action");
                            var Method = form.attr("method");
                            $.ajax({
                                type: Method,
                                url: actionUrl,
                                data: form.serialize(),
                                success: function(responce) {
                                    console.log(responce);
                                    $("#categorylist").DataTable().ajax.reload();
                                    $(document).Toasts("create", {
                                        class: "bg-danger fade",
                                        title: "Deleted",
                                        subtitle: "category",
                                        body: "Your category is destroyed."
                                    });
                                }
                            });
                        });
                    </script>
                    ';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('category');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createcategory');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'desc' => 'required',
            'image' => 'required',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048'
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->desc = $request->desc;

        if ($request->input('status') == 'on') {
            $category->status = 0;
        }
        $category->save();

        if ($request->hasFile('image')) {
            $i = 1;
            foreach ($request->file('image') as $image) {
                // $imageName = $image->getClientOriginalName();
                $imageExt = $image->getClientOriginalExtension();
                $imageName = 'category_' . $i . '_' . $category->id . '.' . $imageExt;
                $image->move(public_path() . '/images/category/', $imageName);
                $imageData[] = $imageName;
                $i++;
            }
        }

        $category->image = json_encode($imageData);
        $category->save();
        return true;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $request->validate([
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048'
        ]);

        $category = Category::find($request->id);
        $category->name = $request->name;
        $category->desc = $request->desc;

        if ($request->input('status') == 'on') {
            $category->status = 0;
        }
        $category->save();

        if ($request->hasFile('image')) {
            $i = 0;
            foreach ($request->file('image') as $image) {
                // $imageName = $image->getClientOriginalName();
                $imageExt = $image->getClientOriginalExtension();
                $imageName = 'category_' . $i . '_' . $category->id . '.' . $imageExt;
                $image->move(public_path() . '/images/category/', $imageName);
                $imageData[] = $imageName;
                $i++;
            }
            $category->image = json_encode($imageData);
            $category->save();
        }
        return response()->json($category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $category = Category::find($request->id);
        $category->status = 0;
        $category->save();
        return true;
    }
}
