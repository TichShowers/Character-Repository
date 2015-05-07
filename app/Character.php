<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Character extends Model {

    protected $table = 'characters';

    protected $fillable = ['name', 'slug', 'description', 'image', 'weight'];

    protected $casts = [
        'weight' => 'integer',
    ];

	public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function images()
    {
        return $this->belongsToMany('App\Image');
    }

    public function scopeWeighted($query)
    {
        $query->orderBy('weight', 'ASC');
    }

}
