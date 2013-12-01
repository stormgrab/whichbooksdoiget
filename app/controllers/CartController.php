<?php

class CartController extends BaseController {

	protected $layout = 'main';

	public function index()
	{
        $this->layout->content = View::make('cart');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($id)
	{
		if(!Session::has('books') OR !in_array($id, Session::get('books')))
			Session::push('books',$id);
		return Redirect::back()
						->with('flash_notice', 'Added to cart successfully');
	}

	public function getBooks(){
		foreach(Session::get('getBooks') as $id)
			if(!Session::has('books') OR !in_array($id, Session::get('books')))
				Session::push('books',$id);

		
		return Redirect::back()->with('flash_notice','Added to cart successfully');

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return View::make('carts.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('carts.edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$books = Session::get('books');
		$key = array_search($id,$books);
		if($key!==false){
		    unset($books[$key]);
		}

		Session::forget('books');

		foreach($books as $element){
			Session::push('books',$element);
		}

		return Redirect::back();
	}

}
