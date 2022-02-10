<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\User;
use DataTables;
use Session;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $Employee = Employee::get();
          $data = array();
        if(Session::has('loginid'))
        {
            $data=User::where('id','=',Session::get('loginid'))->first();
        }
        return view('Employee',compact('Employee','data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
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
            'EmpId'=>"required",
            'username'=>"required",
            'Age'=>'required',
            'gender'=>'required',
            'Designation'=>'required',
            'Roll'=>'required'
        ]);

        $employee = new Employee();
        $employee->EmpId=$request->EmpId;
        $employee->name=$request->username;
        $employee->Age=$request->Age;
        $employee->Gender=$request->gender;
        $employee->Designation=$request->Designation;
        $employee->Roll=$request->Roll;
        $res = $employee->save();
        if($res)
        {
            return redirect('employee');
        }
        else
        {
            // return back()->with('fail','somethingwrong');
            var_dump($res);
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
        return "Hai";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::where('id','=',$id)->first();
        return view('create',compact('employee'));
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
        $request->validate([
            'EmpId'=>"required",
            'username'=>"required",
            'Age'=>'required',
            'gender'=>'required',
            'Designation'=>'required',
            'Roll'=>'required'
        ]);

        $update = Employee::where('id', '=', $id)->update(
            [
                "EmpId"=>$request->EmpId,
                "Name"=>$request->username,
                "Age"=>$request->Age,
                "Gender"=>$request->gender,
                "Designation"=>$request->Designation,
                "Roll"=>$request->Roll,
            ]
            );


        return redirect()->route('employee.index')->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Employee::where('id', '=', $id)->delete();
        if($delete){
            return "success";
        } else {
            return "fail";
        }

    }
}
