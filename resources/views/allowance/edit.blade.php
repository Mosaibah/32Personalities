@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center" >

    <form 
        action="{{route('allowance.update',[$allowance->id])}}"
        method="POST"
        class="w-50 mt-3">
        @csrf
        @method("PUT")

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$allowance->name}}">
        </div>
        <div class="mb-3">
            <label for="amount" class="form-label">amount</label>
            <input type="number" class="form-control" id="amount" name="amount" value="{{$allowance->amount}}">
        </div>

        <div class="d-flex justify-content-center">
            <button class="btn btn-primary mt-5 w-25 text-white">Submit</button>
        </div>
    </form>
</div>
</div>
@endsection
