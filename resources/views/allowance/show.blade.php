@extends('layouts.app')

@section('content')
<div class="container" >
        <div class="d-flex justify-content-center">
            <div class="card w-50" >
                <div class="card-body">
                    <h4 class="card-title mb-3">{{$allowance->name}}</h4>
                    <h5 class="card-subtitle mb-2 text-muted">{{$allowance->amount}}</h5>
                    
                    <a href="/allowance" class="btn btn-success mb-3 ms-2 d-block w-25 mt-4 text-white">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
