@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center" >

    <form 
        action="{{route('employee.store')}}"
        method="POST"
        class="w-50 mt-3">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="mb-3">
            <label for="salary" class="form-label">Salary</label>
            <input type="number" class="form-control" id="salary" name="salary">
        </div>

        <legend>Allowance</legend>
        <div class="row">
            @foreach ($allowances as $allowance)
                <div class="col-5">
                    <input type="checkbox" name="allowance[]" value="{{$allowance->id}}" id="{{$allowance->name}}">
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
