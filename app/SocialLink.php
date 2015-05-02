<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialLink extends Model {

	protected $table = 'social_links';

    protected $fillable = ['name', 'type', 'link', 'css'];
}
