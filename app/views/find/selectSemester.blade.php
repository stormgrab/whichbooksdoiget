@section('content')
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