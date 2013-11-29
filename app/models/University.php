<?php

class University extends Eloquent{
	protected $fillable = array('name');

	public function degrees(){
		return $this->belongsToMany('Degree');
	}

	public function books(){
		return $this->belongsToMany('Book');
	}

	public function subjects(){
		return $this->belongsToMany('Subject')->withPivot('semester');
	}
}

?>