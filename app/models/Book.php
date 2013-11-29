<?php

class Book extends Eloquent{
	protected $fillable = array('name','author','desc','image','subject_id','price');

	public function universities(){
		return $this->belongsToMany('University');
	}

	public function subject(){
		return $this->belongsTo('Subject');
	}

}

?>