<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

	public function characters()
    {
        return $this->hasMany('App\Article');
    }

}
