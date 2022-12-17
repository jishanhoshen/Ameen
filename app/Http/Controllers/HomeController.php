<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin');
    }

    public function settings()
    {
        $settings = Setting::select('*')->get();
        $company = [
            'name' => $settings[0]->value,
            'email' => $settings[1]->value,
            'phone' => $settings[2]->value,
            'address' => $settings[3]->value,
            'logo' => $settings[4]->value,
            'since' => $settings[5]->value,
            'facebook' => $settings[6]->value,
        ];
        return view('settings', ['company' => $company]);
    }
    public function settingsUpdate(Request $request)
    {

        // $validated = $request->validate([
        //     'title' => 'required|unique:posts|max:255',
        //     'body' => 'required',
        // ]);

        function updateQuery($name, $value)
        {
            $query = Setting::where('name', $name)->first();
            if ($query) {
                if ($query->value != $value) {
                    $query->value = $value;
                    if ($query->save()) {
                        return $query->value;
                    }
                }
            }else{
                return false;
            }

        }

        $update=[];
        $error=[];
        
        foreach($request->all() as $key => $value){
            // echo $key.': '.$value.', ';
            if($item = updateQuery($key, $value)){
                $update[] = [
                    $key => $item
                ];
            }else{
                if($key != '_token'){
                    $error[] = [
                        $key => $item
                    ];
                }
            }
        }
        
        return response()->json([
            'query' => true,
            'update' => $update,
            'error' => $error
        ]);


        // return response()->json($request->all());
    }
}
