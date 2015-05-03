<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'slug', 'weight'];

    protected $casts = [
        'weight' => 'integer',
    ];

	public function characters()
    {
        return $this->hasMany('App\Character');
    }

    public function scopeWeighted($query)
    {
        $query->orderBy('weight', 'ASC');
    }

}
