@section('content')
	<ol class="breadcrumb">
		<li><a href={{route('index')}}>Home</a></li>
		<li><a href={{route('find.university')}}>Select University</a></li>
		<li><a href={{route('find.degree',$university->id)}}>Select Branch</a></li>
		<li><a href={{route('find.semester',array('university'=>$university->id,'degree'=>$degree->id))}}>Select Semester</a></li>
		<li><a href="{{route('getBooks',array('university'=>$university->id,'degree'=>$degree->id,'semester'=>$semester))}}">Select Book</a></li>
	</ol>
	<div class="media">
		<a class="pull-left" href="#">
			<img class="media-object" src="/whichbooksdoiget/public/thumbnails/{{$book->image}}" height=300 width=225>
		</a>
		<div class="media-body">
			<h3 class="media-heading">{{$book->name}}</h3>
			<p><small>by</small> {{$book->author}}</p>
			<p class="text-danger">Price: <span class="currencyINR">&#8377;</span>{{$book->price}}</p>
			<p>{{$book->desc}}</p>
			<a class = "btn btn-warning" href={{route('cart.create',$book->id)}}><span class="glyphicon glyphicon-shopping-cart"></span>Add To Cart</a>
		</div>
	</div>

	<div class="votes col-md-9">
		<div class="col-md-1">
			<a href="{{route('book.voteup',$book->id)}}">
				<button type="button" class="btn btn-default btn-lg ">
				  <span class="glyphicon glyphicon-thumbs-up text-success"><br/>{{$book->voteup}}</span>
				</button>
			</a>
		</div>
		<div class="col-md-1">
			<a href="{{route('book.votedown',$book->id)}}">
				<button type="button" class="btn btn-default btn-lg ">
				  <span class="glyphicon glyphicon-thumbs-down text-danger"><br/>{{$book->votedown}}</span>
				</button>
			</a>
		</div>
	</div>
	
@stop