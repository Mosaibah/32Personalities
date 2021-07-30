<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Allowance;
use Illuminate\Support\Arr;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $total_salary = 0;
        $employees = Employee::get();
        return view('employee.index', compact('employees', 'total_salary'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allowances = Allowance::get();
        return view('employee.create', compact('allowances'));
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
            'name' => 'required|min:4:max:50',
            'email' => 'required|email',
            'salary' => 'required',
        ]);

        $employee_id = Employee::insertGetId(array(
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'salary' => $request->input('salary')
    ));

    $allowances = $request->input('allowance');
    $employee = Employee::find($employee_id);
    $employee->allowances()->attach($allowances);

        return redirect('/employee');   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::find($id);
        $allowances = $employee->allowances;

        $data = [];
        foreach($allowances as $allowance){
            // $data = Arr::add(['y' => $allowance->amount], 'name', $allowance->name);
            array_push($data,['y' => $allowance->amount, 'label' => $allowance->name]);

        }


        return view('employee.show', compact('employee', 'allowances', 'data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);
        $allowances = Allowance::get();
        return view('employee.edit', compact('employee', 'allowances'));
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
        
        $employee = Employee::find($id);

        $employee->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'salary' => $request->input('salary')
        ]);

        $allowances = $request->input('allowance');
        $employee->allowances()->sync($allowances);

        return redirect('/employee');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();

        return redirect('/employee');   
    }
}
