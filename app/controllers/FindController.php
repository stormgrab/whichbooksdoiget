<?php

class FindController extends BaseController {

	protected $layout = 'main';

	public function selectUniversity(){
		$universities = University::orderBy('name')->get();
		$this->layout->content = View::make('find.selectUniversity')->with('universities',$universities);
	}

	public function selectDegree($university){
		$university = University::find($university);
		$degrees = $university->degrees()->orderBy('name')->get();

		$this->layout->content = View::make('find.selectDegree')->with(array('university'=>$university,'degrees'=>$degrees));
	}

	public function selectSemester($university,$degree){
		$university = University::find($university);
		$degree = Degree::find($degree);
		$semesters = $degree->semesters;

		$this->layout->content = View::make('find.selectSemester')
						->with(array(
							'university'=>$university,
							'degree'=>$degree,
							'semesters'=>$semesters,
						));
	}

	public function getBooks($university,$degree,$semester){
		$university = University::find($university);
		$degree = Degree::find($degree);
		$subjects = $university->subjects()->where('semester',$semester)->where('degree_id',$degree->id)->orderBy('name')->get();
		$books = $university->books()->orderBy('name')->get();
		$this->layout->content = View::make('find.getBooks')
						->with(array(
							'books'=> $books,
							'subjects'=>$subjects,
							'university'=>$university,
						));
		
	}

	public function bookInfo($id){
		$book = Book::find($id);

		$this->layout->content = View::make('find.bookInfo')->with('book',$book);
	}


}