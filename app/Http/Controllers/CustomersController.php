<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CustomersController extends Controller
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

            return view('customers.index',['page'=>'Customers','email'=>$user_name->email ]);
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

            //echo $user_name->email;exit;

            return view('customers.create',['page'=>'Add Customer','email'=>$user_name->email ]);
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
        $validate =  $request->validate([
            'name' => 'required|unique:customers,name',
            'email' => '',
            'phone' => 'required',
            'address' => '',
        ]);

        $data = ['name'=>$validate['name'],'email'=> $validate['email'], 'phone'=> $validate['phone'],'address'=> $validate['address'] ];
        DB::table('customers')->insert($data);

        return redirect()->route('customers')->with('success','Customers created successfully!');
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
            //echo $user_name->email;exit;

            return view('customers.edit',['page'=>'Edit Customer','email'=>$user_name->email ]);
        }
        else{
            return view('customers.index');
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
        $validate =  $request->validate([
            'name' => 'required',
            'email' => '',
            'phone' => 'required',
            'address' => '',
        ]);

        $data = ['name'=>$validate['name'],'email'=> $validate['email'], 'phone'=> $validate['phone'],'address'=> $validate['address'] ];

        DB::table('customers')->where('id', $id) ->update( $data );

        return redirect()->route('customers')->with('success','Customer update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete('delete from customers where id = ?',[$id]);

        return redirect()->route('customers')->with('success','Customer has been deleted successfully!');
    }

}
