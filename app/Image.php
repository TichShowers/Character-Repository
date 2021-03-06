<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model {

    protected $table = 'images';

    protected $fillable = ['name', 'url'];

    public function characters()
    {
        return $this->belongsToMany('App\Character');
    }

}
