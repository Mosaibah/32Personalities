@extends('layouts.app')

@section('content')
<div class="container">

    <a href="home" class="btn btn-outline-success mb-4 ms-2">Back</a>
    <a href="allowance/create" class="btn btn-success mb-4 ms-2">New Allowance</a>
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Amount</th>
                <th scope="col">Actions</th>
            </tr>
    </thead>
    <tbody>
        @foreach ($allowances as $allowance)
            <tr>
                <th scope="row">{{$allowance->id}}</th>
                <td><a href="allowance/{{$allowance->id}}" class="text-decoration-none text-white ">{{$allowance->name}}</a></td>
                <td>{{$allowance->amount}}</td>
                
                <td >
                    <a href="/allowance/{{$allowance->id}}/edit" class="btn btn-outline-light me-2">Edit</a>
                    <form 
                                        action="/allowance/{{$allowance->id}}"
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
