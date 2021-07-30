@extends('layouts.app')

@section('content')
<div class="container">

    <a href="home" class="btn btn-outline-success mb-4 ms-2">Back</a>
    <a href="employee/create" class="btn btn-success mb-4 ms-2">New Employee</a>
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Salary</th>
                <th scope="col">Allowances</th>
                <th scope="col">Total Salary</th>
                <th scope="col">Actions</th>
            </tr>
    </thead>
    <tbody>
        @foreach ($employees as $employee)
            <tr>
                <th scope="row">{{$employee->id}}</th>
                <td><a href="employee/{{$employee->id}}" class="text-decoration-none text-white ">{{$employee->name}}</a></td>
                <td>{{$employee->email}}</td>
                <td>{{$employee->salary}}</td>
                <td>
                    @foreach ($employee->allowances as $allowance)
                        @php
                            $total_salary += $allowance->amount;
                        @endphp
                    @endforeach
                    @php
                        echo $total_salary;
                    @endphp
                </td>
                <td>
                    @php
                        echo $employee->salary + $total_salary;
                        $total_salary = 0;
                    @endphp
                </td>
                <td >
                    <a href="/employee/{{$employee->id}}/edit" class="btn btn-outline-light me-2">Edit</a>
                    <form 
                                        action="/employee/{{$employee->id}}"
                                        method="POST" class="d-inline">
                                        @csrf
                                        @method("delete")

                                        <button 
                                            class="btn btn-outline-danger">
                                            Delete
                                        </button>
                                    </form>
                    

                </td>
            </tr>
        @endforeach
    </tbody>
    </table>
</div>
@endsection
