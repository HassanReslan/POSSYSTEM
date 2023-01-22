<?php

namespace App\Http\Controllers;
use App\Interfaces\EmployeesRepositoriesInterface;
use App\Models\Employees;
use App\Http\Requests\StoreEmployeesRequest;
use App\Http\Requests\UpdateEmployeesRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{

     private EmployeesRepositoriesInterface $employeesRepository;

     public function __construct(EmployeesRepositoriesInterface $employeesRepository) 
    {
        $this->employeesRepository = $employeesRepository;
       
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          if(Auth::user()) {
            $user_name = Auth::user();

            return view('employees.index',['page'=>'Employees','email'=>$user_name->email ]);
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
            $user_name = Auth::user();

            return view('employees.create',['page'=>'Add Employees','email'=>$user_name->email ]);
        }
        else{
            return view('index');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEmployeesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeesRequest $request)
    {
         $validate =  $request->validate([
            'name' => 'required|unique:customers,name',
            'email' => '',
            'phone' => 'required',
            'address' => '',
        ]);

        /*$data = ['name'=>$validate['name'],'email'=> $validate['email'], 'phone'=> $validate['phone'],'address'=> $validate['address'] ];
        DB::table('customers')->insert($data);*/

        $result = $this->employeesRepository->createEmployees($validate);
        if( $result)
        {
             return redirect()->route('employees')->with('success','Employee created successfully!');
        }
        else{
            return redirect()->route('employees .create')->with('Faild','Employee created Faild!');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function show(Employees $employees)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function edit(Employees $employees)
    {
        if(Auth::user()) {
            $user_name = Auth::user();

            return view('employees.edit',['page'=>'Edit Employee','email'=>$user_name->email ]);
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
        
         $validate =  $request->validate([
            'name' => 'required|unique:customers,name',
            'email' => '',
            'phone' => 'required',
            'address' => '',
        ]);

         $result = $this->employeesRepository->updateEmployees($id,$validate);
        
         if($result)
         {
            return redirect()->route('employees')->with('success','Employee update successfully!');
         }else{
             return redirect()->route('employees')->with('Faild','Employee update Faild!');
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $result = $this->employeesRepository->deleteEmployees($id);

        if($result)
        {
             return redirect()->route('employees')->with('success','Employee has been deleted successfully!');
        }
        else{
            return redirect()->route('employees')->with('Faild','Deleted employee failed!');
        }
    }
}
