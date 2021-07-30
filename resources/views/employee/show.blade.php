@extends('layouts.app')

@section('content')
<div class="container" >
    <div class="d-flex justify-content-center">
        <div class="card w-50" >
            <div class="card-body">
                <h4 class="card-title mb-3">{{$employee->name}}</h4>
                <h5 class="card-subtitle mb-2 text-muted">{{$employee->email}}</h5>
                <p class="card-text">{{$employee->salary}}</p>
                @foreach ($employee->allowances as $allowance)
                    <p class="btn btn-primary text-white" disabled>
                        {{$allowance->name}}
                    </p>
                @endforeach

                <a href="/employee" class="btn btn-success mb-3 ms-2 d-block w-25 mt-4 text-white">Back</a>
            </div>
        </div>
    </div>
{{--  --}}
<script>
   
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Allowances"
	},
	axisY: {
		title: "Amount"
	},
	data: [{        
		type: "column",  

		dataPoints: <?php echo json_encode($data, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();

}
    
    </script>
<div class="d-flex justify-content-center mt-5 mb-5">
    <div id="chartContainer" style="height: 370px; width: 70%;" ></div>
</div>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
{{--  --}}
</div>
@endsection
