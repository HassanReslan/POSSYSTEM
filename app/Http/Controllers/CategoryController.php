<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
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

            return view('categories.index',['page'=>'Categories','email'=>$user_name->email ]);
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
        // //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = Session::get('id');

        $category_name = request('category_name');

            $data = ['category_name'=>$category_name,'created_by'=>$user_id];
            DB::table('categories')->insert($data);

            $msg = 'Category created successfully!';
           return $msg;

            //return redirect()->route('products.create');

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

        $category_name = request('category_name');
        $category_id = request('category_id');
        $data = ['category_name'=>$category_name];

        DB::table('categories')->where('id', $category_id)->update( $data );
        $msg = 'Category updated successfully!';
        return $msg;


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
    public function destroy($id)
    {
        DB::delete('delete from categories where id = ?',[$id]);

        return redirect()->route('categories')->with('success','Category has been deleted successfully!');
    }
}
