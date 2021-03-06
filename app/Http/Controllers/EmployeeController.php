<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        $employee = Employee::all();
        return view('pages.employee.index', compact('employee'));
    }
    public function create()
    {
        return view('pages.employee.create');
    }
    public function store(Request $request)
    {
        $employee = new Employee;
        $employee->name = $request->input('name');
        $employee->phone = $request->input('phone');
        $employee->email = $request->input('email');
        $employee->designation = $request->input('designation');
        $employee->save();  
        return redirect('employee')->with('status','Employee Added Successfully');
    }
    public function edit($id)
    {
        $employee = Employee::find($id);
        return view('pages.employee.edit', compact('employee'));
    }
    public function update(Request $request,$id)
    {
        $employee = Employee::find($id);
        $employee->name = $request->input('name');
        $employee->email = $request->input('email');
        $employee->phone = $request->input('phone');
        $employee->designation = $request->input('designation');
        $employee->status = $request->input('status') == true ? '1':'0';
        $employee->update();
        return redirect('employee')->with('status','Employee data Updated Successfully');
    }
    public function delete($id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        return redirect('employee')->with('status','Employee data Deleted Successfully');
    }
}
