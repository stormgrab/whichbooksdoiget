@section('content')
	<div class="media">
		<a class="pull-left" href="#">
			<img class="media-object" src="/whichbooksdoiget/public/thumbnails/{{$book->image}}" height=300 width=225>
		</a>
		<div class="media-body">
			<h3 class="media-heading">{{$book->name}}</h3>
			<p><small>by</small> {{$book->author}}</p>
			<p class="text-danger">Price: <span class="currencyINR">&#8377;</span>{{$book->price}}</p>
			<p>{{$book->desc}}</p>
			<p>Subject: {{$subject->name}}</p>
		
		</div>
	</div>
	
	<a href={{route('book.edit',$book->id)}} class="btn btn-default btn-sm">Edit Data</a>
	{{ Form::open(array('route' => array('book.destroy',$book->id),'method'=>'delete')) }}
	    <button type="submit" class="btn btn-danger btn-sm">Delete Data</button>
	{{ Form::close() }}

	<h4>Universities where used</h4>
	<table class="table">
		@foreach($universities as $university)
			<tr>
				<td><a href={{route('university.show',$university->id)}}>{{$university->name }}</a></td>
			</tr>
		@endforeach
	</table>

	
@stop