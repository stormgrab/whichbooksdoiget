<?php

class DegreeController extends \BaseController {

	protected $layout = 'main';

	public function __construct()
	{
		$this->beforeFilter('admin');

	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$degrees = Degree::orderBy('name')->get();

		$this->layout->content = View::make('degree.index')->with('degrees',$degrees);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$this->layout->content = View::make('degree.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$degree = new Degree(Input::only('name','semesters'));
		
		if( $degree->save() )
		{
			return Redirect::route('degree.index')
			  ->with('flash_notice', 'The new degree has been created');
		}

		return Redirect::route('degrees.create')
		->withInput()
		->withErrors($degree->errors());
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$degree = Degree::find($id);
		$subjects = $degree->subjects;
		$universities = $degree->universities;
		$this->layout->content = View::make('degree.show')
								->with(array('degree'=>$degree,'subjects'=>$subjects,'universities'=>$universities));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$degree = Degree::find($id);
		$this->layout->content = View::make('degree.edit')->with('degree',$degree);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$degree = Degree::find($id);
		$degree->fill(Input::only('name','semesters'));
		// $degree->name = "Hanuman";
		// $degree->semesters = 4;
		if( $degree->save() )
		{
			return Redirect::route('degree.show',$id)
			  ->with('flash', 'Degree is updated');
		}

		return Redirect::route('degrees.edit',$id)
		->withInput()
		->withErrors($degree->errors());
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$degree = Degree::find($id);

		if( $degree->delete() )
		{
			return Redirect::route('degree.index')
			  ->with('flash', 'Degree is deleted');
		}

		return Redirect::route('degrees.show',$id)
		->withInput()
		->withErrors($degree->errors());
	}

}