@extends('layouts.app')

@section('content')
<div class="container" style="height: 700px">
    <div class="d-flex justify-content-center gap-3 h-50 align-items-center">

        <a href="employee" class="h-50 w-25 ">
            <button 
                class="btn btn-primary h-100 w-100 fs-3 text-white" 
                href="employee">
                Employees
            </button>
        </a>
        
        <a href="allowance" class="h-50 w-25 ">
            <button 
                class="btn btn-primary h-100 w-100 fs-3 text-white" 
                href="employee">
                Allowances
            </button>
        </a>

    </div>
</div>
@endsection
