<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Photo;

class Flyer extends Model
{

	protected $fillable = [
		'street',
		'city',
		'state',
		'country',
		'zip',
		'price',
		'description',
		'user_id'
	];

	public static function LocatedAt($zip, $street) {
	    
	    $street = str_replace('-', ' ', $street);
		return static::where(compact('zip', 'street'))->firstOrFail();
	}


	public function getPriceAttribute($price) {
		return '$' . number_format($price);
	}

 	public function photos() {
    	return $this->hasMany('App\Photo');
    }

   	public function addPhoto(Photo $photo)
 	{
 		return $this->photos()->save($photo);
 	}
 	
    public function owner() {
    	return $this->belongsTo('App\User');
    }

    public function ownedBy(User $user) {
    	return $this->user_id == $user->id;
    }
}
