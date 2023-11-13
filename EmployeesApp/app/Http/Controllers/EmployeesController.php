<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Department;
use App\Models\Employee;

use Illuminate\Support\Facades\Log;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
  //  try {
        $employees = Employee::orderBy('id','asc')->paginate(5);
         return view('welcome', compact('employees'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
   /* } catch (\Exception $e) {
        return(" error." . $e );
    }*/
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
     //  try {
        $departments = Department::all();
        return view('create', compact('departments'));
        /* } catch (\Exception $e) {
        return(" error." . $e );
         }*/
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       // try {
        Log::info('new employee created');
       //dd($request->img_path);
       $request->validate([
        'fname'  =>  'required|string',
        'lname'  =>  'required|string',
        'address'  =>  'required|string',
        'age'  =>  'required|numeric',
        'birth_date'  =>  'required|date',
        'hired_date'  =>  'required|date',
        'department_id'  => 'required|exists:departments,id' ,
        'division'  =>  'required|string',
        'img_path' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      ]);
     
      if ($request->file('img_path')) {
        $destinationPath = 'images/';
        $fileName = date('YmdHis') . "." . $request->originalName.'_'.$request->fname.'_'.$request->lname.'_'.uniqid(). '.'.$request->img_path->getClientOriginalExtension();
       //   dd($fileName);
        $employee = new Employee;
        $employee->fname = $request->fname;
        $employee->lname = $request->lname;
        $employee->address = $request->address;
        $employee->age = $request->age;
        $employee->birth_date = $request->birth_date;
        $employee->hired_date = $request->hired_date;
        $employee->department_id = $request->department_id;
        $employee->division = $request->division;
        $employee->img_path = $fileName; 
        $employee->save();
       $request->file('img_path')->move('public/images', $fileName);
        }
        return redirect()->to('/')->with('success','Employee created successfully.');
        /* } catch (\Exception $e) {
        return(" error." . $e );
         }*/
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
