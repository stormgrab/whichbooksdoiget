<?php

class BookController extends \BaseController {

	protected $layout = 'main';

	
	public function __construct()
	{
		$this->beforeFilter('admin');

	}
	
	public function index()
	{
		$books = Book::orderBy('name')->get();

		$this->layout->content = View::make('book.index')->with('books',$books);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$subjects = Subject::all();

		$this->layout->content = View::make('book.create')->with('subjects',$subjects);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$book = new Book(Input::only('name','author','desc','price'));
		$subject = Subject::find(Input::get('subject'));
		$imgUrl = Input::get('imgUrl');
		$imageName = Str::random(20).'.'.pathinfo($imgUrl, PATHINFO_EXTENSION);

		$book->image = $imageName;

		if(copy($imgUrl,'thumbnails/'.$imageName))
			if( $subject->books()->save($book) )
			{
				return Redirect::route('book.index')
				  ->with('flash', 'The new book has been created');
			}

		return Redirect::route('books.create')
		->withInput()
		->withErrors($book->errors());
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$book = Book::find($id);
		$subject = $book->subject;
		$universities = $book->universities;
		$this->layout->content = View::make('book.show')
								->with(array('book'=>$book,'subject'=>$subject,'universities'=>$universities));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$book = Book::find($id);
		$subjects = Subject::all();

		$this->layout->content = View::make('book.edit')->with(array('book'=>$book,'subjects'=>$subjects));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$book = Book::find($id);
		$subject = Subject::find(Input::get('subject'));
		$book->fill(Input::only('name','author','desc','price'));
		$imgUrl = Input::get('imgUrl');
		$imageName = $book->image;

		$book->image = $imageName;

		if($imgUrl!=null)
			copy($imgUrl,'thumbnails/'.$imageName);
		
		if( $subject->books()->save($book) )
		{
			return Redirect::route('book.show',$id)
			  ->with('flash', 'Book is updated');
		}

		return Redirect::route('books.edit',$id)
		->withInput()
		->withErrors($book->errors());
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$book = Book::find($id);

		if( $book->delete() )
		{
			return Redirect::route('book.index')
			  ->with('flash', 'Book is deleted');
		}

		return Redirect::route('books.show',$id)
		->withInput()
		->withErrors($book->errors());
	}

	public function attachUniversity($id){
		$book = Book::find($id);
		$universities = University::all();

		$this->layout->content = View::make('book.attachUniversity')->with(array('book'=>$book,'universities'=>$universities));
	}

	public function attachUniversityProcess($id){
		$book = Book::find($id);
		$university = Input::get('university');

		if($book->universities()->attach($university)){
			return Redirect::route('book.attachUniversity',$id)
						  ->with('flash', 'University is attached');
		}
		return Redirect::route('book.attachUniversity',$id)
						->with('flash', 'University failed to attach');
	}

}