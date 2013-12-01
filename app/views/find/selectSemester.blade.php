@section('content')
	<ol class="breadcrumb">
		<li><a href={{route('index')}}>Home</a></li>
		<li><a href={{route('find.university')}}>Select University</a></li>
		<li><a href="{{route('find.degree',$university->id)}}">Select Branch</a></li>
	</ol>
	<div class="panel panel-default">
	  <div class="panel-heading"><h4>Which Semester Are You In?</h4></div>
	  <div class="panel-body">
			@for($i=1;$i<=$semesters;$i++)
							
				<div class="col-md-4">
				   <a class = "thumbnail  fillColor" href={{route('getBooks',array('university'=>$university->id,'degree'=>$degree->id,'semester'=>$i))}}>
						<h5 class="text-center list">{{ $i }}</h5>
					</a>
				 </div>
								
			@endfor
		</div>
</div>
	
@stop