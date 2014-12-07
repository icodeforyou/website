<?php

class Entry extends \Eloquent {

	protected $fillable = ["email", "name", "name2", "address", "lat", "lon", "postalCode"];

	public function scopeVisible($query)
	{
		return $query->whereVisible(1);
	}
}