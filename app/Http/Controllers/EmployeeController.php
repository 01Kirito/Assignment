<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employee_list =Employee::all();
        return  response($employee_list);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeRequest $request)
    {
        // also we can make it better by returning just the invalid input
        if($request->validated()){
            Employee::create([
                'full_name' => $request->input('full_name'),
                'age' => $request->input('age'),
                'salary' => $request->input('salary'),
                'date_of_employment' => $request->input('date_of_employment'),
                'email' =>$request->input('email'),
                'password' => $request->input('password'),
                'manager_id' => $request->input('manager_id'),
            ]);
            return response()->json(['message' => 'Employee created successfully'], 201);
        }else {
            return response()->json(['message' => 'Invalid inputs.'], 422);
         }
    }


    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        // we can also send employee employee manager by add this line below then add to the response
        $manager = Employee::find($employee->manager_id);

        // Check if manager exists
        if ($manager) {
            $data = [ 'employee' => $employee,  'manager name' => $manager->full_name,];
        } else {
            $data = ['employee' => $employee];
        }
        // Return the response as JSON
        return response()->json(['data' => $data], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        dd("runed");
        if(true){
            dd("runed");
            $employee::save([
                'full_name' => $request->input('full_name'),
                'age' => $request->input('age'),
                'salary' => $request->input('salary'),
                'date_of_employment' => $request->input('date_of_employment'),
                'email' =>$request->input('email'),
                'password' => $request->input('password'),
                'manager_id' => $request->input('manager_id'),
            ]);
            return response()->json(['message' => 'Employee updated successfully'], 201);
        }else {
            return response()->json(['message' => 'Invalid inputs.'], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
