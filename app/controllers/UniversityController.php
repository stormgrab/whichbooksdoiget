<?php

class UniversityController extends \BaseController {

	protected $layout = 'main';
	
	public function __construct()
	{
		$this->beforeFilter('admin');

	}


	public function index()
	{
		$universities = University::orderBy('name')->get();

		$this->layout->content = View::make('university.index')->with('universities',$universities);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$this->layout->content = View::make('university.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$university = new University(Input::only('name'));
		
		if( $university->save() )
		{
			return Redirect::route('university.index')
			  ->with('flash', 'The new university has been created');
		}

		return Redirect::route('universities.create')
		->withInput()
		->withErrors($university->errors());
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$university = University::find($id);
		$degrees = $university->degrees;
		$books = $university->books;
		$subjects = $university->subjects;
		$this->layout->content = View::make('university.show')
								->with(array('university'=>$university,'degrees'=>$degrees,'books'=>$books,'subjects'=>$subjects));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$university = University::find($id);
		$this->layout->content = View::make('university.edit')->with('university',$university);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$university = University::find($id);
		$university->fill(Input::only('name'));
		
		if( $university->save() )
		{
			return Redirect::route('university.show',$id)
			  ->with('flash', 'University is updated');
		}

		return Redirect::route('universities.edit',$id)
		->withInput()
		->withErrors($university->errors());
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$university = University::find($id);

		if( $university->delete() )
		{
			return Redirect::route('university.index')
			  ->with('flash', 'University is deleted');
		}

		return Redirect::route('universities.show',$id)
		->withInput()
		->withErrors($university->errors());
	}

	public function attachDegree($id){
		$university = University::find($id);
		$degrees = Degree::all();

		$this->layout->content = View::make('university.attachDegree')->with(array('university'=>$university,'degrees'=>$degrees));
	}

	public function attachDegreeProcess($id){
		$university = University::find($id);
		$degree = Input::get('degree');

		if($university->degrees()->attach($degree)){
			return Redirect::route('university.attachDegree',$id)
						  ->with('flash', 'Degree is attached');
		}
		return Redirect::route('university.attachDegree',$id)
						->with('flash', 'Degree failed to attach');
	}

}