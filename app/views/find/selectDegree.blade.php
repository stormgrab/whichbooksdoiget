@section('content')
	<ol class="breadcrumb">
		<li><a href={{route('index')}}>Home</a></li>
		<li><a href={{route('find.university')}}>Select University</a></li>
	</ol>

	<div class="panel panel-default">
	  <div class="panel-heading"><h4>Select Your Branch</h4></div>
	  <div class="panel-body">
			@foreach($degrees as $degree)
				<a href={{route('find.semester',array('university'=>$university->id,'degree'=>$degree->id))}}>
					<h5 class="list">{{ $degree->name }}</h5>
				</a>
			@endforeach
		 </div>
		</div>
	
	
@stop