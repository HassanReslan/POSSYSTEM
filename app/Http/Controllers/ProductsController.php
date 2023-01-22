<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Products;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()) {
            $user_name = Session::get('user');

            return view('products.index',['page'=>'Products','email'=>$user_name->email ]);
        }
        else{
            return view('index');
        }
    }  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()) {
            $user_name = Session::get('user');

            return view('products.create',['page'=>'Add Products','email'=>$user_name->email ]);
        }
        else{
            return view('index');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id =  Auth::id();
        $validate =  $request->validate([
            'category_id'  => 'required',
            'product_name' => 'required|unique:products,product_name',
            'product_code' => 'required|unique:products,product_code',
        ]);

        $products = new Products;
        $products->category_id  = $request->category_id;
        $products->product_name = $request->product_name;
        $products->product_code = $request->product_code;
        $products->created_by   = $user_id;
        

        $save = $products->save();
        if($save)
        {
          return redirect()->route('products.create')->with('success','Product created successfully!');  
        }
        else{
            return redirect()->route('products.create')->with('Faild','Product created Faild!');
        }
        
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
    public function edit($id)
    {
        if(Auth::user()) {
            $user_name = Session::get('user');

            return view('products.edit',['page'=>'Edit Products','email'=>$user_name->email ]);
        }
        else{
            return view('index');
        }
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
        $user_id = Auth::id();
        $validate =  $request->validate([
            'category_id' => 'required',
            'product_name' => 'required',
            'product_code' => 'required',
        ]);
        $products = new Products;
        $products = Products::where('id','=',$id)->first();
        $products->category_id  = $request->category_id;
        $products->product_name = $request->product_name;
        $products->product_code = $request->product_code;
        $products->created_by   = $user_id;

        $save = $products->save();

        if($save)
        {
            return redirect()->route('products')->with('success','Product update successfully!');
        }else{
            return redirect()->route('products')->with('Faild','Product update Faild!');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = Products::find($id)->delete();
        if($res)
        {
            return redirect()->route('products')->with('success','Product has been deleted successfully!');
        }
        else{
            return redirect()->route('products')->with('Faild','Product has been deleted Faild!');
        }
        
    }
}
