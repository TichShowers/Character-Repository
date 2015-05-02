<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Character extends Model {

    protected $table = 'characters';

    protected $fillable = ['name', 'slug', 'description', 'image'];

	public function category()
    {
        return $this->belongsTo('App\Category');
    }

    // $cat->characters()->create(['name' => 'Tich Showers', 'slug'=>'tich-showers','description'=>'Cool blue hair']);


    public function images()
    {
        return $this->belongsToMany('App/Image');
    }

}
