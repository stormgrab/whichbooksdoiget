<?php

class SubjectController extends \BaseController {

	protected $layout = 'main';

	
	public function __construct()
	{
		$this->beforeFilter('admin');

	}

	public function index()
	{
		$subjects = Subject::orderBy('name')->get();

		$this->layout->content = View::make('subject.index')->with('subjects',$subjects);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$degrees = Degree::all();
		
		$this->layout->content = View::make('subject.create')
									->with(array('degrees'=>$degrees));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$subject = new Subject(Input::only('name','degree_id'));
		$degree = Degree::find(Input::get('degree'));
		
		if( $degree->subjects()->save($subject) )
		{
			return Redirect::route('subject.index')
			  ->with('flash', 'The new subject has been created');
		}

		return Redirect::route('subjects.create')
		->withInput()
		->withErrors($subject->errors());
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$subject = Subject::find($id);
		$degree = $subject->degree;
		$universities = $subject->universities;
		$books = $subject->books;

		$this->layout->content = View::make('subject.show')
								->with(array('subject'=>$subject,'degree'=>$degree,'universities'=>$universities,'books'=>$books));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$subject = Subject::find($id);
		$degrees = Degree::all();

		$this->layout->content = View::make('subject.edit')->with(array('subject'=>$subject,'degrees'=>$degrees));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$subject = Subject::find($id);
		$subject->fill(Input::only('name','degree_id'));
		$degree = Degree::find(Input::get('degree'));
		
		if( $degree->subjects()->save($subject) )
		{
			return Redirect::route('subject.show',$id)
			  ->with('flash', 'Subject is updated');
		}

		return Redirect::route('subjects.edit',$id)
		->withInput()
		->withErrors($subject->errors());
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$subject = Subject::find($id);

		if( $subject->delete() )
		{
			return Redirect::route('subject.index')
			  ->with('flash', 'Subject is deleted');
		}

		return Redirect::route('subjects.show',$id)
		->withInput()
		->withErrors($subject->errors());
	}

	public function attachUniversity($id){
		$subject = Subject::find($id);
		$universities = University::all();

		$this->layout->content = View::make('subject.attachUniversity')->with(array('subject'=>$subject,'universities'=>$universities));
	}

	public function attachUniversityProcess($id){
		$subject = Subject::find($id);
		$university = Input::get('university');
		$semester = Input::get('semester');

		if($subject->universities()->attach($university,array('semester'=>$semester))){
			return Redirect::route('subject.attachUniversity',$id)
						  ->with('flash', 'University is attached');
		}
		return Redirect::route('subject.attachUniversity',$id)
						->with('flash', 'University failed to attach');
	}


}