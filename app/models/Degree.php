<?php

class Degree extends Eloquent{
	protected $fillable = array('name','semesters');

	public function subjects(){
		return $this->hasMany('Subject');
	}

	public function universities(){
		return $this->belongsToMany('University');
	}
}

?>