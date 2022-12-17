<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    public $option = '';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $category = Category::select('*')->where('status', 1)->get();

        
        foreach ($category as $key => $item){
            $this->option .= '<option value="'.$item->id.'">'.$item->name.'</option>';
        }

        if ($request->ajax()) {
            
            $data = Product::select('*')->where('status', 1)->get();
            
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '
                    <button type="button" class="edit btn btn-primary btn-sm" data-toggle="modal"
                    data-target="#edit-product-modal' . $row->id . '">
                    Edit
                    </button>
                    <div class="modal fade" id="edit-product-modal' . $row->id . '" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Edit product</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <form action="' . route("editproduct") . '" method="post" id="editproduct' . $row->id . '" enctype="multipart/form-data">
                                    ' . csrf_field() . '
                                    <input type="hidden" name="id" value="' . $row->id . '"/>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="productName">product Name</label>
                                            <input type="text" class="form-control" name="name" id="productName"
                                                placeholder="product" value="' . $row->name . '">
                                        </div>
                                        <div class="form-group">
                                            <label>Select</label>
                                            <select class="form-control" name="type" id="productType">
                                                <option value="null" disabled selected>Select Category</option>
                                                '.$this->option.'
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="productDesc">product Description</label>
                                            <textarea type="text" class="form-control" name="desc" id="productDesc">' . $row->desc . '</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="productInputFile">product Image</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="image[]" multiple
                                                        accept="image/*" id="productInputFile">
                                                    <label class="custom-file-label" for="productInputFile">Choose
                                                        file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="status"
                                                id="productStatus" ' . ($row->status == 0 ? 'value="on"' : "") . '>
                                            <label class="form-check-label" for="productStatus">Deactive</label>
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                                <script>
                                $("form#editproduct' . $row->id . '").submit(function(e) {
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
                                            $("#productlist").DataTable().ajax.reload();
                                            $("form#editproduct' . $row->id . '")[0].reset();
                                            $("#edit-product-modal' . $row->id . '").modal("toggle");
                                            $(document).Toasts("create", {
                                                class: "bg-success fade",
                                                title: "Updated",
                                                subtitle: "product",
                                                body: "Your product is updated."
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

                    <form action="' . route('destroyproduct') . '" id="productDelete' . $row->id . '" method="post" class="d-inline">
                        ' . csrf_field() . '
                        <input type="hidden" name="id" value="' . $row->id . '"/>
                        <button class="delete btn btn-warning btn-sm" type="submit">Hide</button>
                    </form>
                    <script>
                        $("#productDelete' . $row->id . '").submit(function(e){
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
                                    $("#productlist").DataTable().ajax.reload();
                                    $(document).Toasts("create", {
                                        class: "bg-danger fade",
                                        title: "Deleted",
                                        subtitle: "product",
                                        body: "Your product is destroyed."
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

        

        return view('products', ['category' => $category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createproduct');
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
            'type' => 'required',
            'desc' => 'required',
            'image' => 'required',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048'
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->type = $request->type;
        $product->desc = $request->desc;

        if ($request->input('status') == 'on') {
            $product->status = 0;
        }
        $product->save();

        if ($request->hasFile('image')) {
            $i = 1;
            foreach ($request->file('image') as $image) {
                // $imageName = $image->getClientOriginalName();
                $imageExt = $image->getClientOriginalExtension();
                $imageName = 'product_' . $i . '_' . $product->id . '.' . $imageExt;
                $image->move(public_path() . '/images/product/', $imageName);
                $imageData[] = $imageName;
                $i++;
            }
        }

        $product->image = json_encode($imageData);
        $product->save();
        return true;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $request->validate([
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048'
        ]);

        $product = Product::find($request->id);
        if($request->input('name')){
            $product->name = $request->name;
        }
        if($request->input('type')){
            $product->type = $request->type;
        }
        if($request->input('desc')){
            $product->desc = $request->desc;
        }
        

        if ($request->input('status') == 'on') {
            $product->status = 0;
        }
        $product->save();

        if ($request->hasFile('image')) {
            $i = 0;
            foreach ($request->file('image') as $image) {
                // $imageName = $image->getClientOriginalName();
                $imageExt = $image->getClientOriginalExtension();
                $imageName = 'product_' . $i . '_' . $product->id . '.' . $imageExt;
                $image->move(public_path() . '/images/product/', $imageName);
                $imageData[] = $imageName;
                $i++;
            }
            $product->image = json_encode($imageData);
            $product->save();
        }
        return response()->json($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $product = Product::find($request->id);
        $product->status = 0;
        $product->save();
        return true;
    }
}
