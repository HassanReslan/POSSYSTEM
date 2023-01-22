<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


use App\User;



class UsersController extends Controller
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

            return view('users.index',['page'=>'Users','email'=>$user_name->email ]);
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

    public function autocomplete(Request $request)
    {
        //DB::enableQueryLog();
        $data =  DB::table('products')->select('product_name AS name')->where('product_name','LIKE',"%$request->str%")->get();
        //dd(DB::getQueryLog());
        return response()->json($data);
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

            return view('users.create',['page'=>'Add Users','email'=>$user_name->email ]);
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
            'name' => 'required|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role' => 'required',
        ]);

        $encryptedPassword = Hash::make($validate['password']);
        $data = ['name'=>$validate['name'],'email'=> $validate['email'], 'password'=> $encryptedPassword,'role'=>$validate['role'] ];
        DB::table('users')->insert($data);

        return redirect()->route('users')->with('success','User created successfully!');
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

            return view('users.edit',['page'=>'Edit User','email'=>$user_name->email ]);
        }
        else{
            return view('users.index');
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
        $validate =  request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'role' => 'required',
        ]);


        $data = $request->all();
        $encryptedPassword = Hash::make($validate['password']);
        //$data = ['name'=>$validate['name'],'email'=> $validate['email'], 'password'=>$encryptedPassword];
        $sql = DB::table('users')->where('id', $id) ->update(['name'=> $validate['name'],'email' => $validate['email'],'password'=> $encryptedPassword,'role'=>$validate['role']] );
       
        return redirect()->route('users')->with('success','User update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete('delete from users where id = ?',[$id]);

        return redirect()->route('users')->with('success','User has been deleted successfully!');
    }
}
