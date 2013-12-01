@section('content')
	<ol class="breadcrumb">
		<li><a href={{route('index')}}>Home</a></li>
	</ol>

	<div class="panel panel-default">
	  <div class="panel-heading"><h4>Select Your University</h4></div>
	  <div class="panel-body">

	    @foreach($universities as $university)
	    
    		<a href={{route('find.degree',$university->id)}}>
    			<h5 class="list">{{ $university->name }}</h5>
    		</a>
			
		@endforeach
	   
	  </div>
	</div>
	
@stop