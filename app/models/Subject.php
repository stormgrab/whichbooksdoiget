<?php 

class Subject extends Eloquent{
	protected $fillable = array('name','degree_id');

	public function books(){
		return $this->hasMany('Book');
	}
	public function universities(){
		return $this->belongsToMany('University')->withPivot('semester');
	}
	public function degree(){
		return $this->belongsTo('Degree');
	}
}

?>