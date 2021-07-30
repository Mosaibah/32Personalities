@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center" >

    <form 
        action="{{route('employee.update',[$employee->id])}}"
        method="POST"
        class="w-50 mt-3">
        @csrf
        @method("PUT")

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$employee->name}}">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{$employee->email}}">
        </div>
        <div class="mb-3">
            <label for="salary" class="form-label">Salary</label>
            <input type="number" class="form-control" id="salary" name="salary" value="{{$employee->salary}}">
        </div>

        <legend>Allowance</legend>
        <div class="row">
            @foreach ($allowances as $allowance)
                <div class="col-5">
                    <input type="checkbox" name="allowance[]" value="{{$allowance->id}}" id="{{$allowance->name}}"
                        @foreach ($employee->allowances as $employee_allowance)
                            @if ($allowance->id === $employee_allowance->id)
                            checked="checked"
                            @endif
                        @endforeach
                        >
                    <label for="{{$allowance->name}}">{{$allowance->name}}</label>
                </div>
            @endforeach
        </div>
        
        

        <div class="d-flex justify-content-center">
            <button class="btn btn-primary mt-5 w-25 text-white">Submit</button>
        </div>
    </form>
</div>
</div>
@endsection
